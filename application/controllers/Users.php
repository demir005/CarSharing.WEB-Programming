<?php
class Users extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}    
	
	// register user
	public function register(){
		$data['title'] = 'Sign Up';
		
		$this->form_validation->set_rules('name', 'Name','required');
		$this->form_validation->set_rules('surname', 'Surname','required');
		$this->form_validation->set_rules('address', 'Address','required');
		$this->form_validation->set_rules('email', 'Email','required|callback_check_email_exists');
		$this->form_validation->set_rules('phoneNumber', 'Phone Number','required');
		$this->form_validation->set_rules('username', 'Username','required|callback_check_username_exists');
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
	
	
	// Login user
	public function Login(){
		$data['title'] = 'Sign In';
		
		$this->form_validation->set_rules('username', 'Username','required|callback_check_username_exists');
		$this->form_validation->set_rules('password', 'Password','required');
		$this->form_validation->set_rules('password2', 'Confirm Password','matches[password]');
		
		if($this->form_validation->run()==FALSE){
			//	$this->load->view('template/header.php');
			$this->load->view('users/login',$data);
			//$this->load->view('template/footer.php');
			
		}else{
			//Get Username
			
			$username = $this->input->post('username');
			
			//Get and encrypt password
			
			$password = md5($this->input->post('password'));
			
			//Login user
			
			
			$user_id=$this->User_model->login($username,$password);
			
			if($user_id){
				//Create a session
				$user_data=array(
					'user_id'=>$user_id,
					'username'=>$username,
					'logged_in'=>true	
				);
				$this->session->set_userdata($user_data);
				
				$this->session->set_flashdata('user_loggedin',
						'You are now logged in');
				redirect('posts');
				
			}
			else{
					//Set message
					$this->session->set_flashdata('login_failed',
							'Login is invalid');
					redirect('user/login');
					
					}
			}
			
		
	}
	
	
	//Logout user
	public function logout(){
		//Unser user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		
		//set message
		
		$this->session->set_flashdata('user_loggedout',
				'You are now logged out');
		redirect('user/login');
		
			}
	}
	
	//Check if username exist
	function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists','That username alredy exsists.Please chose different one');
		
		if($this->User_model->check_username_exists($username)){
			return true;
		}else{
			return false;
		}
		
	}
	
	//Check if email exist
 function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists','That email alredy exsists.Please chose different one');
		
		if($this->User_model->check_email_exists($email)){
			return true;
		}else{
			return false;
		}
		
	}
}