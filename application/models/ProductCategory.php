<?php

class ProductCategory extends CI_Model{

    public function get_all(){
        $this->db->where('active', 1);
        $this->db->where('id !=', 3);
        $query = $this->db->get('product_category');
        return $query->result();
    }

    public function _insert(){
        $data = array(
            'name' => $this->input->post('name'),
            'stockable' => ($this->input->post('stockable')) ? 1 : 0
        );
        $this->db->insert('product_category', $data);
    }

}
