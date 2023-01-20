<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Suppliermodel extends Model {
	//for supplier
    public function getallsupplier(){
        return $this->db->table('supplier')->get_all();
    }
    public function getsupplier($id){
        return $this->db->table('supplier')->where('id', $id)->get();
    }
    public function updatesupplier($id, $name, $company, $address, $contact_no){
        $data= [
            'id' => $id, 
            'name' => $name, 
            'company' => $company,
            'address' => $address,
            'contact_no' => $contact_no
        ];
        return $this->db->table('supplier')->where('id', $id)->update($data);
    }
    public function deletesupplier($id){
        return $this->db->table('supplier')->where('id',$id)->delete();
    }
    public function addsupplier($name, $company, $address, $contact_no){
        $data=[
            'name' => $name, 
            'company' => $company,
            'address' => $address,
            'contact_no' => $contact_no
        ];
        
        return $this->db->table('supplier')->insert($data);
    }

}
?>