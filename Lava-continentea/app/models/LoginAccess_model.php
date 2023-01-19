<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginAccess_model extends Model {
    public function check($email, $password){
    $data= [
        'username' => $email,
        'password' => $password,
    ];
    return $this->db->table('tblmidpro')->where($data)->get();
    }
    public function countUsers()
    {
        return $this->db->table('tblmidpro')->select_count('id','total_users')->get();
    }
    public function countProduct()
    {
        return $this->db->table('product')->select_count('id','total_product')->get();
    }
    public function countSupply()
    {
        return $this->db->table('supplier')->select_count('id','total_supply')->get();
    }
    public function countCustomer()
    {
        return $this->db->table('tblcustomer')->select_count('id','total_customer')->get();
    }
    

    //for user
    public function getalluser(){
      return $this->db->table('tblmidpro')->get_all();
    }
    public function update($id, $name, $username, $email, $password){
        $data= [
            'id' => $id, 
            'name' => $name, 
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
        return $this->db->table('tblmidpro')->where('id', $id)->update($data);
    }
    public function getuser($id){
        return $this->db->table('tblmidpro')->where('id', $id)->get();
    }
    public function delete($id){
        return $this->db->table('tblmidpro')->where('id',$id)->delete();
    }



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



    //for supplier
    public function getallsupply(){
        return $this->db->table('supplier')->get_all();
    }
    public function getsupply($id){
        return $this->db->table('supplier')->where('id', $id)->get();
    }
    public function updatesupply($id, $name, $company, $address, $contact_no){
        $data= [
            'id' => $id, 
            'name' => $name, 
            'company' => $company,
            'address' => $address,
            'contact_no' => $contact_no
        ];
        return $this->db->table('supplier')->where('id', $id)->update($data);
    }
    public function deletesupply($id){
        return $this->db->table('supplier')->where('id',$id)->delete();
    }
    public function addsupply($name, $company, $address, $contact_no){
        $data=[
            'name' => $name, 
            'company' => $company,
            'address' => $address,
            'contact_no' => $contact_no
        ];
        
        return $this->db->table('supplier')->insert($data);
    }



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



    //for supply
    public function getallSupplyprod(){
        return $this->db->table('tblsupply')->get_all();
    }
    public function getSupplyprod($id){
        return $this->db->table('tblsupply')->where('supply_id', $id)->get();
    }
    public function updateSupplyprod($supply_id, $products, $stocks, $supplier_id){
        $data= [
            'supply_id' => $supply_id, 
            'products' => $products,
            'stocks' => $stocks,
            'supplier_id' => $supplier_id

        ];
        return $this->db->table('tblsupply')->where('supply_id', $id)->update($data);
    }
    public function deleteSupplyprod($id){
        return $this->db->table('tblsupply')->where('supply_id',$id)->delete();
    }
    public function addsupplyprod($products, $stocks, $supplier_name){
        $data= [
            'products' => $products,
            'stocks' => $stocks,
            'supplier_name' => $supplier_name
        ];
        $result=$this->db->table('tblsupply')->insert($data);
        if($result){
            return true;
        }
    }

   //get supplier name for drop down
    public function getallsuppliername(){
        return $this->db->table('supplier')->get_all();
    }

}
?>
