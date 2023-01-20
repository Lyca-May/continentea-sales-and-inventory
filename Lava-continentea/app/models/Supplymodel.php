<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Supplymodel extends Model {

	//for supply
    public function getallSupplyprod(){
        return $this->db->table('tblsupply')->get_all();
    }
    public function getSupplyprod($id){
        return $this->db->table('tblsupply')->where('supply_id', $id)->get();
    }
    public function updateSupplyprod($supply_id, $products, $stocks, $supplier_name){
        $data= [
            'supply_id' => $supply_id, 
            'products' => $products,
            'stocks' => $stocks,
            'supplier_name' => $supplier_name,
        ];
        return $this->db->table('tblsupply')->where('supply_id', $supply_id)->update($data);
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
}
?>