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
    public function sales()
    {
        return $this->db->table('tblcustomer')->select_sum('total_price', 'total_price')->get();
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

   //get fields from different tables for drop down
    public function getallsuppliername(){
        return $this->db->table('supplier')->get_all();
    }
    public function getallprodname(){
        return $this->db->table('products')->get_all();
    }
    public function getallpricename(){
        return $this->db->table('tblsupply')->get_all();
    }

}
?>
