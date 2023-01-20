<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Prod extends Controller {

	// FOR PRODUCT
    public function prod(){
        $data['products']=$this->Prodmodel->getallproduct();
        $this->call->view('product/productTable',$data);

    }
    public function UpdateProd(){
        $this->Prodmodel->updateprod(
        $this->io->post('id'),    
        $this->io->post('prodname'),
        $this->io->post('price'),
        $this->io->post('quantity'),
        );
        redirect('Prod/prod');
    }
    public function Productupdate(){
        $data=[
            'products'=>$this->Prodmodel->getprod($this->io->post('id'))
        ];
        $this->call->view('product/updateProduct', $data);
    }
    public function proddelete(){
        $this->Prodmodel->deleteProd($this->io->post('id'));
        redirect('Prod/prod'); 
    }
    public function addProduct(){
        $prodname = $this->io->post('prodname');
        $price = $this->io->post('price');
        $quantity = $this->io->post('quantity');
        $result = $this->Prodmodel->addProd($prodname, $price, $quantity);
        
        if($result){
            redirect('Prod/prod');
        }
        else{
            redirect('Prod/prod');
        }
    }
    public function addform() {
        $this->call->view('product/addProduct');
    }
    //product list
    public function prodlist(){
        $data['productlist']=$this->Prodmodel->getallproductlist();
        $this->call->view('product/manageprod',$data);
    }
    public function UpdateProdlist(){
        $this->Prodmodel->updateprodlist(
        $this->io->post('id'),    
        $this->io->post('prodname'),
        $this->io->post('price'),
        $this->io->post('category'),
        );
        redirect('Prod/prodlist');
    }
    public function Productlistupdate(){
        $data=[
            'products'=>$this->Prodmodel->getprodlist($this->io->post('id'))
        ];
        $this->call->view('product/updateProduct', $data);
    }
    public function deleteProdlist(){
        $this->Prodmodel->deleteProdlist($this->io->post('id'));
        redirect('Prod/prodlist'); 
    }
    public function addProdlist(){
        $prodname = $this->io->post('prodname');
        $price = $this->io->post('price');
        $category = $this->io->post('category');
        $result = $this->Prodmodel->addProdlist($prodname, $price, $category);
        if($result){
            redirect('Prod/prodlist');
        }
        else{
            redirect('Prod/prodlist');
        }
    }
    //form
    public function addprodlistform() {
        $data['prod'] = $this->Prodmodel->getallprodname();
        $this->call->view('product/addProduct', $data);
        // $this->call->view('product/addProduct');
    }

    //get product name from supply table
   
}
?>