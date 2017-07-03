<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste extends CI_Controller {

	public function index(){
        $this->load->model('Product');
        $this->load->model('Basket');
        $this->load->model('BasketLine');
        $this->load->model('PaymentMode');
        $this->load->library('session');
        // On récupère les informations de la session courante
        // afin de les passer aux vues
        $user_id = $this->session->userdata('id');
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        $basket_id = $this->session->userdata('basket');
        // Récupération du panier et des lignes de panier actives de l'utilisateur courant
        $basket_lines = $this->BasketLine->get_basket_lines_by_basket_id($basket_id);
        $delivery_modes = $this->Product->get_delivery_modes();
        $payment_modes = $this->PaymentMode->get_all();
        $basket = $this->Basket->get_basket($basket_id);
        $data = array(
            "page" => "basket",
            "title" => "Basket - Total : ".$basket->amount."€",
            "logged" => $logged,
            "basket_lines" => $basket_lines,
            "delivery_modes" => $delivery_modes,
            "payment_modes" => $payment_modes,
            "amount" => $basket->amount,
            "admin" => $admin,
            "basket_id" => $basket_id,
            "user_id" => $user_id
        );
		$this->load->view('base/header', $data);
		$this->load->view('basket/liste', $data);
		$this->load->view('base/footer');
	}
}
