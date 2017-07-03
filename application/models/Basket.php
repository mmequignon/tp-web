<?php

class Basket extends CI_Model{
    public function get_basket_lines_by_basket_id($basket_id){
        $this->db->select('bl.*, p.name');
        $this->db->from('basket_line bl');
        $this->db->join('product p', 'p.id = bl.product_id');
        $this->db->where('bl.basket_id', $basket_id);
        $this->db->where('bl.active', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_basket($basket_id){
        $this->db->where('id', $basket_id);
        $this->db->from('basket');
        $query = $this->db->get();
        return $query->first_row();
    }

    public function _reset($basket_id){
        $this->db->where('id', $basket_id);
        $this->db->set('amount', 0);
        $this->db->update('basket');
    }

    public function _update($basket_id){
        $this->db->select('SUM(amount) as sum');
        $this->db->from('basket_line');
        $this->db->where('basket_id', $basket_id);
        $this->db->where('active', 1);
        $query = $this->db->get();
        $amount = $query->row();
        /**
         * si le nouveau montant du panier est égal à 0, $amount->sum = FALSE
         * il faut tester la variable
         */
        $new_amount = ($amount->sum) ? $amount->sum : 0.0;
        $this->db->set("amount", $new_amount);
        $this->db->where('id', $basket_id);
        $this->db->update('basket');
    }

    public function get_basket_line_by_id($basket_line_id){
        $this->db->where('id', $basket_line_id);
        $query = $this->db->get('basket_line');
        return $query->row();
    }
}

?>
