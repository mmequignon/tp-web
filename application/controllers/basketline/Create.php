<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function index(){
        $this->load->model('BasketLine');
        $product_id = $this->input->post('product_id');
        $basket_id = $this->input->post('basket_id');
        $product_qty = $this->input->post('product_qty');
        if ($product_qty){
            $this->BasketLine->_insert($product_id, $basket_id, $product_qty);
        }
        redirect('product/item?id='.$product_id, 'refresh');
	}
}
