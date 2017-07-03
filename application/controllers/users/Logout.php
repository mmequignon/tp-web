<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index(){
        // Suppression des infos de la session courante,
        // redirection vers la page de connexion.
        $this->load->library('session');
        $array_items = array('logged', 'id', 'login', 'admin');
        $this->session->unset_userdata($array_items);
        redirect('users/login');
	}
}
