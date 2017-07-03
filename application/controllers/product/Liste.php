<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste extends CI_Controller {

	public function index(){
        $this->load->model('Product');
        $this->load->model('ProductCategory');
        $this->load->library('session');
        // On récupère les informations de la session courante
        // afin de les passer aux vues
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        /**
         * On récupère les produits
         */
        $products = $this->Product->get_all();
        /**
         * On récupère les catégories de produits, pour les filtres
         */
        $product_categories = $this->ProductCategory->get_all();
        $data = array(
            "page" => "product",
            "title" => "Products",
            "products" => $products,
            "product_categories" => $product_categories,
            "logged" => $logged,
            "admin" => $admin
        );
		$this->load->view('base/header', $data);
		$this->load->view('product/liste', $data);
		$this->load->view('base/footer');
	}
}
