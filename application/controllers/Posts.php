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
		$post_id = $data['posts']['id'];
		$data['comments'] = $this->Comment_model->get_comments($post_id);
		
		
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
			
			//upload image
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '500';
			$config['max_height'] = '500';
			
			$this->load->libary('upload', $config);
			
			if(!$this->upload->do_upload()){
				$error=array('error'=>$this->upload->display_errors());
				$post_image='noimage.jpg';
			}else{
				$data = array('upload_data'=>$this->upload->data());
				$post_image =$_FILES['userfile']['name'];
			}
			$this->Posts_model->create_post($post_image);
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
	
