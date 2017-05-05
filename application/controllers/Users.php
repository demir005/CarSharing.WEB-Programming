<?php
class Users extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}    
	
	public function register(){
		$data['title'] = 'Sign Up';
		
		$this->form_validation->set_rules('name', 'Name','required');
		$this->form_validation->set_rules('surname', 'Surname','required');
		$this->form_validation->set_rules('address', 'Address','required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('phoneNumber', 'Phone Number','required');
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password', 'Password','required');
		$this->form_validation->set_rules('password2', 'Confirm Password','matches[password]');
		
		if($this->form_validation->run()==FALSE){
		//	$this->load->view('template/header.php');
			$this->load->view('users/register.php',$data);
		//$this->load->view('template/footer.php');
			
		}else{
			//Encrypt password
			$enc_password=md5($this->input->post('password'));
			$this->User_model->register($enc_password);
			
			//Set message
			$this->session->set_flashdata('user_registred',
					'You are now registered, you can sign in now');
			redirect('posts');
			
		}
		
	}
}