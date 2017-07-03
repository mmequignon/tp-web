<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/admin/Admin.php';

class Create extends Admin {

    /**
     * Liste constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $this->load->library('session');
        $this->load->model('ProductCategory');
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        $product_categories = $this->ProductCategory->get_all();
        $data = array(
            "page" => "product",
            "title" => "Create",
            "product_categories" => $product_categories,
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('admin/product/create');
        $this->load->view('base/footer');
	}

    public function save(){
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run()){
            $this->load->model('Product');
            $this->Product->_insert();
            redirect('product/liste', 'refresh');
        }
        else{
            $this->index();
        }
    }
}
