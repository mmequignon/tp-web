<?php

class Users extends CI_Model{

    public function get_all(){
        // Récupère tous les utilisateurs actifs
        $this->db->where('active', 1);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_user_by_id($id){
        // Récupère l'utilisateur dont l'id correspond à celui passé en paramètre.
        $this->db->where('id', $id);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->first_row();
    }

    public function _insert(){
        $this->load->model('Basket');
        $this->db->insert('basket', array("amount" => 0.0));
        $data = array(
            "login" => $this->input->post('login'),
            "password" => hash("sha256", $this->input->post('password')),
            "email" => $this->input->post('email'),
            "lastname" => $this->input->post('lastname'),
            "firstname" => $this->input->post('firstname'),
            "admin" => $this->input->post('admin'),
            "basket_id" => $this->db->insert_id(),
            "postcode" => $this->input->post('postcode'),
            "city" => $this->input->post('city'),
            "street" => $this->input->post('street')
        );
        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();
    }

    public function _delete($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function _disable($id){
        $this->db->set('active', 0);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function _update($id){
        $data = array(
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'postcode' => $this->input->post('postcode'),
            'city' => $this->input->post('city'),
            'street' => $this->input->post('street')
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function password_update($user_id, $password){
        $this->db->set('password', $password);
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }

    public function _check_cretendials(){
        // Cherche en base si un utilisateur correspond aux données récupérées
        $data = array(
            "login" => $this->input->post('login'),
            "password" => hash("sha256", $this->input->post('password'))
        );
        $this->db->where($data);
        $this->db->from('users');
        $query = $this->db->get();
        $user = $query->first_row();
        // Si un utilisateur existe, on place des infos en session
        if (! empty($user) ){
            $this->load->library('session');
            $data = array(
                "logged" => TRUE,
                "id" => $user->id,
                "login" => $user->login,
                "admin" => $user->admin,
                "basket" => $user->basket_id,
            );
            $this->session->set_userdata($data);
            return TRUE;
        }
        return FALSE;
    }
}

?>
