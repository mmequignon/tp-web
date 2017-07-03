<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index(){
        $this->load->model('Product');
        $this->load->library('session');
        /**
         * On récupère des informations de la session courante,
         * afin de les passer aux vues.
         */
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        $basket_id = $this->session->userdata('basket');
        /**
         * On génère un objet à partir de l'id récupéré
         * par la méthode POST.
         */
        $product_id = $this->input->get('id');
        $product = $this->Product->get_product_by_id($product_id);
        /**
         * On place tout dans un tableau qu'on passe aux vues.
         */
        $data = array(
            "page" => "product",
            "title" => $product->name,
            'product' => $product,
            'basket_id' => $basket_id,
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('product/product', $data);
        $this->load->view('base/footer');
	}
}
