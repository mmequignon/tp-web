<?php

class PaymentMode extends CI_Model{

    public function get_all(){
        $query = $this->db->get('payment_mode');
        return $query->result();
    }
}
