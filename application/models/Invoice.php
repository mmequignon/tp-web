<?php

class Invoice extends CI_Model{

    public function basket_to_invoice($user_id, $basket, $payment_mode){
        $vals = array(
            "user_id" => $user_id,
            "amount" => $basket->amount,
            "payment_mode_id" => $payment_mode
        );
        $this->db->set('create_date', 'NOW()', FALSE);
        $this->db->insert('invoice', $vals);
        return $this->db->insert_id();
    }

    public function get_invoices_by_user_id($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    public function get_invoice_by_id($id){
        $this->db->select('i.*, pm.name');
        $this->db->from('invoice i');
        $this->db->join('payment_mode pm', 'pm.id = i.payment_mode_id');
        $this->db->where('i.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}

?>
