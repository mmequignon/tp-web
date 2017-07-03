<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index($product_id=FALSE){
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
        if ($product_id == FALSE){
            $product_id = $this->input->get('id');
        }
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

	public function addtobasket(){
        $this->form_validation->set_rules('product_qty', 'Product quantity', 'greater_than[0]');
        $product_id = $this->input->post('product_id');
        if ($this->form_validation->run()){
            $basket_id = $this->input->post('basket_id');
            $product_qty = $this->input->post('product_qty');
            $this->load->model('BasketLine');
            if ($product_qty){
                $this->BasketLine->_insert($product_id, $basket_id, $product_qty);
            }
            redirect('product/item?id='.$product_id, 'refresh');
        }
        $this->index($product_id);
	}
}
