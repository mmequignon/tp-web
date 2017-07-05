<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index(){
        $this->load->model('Invoice');
        $this->load->model('InvoiceLine');
        $this->load->model('Users');
        $this->load->library('session');
        /**
         * récupération des données de session
         */
        $admin = $this->session->userdata('admin');
        $logged = $this->session->userdata('logged');
        $current_user_id = $this->session->userdata('id');
        /**
         * récupération de la facture concernée
         */
        $invoice_id = $this->input->get('id');
        $invoice = $this->Invoice->get_invoice_by_id($invoice_id);
        /**
         * récupération de l'utilisateur qui a passé commande
         * à partir de la facture.
         * Si ce n'est pas le même utilisateur que l'utilisateur courant
         * et que ce n'est pas un admin, on redirige vers 404.
         */
        $user = $this->Users->get_user_by_id($invoice->user_id);
        if ((! $admin) && ( $user->id != $current_user_id)){
            show_404();
        }
        /**
         * Récupération des lignes de facture
         */
        $invoice_lines = $this->InvoiceLine->get_invoice_lines_by_invoice_id($invoice_id);
        $data = array(
            "page" => "invoice",
            "title" => "Invoice No : ".$invoice->id,
            "invoice" => $invoice,
            "invoice_lines" => $invoice_lines,
            "user" => $user,
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data );
        $this->load->view('invoice/invoice', $data );
        $this->load->view('base/footer');
    }
}
