<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/admin/Admin.php';

class Liste extends Admin {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductCategory');
    }

	public function index(){
        // On récupère les informations de la session courante
        // afin de les passer aux vues
        $this->load->library('session');
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        // Appel de la méthode permettant de récupérer tous
        // les produits.
        $categories = $this->ProductCategory->get_all();
        $data = array(
            "page" => "categories",
            "title" => "Product categories",
            "categories" => $categories,
            "logged" => $logged,
            "admin" => $admin
        );

		$this->load->view('base/header', $data);
		$this->load->view('admin/product_category/liste', $data);
		$this->load->view('base/footer');
	}
}
