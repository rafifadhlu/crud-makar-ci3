<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Kry_model $Kry_model
 * @property input $input
 * @property upload $upload
 * @property globalcontroller $globalcontroller
 * @property session $session
 */
class globalcontroller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kry_model');
    $this->load->helper('flashmessage');
  }

  public function index()
  {
    $data['karyawan'] = $this->Kry_model->getAllData('view_karyawan_list');
    $data['user'] = $this->session->userdata();
    $data['titlepage'] = 'home';

    $this->load->view('template/global/bootstrap_header');
    $this->load->view('template/auth/navbar/navbarauth', $data);
    $this->load->view('karyawan/listkaryawan', $data);
    $this->load->view('template/global/bootstrap_footer');
  }

  public function getAllKaryawan()
  {
    return $this->Kry_model->getAllData('tbl_krywn');
  }

  public function addData()
  {
    $data = array(
      'karyawan' => $this->getAllKaryawan(),
    );
    $this->load->view('addkaryawan', $data);
  }

  public function insertdata()
  {
    $data = array(
      'name_mhs' => $this->input->post('name_mhs'),
      'nik'      => $this->input->post('nik'),
      'address'  => $this->input->post('address'),
    );

    $this->Kry_model->postData('tbl_krywn', $data);

    redirect('');
  }

  public function deletedata($id)
  {
    $this->Kry_model->dropData($id);
    redirect('');
  }

  public function detailsView($id)
  {
    $data['karyawan'] = $this->Kry_model->getSingleData($id);
    $data['userDept'] = $this->Kry_model->getUserDept($id);
    $data['department'] = $this->Kry_model->getAllData('departmen');

    $this->load->view('template/global/bootstrap_header');
    $this->load->view('karyawan/detailskaryawan', $data);
    $this->load->view('template/global/bootstrap_footer');
  }

  public function editdata($id)
  {
    $this->db->trans_begin();

    $updatedData = array(
      'name_mhs' => $this->input->post('name_mhs'),
      'nik'      => $this->input->post('nik'),
      'address'  => $this->input->post('address'),
    );

    $this->Kry_model->updatedData('id', $id, 'tbl_krywn', $updatedData);

    $alreadyAssignedtoDept = $this->Kry_model->checkUserDeptAssginment($id);

    if (!empty($alreadyAssignedtoDept)) {
        // print_r($alreadyAssignedtoDept);
        // die;
        $updatedTrKrywnWorkplaceData = array(
          'id_dprtmn' => $this->input->post('department'),
          'assigned_at' => date('Y-m-d')
        );
        $this->Kry_model->updatedData('id_krywn', $id, 'tr_krywn_workplace', $updatedTrKrywnWorkplaceData);
    } else {
        ($this->input->post('department') == "")
          ? die()
          : //create new tr_krywn_workplace record
          $tr_workplace_data = array(
            'id_krywn' => $id,
            'id_dprtmn' => $this->input->post('department'),
            'assigned_at' => date('Y-m-d')
          );
        $this->Kry_model->postData('tr_krywn_workplace', $tr_workplace_data);
    }



    // Commit or rollback
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      flash_error('Update failed. Please try again.');
    } else {
      $this->db->trans_commit();
      flash_success('Data updated successfully!');
    }

    redirect('karyawan/detail/' . $id);
  }

  public function profile($id)
  {
    $data['karyawan'] = $this->Kry_model->getSingleData($id);
    $data['departmen'] = $this->Kry_model->getUserDept($id);
    $this->load->view('template/global/bootstrap_header');
    $this->load->view('user/profilepage', $data);
    $this->load->view('template/global/bootstrap_footer');
  }

  public function mediaupload($id)
  {
    $config['upload_path'] = FCPATH . 'storages/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('filepfp')) {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('unsuccess', $error);
    } else {
      $data = $this->upload->data();

      $this->Kry_model->updatedData('id', $id, 'tbl_krywn', ['profile' => $data['file_name']]);

      redirect('profile/changepfp/' . $id);
    }
  }

  public function deptView()
  {
    $this->load->view('template/global/bootstrap_header');
    $this->load->view('department/adddept');
    $this->load->view('template/global/bootstrap_footer');
  }

  public function adddept()
  {
    $data = [
      'name_dprtmn' => strtolower($this->input->post('name_dept')),
      'created_at' => date('Y-m-d')
    ];

    $this->Kry_model->postData('departmen', $data);
    if ($this->db->affected_rows() > 0) {
      redirect('department');
    }
  }
}
