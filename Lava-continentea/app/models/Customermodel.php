<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Customermodel extends Model {
	  //for customer
      public function getallcustomer(){
        return $this->db->table('tblcustomer')->get_all();
    }
    public function getcustomer($id){
        return $this->db->table('tblcustomer')->where('id', $id)->get();
    }
    public function updatecustomer($id, $customer_name, $product, $price, $quantity, $total_price){
        $data= [
            'id' => $id, 
            'customer_name' => $customer_name, 
            'product' => $product,
            'price' => $price,
            'quantity' => $quantity,
            'total_price' => $total_price

        ];
        return $this->db->table('tblcustomer')->where('id', $id)->update($data);
    }
    public function deletecustomer($id){
        return $this->db->table('tblcustomer')->where('id',$id)->delete();
    }
    public function addcustomer($customer_name, $product, $price, $quantity, $total_price){
        $data= [
            'customer_name' => $customer_name, 
            'product' => $product,
            'price' => $price,
            'quantity' => $quantity,
            'total_price' => $total_price
        ];   
        return $this->db->table('tblcustomer')->insert($data);
    }
}
?>