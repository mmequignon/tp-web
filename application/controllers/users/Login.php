<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
        $this->load->library('session');
        /**
         * Récupération des informations relatives à la session
         * Si la personne est connectée, redirection.
         */
        $logged = $this->session->userdata('logged');
        if ($logged){
            redirect('users/account', 'refresh');
        }
        $admin = $this->session->userdata('admin'); 
        $data = array(
            "page" => "login",
            "title" => "Login",
            "logged" => $logged,
            "admin" => $admin
        );
		$this->load->view('base/header', $data);
        $this->load->view('base/errors');
		$this->load->view('users/login');
		$this->load->view('base/footer');
	}

    public function login_check(){
        $this->load->model('Users');
        if($this->Users->_check_cretendials()){
            return TRUE;
        }
        $this->form_validation->set_message('login_check', 'Wrong Credentials');
        return FALSE;
    }

    public function check(){
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_login_check');
        if ($this->form_validation->run()){
            redirect('users/account', 'refresh');
        }
        $this->index();
    }
}
