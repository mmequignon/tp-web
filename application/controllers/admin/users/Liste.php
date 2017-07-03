<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/admin/Admin.php';

class Liste extends Admin {

    /**
     * Liste constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * index vue
     */
	public function index(){
        $this->load->model('Users');
        $this->load->library('session');
        // On récupère les informations de la session courante
        // afin de les passer aux vues
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        // Appel de la méthode permettant de récupérer tous
        // les produits.
        $users = $this->Users->get_all();
        $data = array(
            "page" => "users",
            "title" => "Users",
            "users" => $users,
            "logged" => $logged,
            "admin" => $admin
        );
		$this->load->view('base/header', $data);
		$this->load->view('admin/users/liste', $data);
		$this->load->view('base/footer');
	}
}
