<?php

use PHPUnit\Framework\Constraint\IsNull;

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property auth_model $auth_model
 * @property session $session
 * @property input $input
 */


class auth extends CI_Controller
{
    private $sessionData = array();
    public $titlePage = 'Welcome';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->helper('flashmessage');
    }

    public function dashboard()
    {

        if ($this->session->userdata('logged_in')) {
            redirect('karyawan');
        } else { 
            $this->load->view('template/global/bootstrap_header');
            $this->load->view('template/public/navbar/navbarpublic',['titlepage'=>$this->titlePage]);
            $this->load->view('dashboardanon');
            $this->load->view('template/global/bootstrap_footer');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'You must provide a %s.'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/global/bootstrap_header');
            $this->load->view('template/public/navbar/navbarpublic',['titlepage'=>$this->titlePage]);
            $this->load->view('dashboardanon');
            $this->load->view('template/global/bootstrap_footer');
        }


        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $isLoggedIn = $this->auth_model->login($username, $password);


        if (!$isLoggedIn) {
            flash_error("Failed Login");

            redirect('');
        } else {
            $this->sessionData = array(
                'user_id'   => $isLoggedIn->id,
                'username'  => $isLoggedIn->username,
                'profile'   => $isLoggedIn->profile,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($this->sessionData);
            redirect('');
        }
    }

    public function registerView()
    {
        $this->load->view('template/global/bootstrap_header');
        $this->load->view('user/registerpage');
        $this->load->view('template/global/bootstrap_footer');
    }

    public function register()
    {
        $identity = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'name_mhs' => $this->input->post('name'),
            'nik' => $this->input->post('nik'),
            'address' => $this->input->post('address'),
        );

        $isSuccess = $this->auth_model->register($identity);

        if ($isSuccess) {
            redirect('');
        } else {
            flash_error("Failed Register your acc");
            redirect('register');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata($this->sessionData);
        $this->session->sess_destroy();
        redirect('');
    }
}
