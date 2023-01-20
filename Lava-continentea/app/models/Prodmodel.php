<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Prodmodel extends Model {


    // FOR PRODUCT
    public function getallproduct(){
        return $this->db->table('product')->get_all();
    }
    public function getprod($id){
        return $this->db->table('product')->where('id', $id)->get();
    }
    public function updateprod($id, $prodname, $price, $quantity){
        $data= [
            'id' => $id, 
            'prodname' => $prodname, 
            'price' => $price,
            'quantity' => $quantity
        ];
        $this->db->table('product')->where('id', $id)->update($data);
    }
    public function deleteProd($id){
        return $this->db->table('product')->where('id',$id)->delete();
    }
    public function addProd($prodname, $price, $quantity){
        $data=[
            'prodname' => $prodname,
            'price' => $price,
            'quantity' => $quantity

        ];  
        return $this->db->table('product')->insert($data);
    }



	// FOR PRODUCTLIST
    public function getallproductlist(){
        return $this->db->table('productlist')->get_all();
    }
    public function getprodlist($id){
        return $this->db->table('productlist')->where('id', $id)->get();
    }
    public function updateprodlist($id, $prodname, $price, $category){
        $data= [
            'id' => $id, 
            'prodname' => $prodname, 
            'price' => $price,
            'category' => $category,
        ];
        $this->db->table('productlist')->where('id', $id)->update($data);
    }
    public function deleteProdlist($id){
        return $this->db->table('productlist')->where('id',$id)->delete();
    }
    public function addProdlist($prodname, $price, $category){
        $data=[
            'prodname' => $prodname,
            'price' => $price,
            'category' => $category,
        ]; 
        return $this->db->table('productlist')->insert($data);
    }
    public function getallprodname(){
        return $this->db->table('tblsupply')->get_all();
    }
}
?>

