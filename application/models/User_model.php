<?php
class User_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function register($enc_password){
		//data user array
		$data = array(
				'name'=>$this->input->post('name'),
				'surname'=>$this->input->post('surname'),
				'email'=>$this->input->post('email'),
				'address'=>$this->input->post('address'),
				'phoneNumber'=>$this->input->post('phoneNumber'),
				'username'=>$this->input->post('username'),
				'password'=>$enc_password
		);
		
		//Insert user
		return $this->db->insert('users',$data);
		
		
	}
	
	public function login($username,$password){
		//Validate
		
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		
		$result = $this->db->get('users');
		
		
		if($result->num_rows()==1){
			return $result->row(0)->id;
		}else{
			return false;
		}
	}
	
	
	
	
	//Check username exists
	
	public function check_username_exists($username){
		$query = $this->db->get_where('users',array('username'=>$username));
		if(empty($query->row_array())){
			return true;
		}
		else{
			return  false;
		}
	}
	
	public function check_email_exists($email){
		$query = $this->db->get_where('users',array('email'=>$email));
		if(empty($query->row_array())){
			return true;
		}
		else{
			return  false;
		}
	}
}