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
        $this->load->model('ProductCategory');
    }

	public function index()
	{
        $this->load->library('session');
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        $data = array(
            "page" => "categories",
            "title" => "Create category",
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('base/errors');
        $this->load->view('admin/product_category/create');
        $this->load->view('base/footer');
	}

    public function save(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run()){
            $this->ProductCategory->_insert();
            redirect('admin/category/liste', 'refresh');
        }
        else{
            $this->index();
        }
    }
}
