<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/admin/Admin.php';

class Disable extends Admin {

    /**
     * Constructeur de la suppression des produits
     */
    public function __construct()
    {
        parent::__construct();
    }

	public function index(){
        $this->load->model('Product');
        $product_id = $this->input->post('id');
        $this->Product->_disable($this->input->post('id'));
        redirect('product/liste', 'refresh');
    }
}
