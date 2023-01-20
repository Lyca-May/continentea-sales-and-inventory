<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Supplier extends Controller {

	 //for supply
     public function supplier(){
        $data['supplier']=$this->Suppliermodel->getallsupplier();
        $this->call->view('supplier/supplierTable',$data);
    }
    public function UpdateSupplier(){
        $this->Customermodel->updatesupplier(
        $this->io->post('id'),    
        $this->io->post('name'),
        $this->io->post('company'),
        $this->io->post('address'),
        $this->io->post('contact_no')
        );
        redirect('Supplier/supply');
    }

    public function Supplierupdate(){
        $data=[
            'supplier'=>$this->Suppliermodel->getsupplier($this->io->post('id'))
        ];
        $this->call->view('supplier/updateSupplier', $data);
    }
    public function supplierdelete(){
        $this->Suppliermodel->deletesupplier($this->io->post('id'));
        redirect('Supplier/supply'); 
    }

    
    public function addSupplier(){
        $name = $this->io->post('name');
        $company = $this->io->post('company');
        $address = $this->io->post('address');
        $contact_no = $this->io->post('contact_no');
        $result = $this->Suppliermodel->addsupplier($name, $company, $address, $contact_no);
        if($result){
            redirect('Supplier/supply');
        }
        else{
            redirect('Supplier/supply');
        }
    }
    public function addformsupplier() {
        $this->call->view('supplier/addSupplier');
    }

}
?>