
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disable extends CI_Controller {

	public function index(){
        $this->load->model('Users');
        $user_id = $this->input->post('id');
        $this->Users->_disable($this->input->post('id'));
        redirect('admin/users/liste', 'refresh');
    }
}
