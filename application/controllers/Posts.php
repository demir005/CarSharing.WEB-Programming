	<?php


class Posts extends CI_Controller{
	
	public function index($page='home'){
		
		$data['title']= 'Sve voznje';
		
		$data['posts'] = $this->Posts_model->get_posts();
		
		$this->load->view('templates/header');
		$this->load->view('posts/index',$data);
		$this->load->view('templates/footer');
	}
	
	public function view($mjesto_polaska=NULL){
		$data['posts'] = $this->Posts_model->get_posts($mjesto_polaska);
		if(empty($data['post'])){
			show_404();
		}
		$data['title'] = $data['mjesto_polaska']['mjesto_odredista'];
		
		$this->load->view('templates/header');
		$this->load->view('posts/view',$data);
		$this->load->view('templates/footer');
	}
	
	public function create(){
	//	$data['title'] = $data['Create Post'];
		
		$this->load->view('templates/header');
		$this->load->view('posts/create');
		$this->load->view('templates/footer');
		
	}
}