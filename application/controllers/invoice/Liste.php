<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Liste extends CI_Controller {

	public function index(){
        $this->load->model('Users');
        $this->load->model('Invoice');
        $this->load->library('session');
        /**
         * récupération des informations relatives à la session
         */
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged');
        $id = $this->session->userdata('id');
        /**
         * récupération des factures relatives à l'utilisateur courant
         */
        $user = $this->Users->get_user_by_id($id);
        $orders = $this->Invoice->get_invoices_by_user_id($id);
        $data = array(
            "page" => "invoices",
            "title" => "Your orders",
            "orders" =>$orders,
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('invoice/liste', $data);
        $this->load->view('base/footer');
	}
}
