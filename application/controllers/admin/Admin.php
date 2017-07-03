<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $admin = $this->session->userdata('admin'); 
        if ($admin != 1 ){
            show_404();
        }
    }
}
