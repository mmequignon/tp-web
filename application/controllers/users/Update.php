<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function index(){
        $this->load->model('Users');
        $this->load->model('Invoice');
        $this->load->library('session');
        /**
         * récupération des données de la session courante
         */
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged');
        $current_user_id = $this->session->userdata('id');
        /**
         * récupération de l'utilisateur passé via post.
         * Si ce n'est pas un admin,
         * et l'utilisateur courant n'est pas le même, 404.
         */
        $user_id = $this->input->post('id');
        if((! $admin) || (! $user_id == $current_user_id)){
            show_404();
        }
        $user = $this->Users->get_user_by_id($user_id);
        /**
         * récupération des commandes de l'utilisateur
         */
        $orders = $this->Invoice->get_invoices_by_user_id($user_id);
        $data = array(
            "page" => "users",
            "title" => "Update",
            "user" => $user,
            "orders" => $orders,
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('users/update', $data);
        $this->load->view('base/footer');
	}

    public function save(){
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
        if ($this->form_validation->run()){
            $this->load->model('Users');
            $this->Users->_update($this->input->post('id'));
            redirect('users/account', 'refresh');
        }
        else{
            $this->index();
        }
    }

    public function password_check($password){
        $this->load->model('Users');
        $user = $this->Users->get_user_by_id($this->input->post('id'));
        if (hash("sha256", $password) != $user->password){
            $this->form_validation->set_message('password_check', 'Wrong password');
            return FALSE;
        }
        return TRUE;
    }

    public function save_password(){
        $this->form_validation->set_rules('current_password', 'Current password', 'trim|required|callback_password_check');
        $this->form_validation->set_rules('new_password', 'Password', 'required');
        $this->form_validation->set_rules('confirmation_password', 'Password Confirmation', 'required|matches[new_password]');
        if ($this->form_validation->run()){
            $this->load->model('Users');
            $this->Users->password_update($this->input->post('id'), hash("sha256", $this->input->post('new_password')));
            redirect('users/logout', 'refresh');
        }
        else{
            $this->index();
        }
    }
}
