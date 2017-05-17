<?php

class User_model extends CI_Model{
	
	public function register($enc_password){
		
		$data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'address' => $this->input->post('address'),
				'email' =>   $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password
				
		);
		
		return $this->db->insert('users', $data);
		
	}
	
	//Log user in 
	
	public function login($username, $password){
		//Validate
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		
		$result= $this->db->get('users');
		
		if($result->num_rows()==1){
			return $result->row(0)->userID;
		}else{
			return false;
		}
	}
	
	public function check_username_exists($username){
		$query = $this->db->get_where('users',array('username'=>$username));
		if(empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}
	
	public function check_email_exists($email){
		$query = $this->db->get_where('users',array('email'=>$email));
		if(empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}
}