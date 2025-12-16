<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kry_model extends CI_Model
{

  // ------------------------------------------------------------------------
  public function getAllData($table)
  {
    // 
    return $this->db->get($table)->result_array();
  }

  public function getSingleData($id)
  {
    $this->db->where('id', $id);
    $data['karyawan'] = $this->db->get('tbl_krywn');
    return $data['karyawan']->row_array();
  }

  public function getUserDept($id)
  {
    $this->db->where('id_krywn', $id);
    $data['karyawan'] = $this->db->get('view_karyawan_list');
    return $data['karyawan']->row_array();
  }


  public function postData($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function dropData($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tbl_krywn');
  }

  public function updatedData($columnIdName, $id, $table, $updatedData)
  {
    $this->db->where($columnIdName, $id);
    $this->db->update($table, $updatedData);
  }

  public function checkUserDeptAssginment($id)
  {
    return $this->db
      ->where('id_krywn', $id)
      ->get('tr_krywn_workplace')
      ->row_array();
  }
}
