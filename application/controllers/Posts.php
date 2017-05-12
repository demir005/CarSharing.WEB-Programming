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
	
	
	public function view($mjestoOdredista=NULL){
		$data['posts'] = $this->Posts_model->get_posts($mjestoOdredista);
		
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
		$data['categories'] = $this->Posts_model->get_categories();
		
		$this->form_validation->set_rules('mjestoPolaska','Mjesto Polaska', 'required');
		$this->form_validation->set_rules('mjestoOdredista','Mjesto Odredista', 'required');
		
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
	
	public function edit($mjestoOdredista){
		$data['mjestoOdredista']= $this->Posts_model->get_posts($mjestoOdredista);
		$data['categories'] = $this->Posts_model->get_categories();
		
		if(empty($data['mjestoOdredista'])){
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
	
