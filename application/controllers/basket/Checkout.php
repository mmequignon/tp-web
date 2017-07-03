<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkout extends CI_Controller {

	public function index(){
        $this->load->model('Basket');
        $this->load->model('BasketLine');
        $this->load->model('Invoice');
        $this->load->model('InvoiceLine');
        $this->load->model('BasketLine');
        $this->load->library('session');
        /**
         * Récupération des informations de la session courante
         * afin de les passer aux vues
         */
        $user_id = $this->session->userdata('id');
        $basket_id = $this->session->userdata('basket');
        /**
         * Récupération du panier et des lignes de panier
         * actives de l'utilisateur courant
         */
        $basket = $this->Basket->get_basket($basket_id);
        $delivery_mode = $this->input->post('delivery_mode');
        $payment_mode = $this->input->post('payment_mode');
        $this->BasketLine->add_delivery($delivery_mode, $basket_id);
        /**
         * Je suis obligé de remplir à nouveau la variable $basket.
         * celle renseignée initialement n'a pas été mise à jour
         * suite à l'ajout de la ligne de livraison.
         */
        $basket = $this->Basket->get_basket($basket_id);
        $invoice_id = $this->Invoice->basket_to_invoice($user_id, $basket, $payment_mode);
        $basket_lines = $this->BasketLine->get_basket_lines_by_basket_id($basket_id);
        // Création d'une ligne de facture pour chaque ligne de panier active
        foreach($basket_lines as $basket_line){
            $this->InvoiceLine->basket_line_to_invoice_line($invoice_id, $basket_line);
            $this->BasketLine->disable($basket_line->id);
        }
        $this->Basket->_reset($basket->id);
        redirect('basket/liste');
	}
}
