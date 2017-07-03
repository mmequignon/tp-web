<?php

class InvoiceLine extends CI_Model{

    public function basket_line_to_invoice_line($invoice_id, $basket_line){
        $vals = array(
            "invoice_id" => $invoice_id,
            "amount" => $basket_line->amount,
            "product_id" => $basket_line->product_id,
            "product_qty" => $basket_line->product_qty,
        );
        $this->db->insert('invoice_line', $vals);
    }

    public function get_invoice_lines_by_invoice_id($invoice_id){
        $this->db->select('il.*, p.name');
        $this->db->from('invoice_line il');
        $this->db->join('product p','il.product_id = p.id');
        $this->db->where('il.invoice_id', $invoice_id);
        $query = $this->db->get();
        return $query->result();
    }
}

?>
