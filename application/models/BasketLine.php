<?php

class BasketLine extends CI_Model{

    public function _insert($product_id, $basket_id, $product_qty){
        $this->load->model('Product');
        $this->load->model('Basket');
        // Récupération des données necessaires
        $product = $this->Product->get_product_by_id($product_id);
        // Compute du prix total
        $total_price = $product->price * $product_qty;
        // Création de la ligne de panier
        $basket_line = $this->basket_line_already_exists($basket_id, $product_id);
        // Si la ligne de panier existe, on l'update
        if ($basket_line){
            $this->update_basket_line_amount($basket_line, $total_price, $product_qty); //FIXME
        }
        // Sinon on la créé
        else {
            $data = array(
                "basket_id" => $basket_id,
                "product_id" => $product_id,
                "product_qty" => $product_qty,
                "amount" => $total_price
            );
            $this->db->insert('basket_line', $data);
        }
        // Update du prix du panier
        $this->Basket->_update($basket_id);
        // Modification du stock produit si le produit est stockable
        if ( $product->stockable ) {
            $updated_qty = $product->stock - $product_qty;
            $this->Product->update_stock($product->id, $updated_qty);
        }
    }

    public function add_delivery($delivery_mode_id, $basket_id){
        $this->load->model('Product');
        $this->load->model('Basket');
        $delivery_mode = $this->Product->get_product_by_id($delivery_mode_id);
        $data = array(
            "basket_id" => $basket_id,
            "product_id" => $delivery_mode_id,
            "product_qty" => 1,
            "amount" => $delivery_mode->price
        );
        $this->db->insert('basket_line', $data);
        $this->Basket->_update($basket_id);
    }

    public function disable($basket_line_id){
        /**
         * Désactivation de la ligne de panier
         */
        $this->db->where('id', $basket_line_id);
        $this->db->set('active', 0);
        $this->db->update('basket_line');
    }

    public function _delete($basket_line_id){
        $this->db->where('id', $basket_line_id);
        $this->db->delete('basket_line');
    }

    public function update_basket_line_amount($basket_line, $total_price, $product_qty){
        /**
         * Modification de la quantité et du montant de la ligne.
         */
        $this->db->select('product_qty, amount'); // récupération des informations de la ligne avant update
        $this->db->from('basket_line');
        $this->db->where('id', $basket_line);
        $query = $this->db->get();
        $lb = $query->row();
        // On somme les quantités et les montants.
        $this->db->set('amount', $lb->amount + $total_price);
        $this->db->set('product_qty', $lb->product_qty + $product_qty);
        $this->db->where('id', $basket_line);
        $this->db->update('basket_line');
    }

    public function basket_line_already_exists($basket_id, $product_id){
        $this->db->where('active', 1);
        $this->db->where('product_id', $product_id);
        $this->db->where('basket_id', $basket_id);
        $query = $this->db->get('basket_line');
        $basket_line = $query->row();
        if ($basket_line){
            return $basket_line->id;
        }
    }
}

?>
