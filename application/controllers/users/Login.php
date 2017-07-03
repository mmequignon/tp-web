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
		$this->load->view('users/login');
		$this->load->view('base/footer');
	}

    public function check(){
        $this->load->model('Users');
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run()){
            if($this->Users->_check_cretendials()){
                redirect('users/account', 'refresh');
            }
        }
        $this->index();
    }
}
