<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index(){
        $this->load->library('session');
        /**
         * récupération des données de la session courante
         */
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged');
        $data = array(
            "page" => "users",
            "title" => "Register",
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('base/errors');
        $this->load->view('users/register');
        $this->load->view('base/footer');
	}

    public function save(){
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('postcode', 'Postal code', 'trim|required|min_length[1]|max_length[10]');
        if ($this->form_validation->run()){
            $this->load->model('Users');
            $this->Users->_insert();
            redirect('users/login', 'refresh');
        }
        else{
            $this->index();
        }
    }
}
