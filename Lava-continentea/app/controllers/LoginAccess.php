<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginAccess extends Controller {
    public function index(){
        $this->call->view('login');
    }
    public function _in(){
        $data['users']=$this->LoginAccess_model->getalluser();
        $this->call->view('customer/customerTable',$data);
    }
    public function Updated(){
        $this->LoginAccess_model->update(
        $this->io->post('id'),    
        $this->io->post('name'),
        $this->io->post('username'),
        $this->io->post('email'),
        $this->io->post('password')
        );
        redirect('LoginAccess/_in');
    }
    public function userupdate(){
        $data=[
            'user'=>$this->LoginAccess_model->getuser($this->io->post('id'))
        ];
        $this->call->view('updateuser', $data);
    }
    public function userdelete(){
        $this->LoginAccess_model->delete($this->io->post('id'));
        redirect('LoginAccess/_in'); 
    }
	public function access() {
		if ($this->form_validation->submitted())
        {
            $this->form_validation
                ->name('email')
                    ->valid_email('Enter valid email.')
                    ->required('Enter your email first.')
                    ->min_length(2)-> max_length(255)
                ->name('password')
                    ->required('Password is required')
                    ->min_length(5,'atleast 5 characters') 
                    ->max_length(11,'Maximum characters has been reached.')
                ;
                if($this->form_validation->run()){
                    $email=$this->io->post('email');
                    $password=$this->io->post('password');
                    $data['user']=$this->LoginAccess_model->check($email, $password);
                    if($data['user']){
                        $this->session->set_userdata('user',$data);
                        $msg=[
                            'status'=>'Welcome'
                        ];
                        // redirect('LoginAccess/dash');
                        $this->call->view('login',$data);

                    }
                   // $this->call->view('UserAccess');
                    else
                    {
                        $data['errors']=$this->form_validation->get_errors();
                        redirect('LoginAccess/dash');
                    }        
                }
                else
                {
                    $data['errors']=$this->form_validation->get_errors();
                    $this->call->view('login',$data);
                }    
        }
        else
        {
            redirect('LoginAccess/index');
        }
        
	}
    public function dash() {
        $this->session->has_userdata();
        $data['total_users']=$this->LoginAccess_model->countUsers();
        $data['total_product']=$this->LoginAccess_model->countProduct();
        $data['total_customer']=$this->LoginAccess_model->countCustomer();
        $data['users']=$this->LoginAccess_model->getalluser();
        $this->call->view('dashboard',$data);
    }





    // FOR PRODUCT
    public function prod(){
        $data['products']=$this->LoginAccess_model->getallproduct();
        $this->call->view('product/productTable',$data);

    }
    public function UpdateProd(){
        $this->LoginAccess_model->updateprod(
        $this->io->post('id'),    
        $this->io->post('prodname'),
        $this->io->post('price'),
        $this->io->post('quantity'),
        );
        redirect('LoginAccess/prod');
    }
    public function Productupdate(){
        $data=[
            'products'=>$this->LoginAccess_model->getprod($this->io->post('id'))
        ];
        $this->call->view('updateProduct', $data);
    }
    public function proddelete(){
        $this->LoginAccess_model->deleteProd($this->io->post('id'));
        redirect('LoginAccess/prod'); 
    }
    public function addProduct(){
        $prodname = $this->io->post('prodname');
        $price = $this->io->post('price');
        $quantity = $this->io->post('quantity');
        $result = $this->LoginAccess_model->addProd($prodname, $price, $quantity);
        
        if($result){
            redirect('LoginAccess/prod');
        }
        else{
            redirect('LoginAccess/prod');
        }
    }
    public function addform() {
        $this->call->view('addProduct');
    }




    //for supply
    public function supply(){
        $data['supplier']=$this->LoginAccess_model->getallsupply();
        $this->call->view('supplier/supplierTable',$data);
    }
    public function UpdateSupply(){
        $this->LoginAccess_model->UpdateSupply(
        $this->io->post('id'),    
        $this->io->post('name'),
        $this->io->post('company'),
        $this->io->post('address'),
        $this->io->post('contact_no')
        );
        redirect('LoginAccess/supply');
    }

    public function Supplyupdate(){
        $data=[
            'supplier'=>$this->LoginAccess_model->getsupply($this->io->post('id'))
        ];
        $this->call->view('updateSupply', $data);
    }
    public function supplydelete(){
        $this->LoginAccess_model->deletesupply($this->io->post('id'));
        redirect('LoginAccess/supply'); 
    }

    
    public function addSupply(){
        $name = $this->io->post('name');
        $company = $this->io->post('company');
        $address = $this->io->post('address');
        $contact_no = $this->io->post('contact_no');
        $result = $this->LoginAccess_model->addSupply($name, $company, $address, $contact_no);
        if($result){
            redirect('LoginAccess/supply');
        }
        else{
            redirect('LoginAccess/supply');
        }
    }

    public function addformSupply() {
        $this->call->view('addSupply');
    }





    //for customer
    public function customer(){
        $data['customer']=$this->LoginAccess_model->getallcustomer();
        $this->call->view('customerTable',$data);
    }
    public function UpdateCustomer(){
        $this->LoginAccess_model->updatecustomer(
        $this->io->post('id'),    
        $this->io->post('customer_name'),
        $this->io->post('product'),
        $this->io->post('price'),
        $this->io->post('quantity'),
        $this->io->post('total_price')
        );
        redirect('LoginAccess/customer');
    }
    public function Customerupdate(){
        $data=[
            'customer'=>$this->LoginAccess_model->getcustomer($this->io->post('id'))
        ];
        $this->call->view('UpdateCustomer', $data);
    }
    public function Customerdelete(){
        $this->LoginAccess_model->deletecustomer($this->io->post('id'));
        redirect('LoginAccess/customer'); 
    }
    public function addCustomer(){
        $customer_name = $this->io->post('customer_name');
        $product = $this->io->post('product');
        $price = $this->io->post('price');
        $quantity = $this->io->post('quantity');
        $total_price = $this->io->post('total_price');
        $result = $this->LoginAccess_model->addcustomer($customer_name, $product, $price, $quantity, $total_price);
        if($result){
            redirect('LoginAccess/customer');
        }
        else{
            redirect('LoginAccess/customer');
        }
    }

    public function addformCustomer() {
        $this->call->view('addCustomer');
    }



    //for supply
     public function Supplyprod(){
        $data['supply']=$this->LoginAccess_model->getallSupplyprod();
        $this->call->view('supply/supplyTable',$data);
    }
    public function UpdateSupplyprod(){
        $this->LoginAccess_model->updateSupplyprod(
        $this->io->post('supply_id'),    
        $this->io->post('products'),
        $this->io->post('stocks'),
        );
        redirect('LoginAccess/Supplyprod');
    }

    public function Supplyupdateprod(){
        $data=[
            'supply'=>$this->LoginAccess_model->getSupplyprod($this->io->post('supply_id'))
        ];
        $this->call->view('UpdateSupply', $data);
    }
    public function Supplydeleteprod(){
        $this->LoginAccess_model->deleteSupplyprod($this->io->post('supply_id'));
        redirect('LoginAccess/Supplyprod'); 
    }

    public function AddSupplyprod()
    {  
        $products = $this->io->post('products');
        $stocks = $this->io->post('stocks');
        $supplier_name = $this->io->post('supplier_name');

        $result = $this->LoginAccess_model->addsupplyprod($products, $stocks, $supplier_name);
        if($result){
            redirect('LoginAccess/Supplyprod');
        }
        else{
            redirect('LoginAccess/AddSupplyprod');
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    // public function addformSupplyProd() {
    //     // $this->session->has_userdata();
    //     $data =$this->LoginAccess_model->getsuppliername();
    //     $this->call->view('supply/addsupplyprod', $data);

    //     // $data['name']=$this->LoginAccess_model->getsuppliername();
    // }
    
    public function addnewsupply(){
        $data['supplier_names'] = $this->LoginAccess_model->getallsuppliername();
        $this->call->view('supply/addsupplyprod', $data);



    }



}
?>