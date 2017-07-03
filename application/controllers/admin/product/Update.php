<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/admin/Admin.php';

class Update extends Admin {

    public function __construct()
    {
        parent::__construct();
    }

	public function index(){
        $this->load->model('Product');
        $this->load->model('ProductCategory');
        // On récupère des informations de la session courante,
        // afin de les passer aux vues.
        $this->load->library('session');
        $admin = $this->session->userdata('admin'); 
        $logged = $this->session->userdata('logged'); 
        // On place toutes les catégories de produits dans une variable
        $product_categories = $this->ProductCategory->get_all();
        // On génère un objet à partir de l'id récupéré
        // par la méthode POST.
        $product_id = $this->input->post('id');
        $product = $this->Product->get_product_by_id($product_id);
        // On place tout dans un tableau qu'on passe aux vues.
        $data = array(
            "page" => "product",
            "title" => "Update",
            "id" => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
            'categ_id' => $product->product_category_id,
            'product_categories' => $product_categories,
            "logged" => $logged,
            "admin" => $admin
        );
        $this->load->view('base/header', $data);
        $this->load->view('admin/product/update', $data);
        $this->load->view('base/footer');
	}

    public function save(){
        // Vérifications sur le formulaire.
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if ($this->form_validation->run()){
            // Update du produit.
            $this->load->model('Product');
            $this->Product->_update($this->input->post('id'));
            redirect('product/liste', 'refresh');
        }
        else{
            $this->index();
        }
    }
}
