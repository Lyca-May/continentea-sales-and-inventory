<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginAccess extends Controller {
    public function index(){
        $this->call->view('login');
    }
    public function _in(){
        $data['users']=$this->LoginAccess_model->getalluser();
        $this->call->view('logged_user/usertable',$data);
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
        $this->call->view('logged_user/updateuser', $data);
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
        $data['total_p']=$this->LoginAccess_model->sales();
        $data['users']=$this->LoginAccess_model->getalluser();
        $this->call->view('dashboard',$data);
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

    //  public function getprodname(){
    //     $data['prod'] = $this->Prodmodel->getallprodname();
    //     $this->call->view('product/addProduct', $data);
    // }

    // public function addnewsupply(){
    //     $data['products'] = $this->LoginAccess_model->getallsuppliername();
    //     $this->call->view('supply/addsupplyprod', $data);
    // }

    // public function addnewsupply(){
    //     $data['supplier_names'] = $this->LoginAccess_model->getallsuppliername();
    //     $this->call->view('supply/addsupplyprod', $data);
    // }
    



}
?>