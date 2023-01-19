<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function add_user($name, $username, $email, $password) {
        $data=[
            'name' =>$name,
            'username' =>$username,
            'email' =>$email,
            'password' =>$password,   
        ];
        $this->db->table('tblmidpro')->insert($data);
    }
}
?>