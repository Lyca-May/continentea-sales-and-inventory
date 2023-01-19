<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Controller {
	public function index() {
		$this->call->view('register');
	}
    public function register(){
        $name = $this->io->post('name');
        $username = $this->io->post('username');
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        $result = $this->User_model->add_user($name, $username,$email, $password);
        if($result){
            $this->call->view('register');
        }
        else{
            $this->call->view('login');
        }
    }

}
?>