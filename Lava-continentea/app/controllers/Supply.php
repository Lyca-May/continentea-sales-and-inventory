<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Supply extends Controller {
	
    //for supply
    public function Supplyprod(){
        $data['supply']=$this->Supplymodel->getallSupplyprod();
        $this->call->view('supply/supplyTable',$data);
    }
    public function UpdateSupplyprod(){
        $this->Supplymodel->updateSupplyprod(
        $this->io->post('supply_id'),    
        $this->io->post('products'),
        $this->io->post('stocks'),
        $this->io->post('supplier_name'),
        );
        redirect('Supply/Supplyprod');
    }
    public function Supplyupdateprod(){
        $data=[
            'supply'=>$this->Supplymodel->getSupplyprod($this->io->post('supply_id'))
        ];
        $this->call->view('supply/UpdateSupply', $data);
    }
    public function Supplydeleteprod(){
        $this->Supplymodel->deleteSupplyprod($this->io->post('supply_id'));
        redirect('Supply/Supplyprod'); 
    }
    public function AddSupplyprod()
    {  
        $products = $this->io->post('products');
        $stocks = $this->io->post('stocks');
        $supplier_name = $this->io->post('supplier_name');

        $result = $this->Supplymodel->addsupplyprod($products, $stocks, $supplier_name);
        if($result){
            redirect('Supply/Supplyprod');
        }
        else{
            redirect('Supply/AddSupplyprod');
        }
    } 

}
?>