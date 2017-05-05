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
}