<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

	public function index(){
        $this->load->model('BasketLine');
        $this->load->model('Basket');
        $this->load->model('Product');
        $basket_line_id = $this->input->post('id');
        $basket_line = $this->BasketLine->get_basket_line_by_id($basket_line_id);
        $this->BasketLine->_delete($basket_line_id);
        $this->Basket->_update($basket_line->basket_id);
        $this->Product->add_to_stock($basket_line->product_id, $basket_line->product_qty);
        redirect('basket/liste');
	}
}
