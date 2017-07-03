<?php

class Product extends CI_Model{

    public function get_all(){
        /**
         * Récupération de tous les produits
         */
        $this->db->select('p.*, pc.stockable');
        $this->db->from('product p');
        $this->db->join('product_category pc', 'p.product_category_id = pc.id');
        /**
         * Si "product_category est défini, alors on filtre sur la catégorie.
         * Sinon, on affiche tout sauf les livraisons.
         */
        if (! $this->input->get('product_category') == FALSE){
            $this->db->where('p.product_category_id', $this->input->get('product_category'));
        }
        else {
            $this->db->where('p.product_category_id !=', 3);
        }
        /**
         * en base de données un booléen vaut 0 ou 1.
         * Si je veux filtrer les produits inactifs (0), alors 0 == FALSE.
         * Une demande de filtrage passe inapercue.
         * Au lieu de filtrer directement les valeurs booléeenes,
         * je filtre sur 1 et 2, et envoie le reste de la division euclidienne par 2 à la requête.
         */
        if (! $this->input->get('active') == FALSE){
            $this->db->where('p.active', $this->input->get('active')%2);
        }
        else{
            $this->db->where('p.active', 1);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function add_to_stock($product_id, $qty){
        $this->db->where('id', $product_id);
        $query = $this->db->get('product');
        $product = $query->row();
        $new_qty = $product->stock + $qty;
        $this->db->set('stock', $new_qty);
        $this->db->where('id', $product_id);
        $this->db->update('product');
    }

    public function get_delivery_modes(){
        $this->db->where('product_category_id', '3');
        $this->db->order_by('price', 'ASC');
        $query = $this->db->get('product');
        return $query->result();
    }

    public function get_product_by_id($id){
        /**
         * Récupération du produit qui matche l'id
         */
        $this->db->select('p.*, pc.stockable');
        $this->db->from('product p');
        $this->db->join('product_category pc', 'p.product_category_id = pc.id');
        $this->db->where('p.id', $id);
        $query = $this->db->get();
        return $query->first_row();
    }

    public function _insert(){
        /**
         * insertion du produit
         */
        $data = array(
            "product_category_id" => $this->input->post('product_category_id'),
            "price" => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'stock' => $this->input->post('stock')
        );
        $this->db->insert('product', $data);
    }

    public function _update($id){
        /**
         * mise à jour du produit qui matche l'id
         */
        $data = array(
            "product_category_id" => $this->input->post('product_category_id'),
            "price" => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'stock' => $this->input->post('stock')
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('product');
    }

    public function update_stock($product_id, $product_qty){
        $data = array(
            'stock' => $product_qty
        );
        $this->db->set($data);
        $this->db->where('id', $product_id);
        $this->db->update('product');
    }

    public function _delete($id){
        $this->db->where('id', $id);
        $this->db->delete('product');
    }

    public function _disable($id){
        $this->db->set('active', 0);
        $this->db->where('id', $id);
        $this->db->update('product');
    }


    public function _enable($id){
        $this->db->set('active', 1);
        $this->db->where('id', $id);
        $this->db->update('product');
    }

    public function _get_price($id){
        $this->db->select('price');
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        $product = $query->first_row();
        return $product->price;
    }

    public function _get_stock($id){
        $this->db->select('stock');
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        $product = $query->first_row();
        return $product->stock;
    }
}

?>
