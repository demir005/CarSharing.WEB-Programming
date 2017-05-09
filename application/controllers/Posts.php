	<?php


class Posts extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Posts_model');
	}
	
	public function index($page='home'){
		
		
		$data['posts']= $this->Posts_model->get_posts();
		
		$this->load->view('templates/header');
		$this->load->view('posts/index',$data);
		$this->load->view('templates/footer');
	}
	
	
	public function view($mjesto_polaska=NULL){
		$data['posts'] = $this->Posts_model->get_posts($mjesto_polaska);
		
		if(empty($data['posts'])){
			show_404();
		}
		$data['id'] =$data['posts'];
		
		$this->load->view('templates/header');
		$this->load->view('posts/view',$data);
		$this->load->view('templates/footer');
	}
	
	
	public function create(){
		$data['title'] ='Create Posts';
		
		if($this->form_validation->run()===FALSE){
			
			$this->load->view('templates/header');
			$this->load->view('posts/create',$data);
			$this->load->view('templates/footer');
			
		}else {
			$this->Posts_model->create_post();
			redirect('posts');
		}
		
	}
	
	public function delete($id){
		$this->Posts_model->delete_post($id);
	
		redirect('posts');
	}
	
	public function edit($id){
		$data['mjesto_odredista']= $this->Posts_model->get_posts($id);
		
		if(empty($data['mjesto_odredista'])){
			show_404();
		}
		$data['id'] = 'Edit Post';
		
		$this->load->view('templates/header');
		$this->load->view('posts/edit',$data);
		$this->load->view('templates/footer');
	}
	
	public function update(){
		$this->Posts_model->update_post();
		redirect('posts');
	}
		
	}
	
