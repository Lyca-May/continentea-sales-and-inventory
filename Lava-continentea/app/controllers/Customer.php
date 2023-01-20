<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Customer extends Controller {
	
    //for customer
    public function customer(){
        $data['customer']=$this->Customermodel->getallcustomer();
        $this->call->view('customer/customerTable',$data);
    }
    public function UpdateCustomer(){
        $this->Customermodel->updatecustomer(
        $this->io->post('id'),    
        $this->io->post('customer_name'),
        $this->io->post('product'),
        $this->io->post('price'),
        $this->io->post('quantity'),
        $this->io->post('total_price')
        );
        redirect('Customer/customer');
    }
    public function Customerupdate(){
        $data=[ 
            'customer'=>$this->Customermodel->getcustomer($this->io->post('id'))
        ];
        $this->call->view('customer/UpdateCustomer', $data);
    }
    public function Customerdelete(){
        $this->Customermodel->deletecustomer($this->io->post('id'));
        redirect('Customer/customer'); 
    }
    public function addCustomer(){
        $customer_name = $this->io->post('customer_name');
        $product = $this->io->post('product');
        $price = $this->io->post('price');
        $quantity = $this->io->post('quantity');
        $total_price = $this->io->post('total_price');
        $result = $this->Customermodel->addcustomer($customer_name, $product, $price, $quantity, $total_price);
        if($result){
            redirect('Customer/customer');
        }
        else{
            redirect('Customer/customer');
        }
    }
    public function addformCustomer() {
        $data['prod'] = $this->Prodmodel->getallprodname();
        // $this->call->view('product/addProduct', $data);
        $this->call->view('customer/addCustomer', $data);
    }

}
?>