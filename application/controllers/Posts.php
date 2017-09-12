<?php


class Posts extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->database();	
        $this->load->library('upload');
       
    }

    public function index($offset = 0){
    	
   
       
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');
        
        $this->pagination->initialize($config);
        
        $data['posts']= $this->Posts_model->get_posts(FALSE,$config['per_page'],$offset);

        $this->load->view('templates/header');
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer');
        
        
        
    }


    public function view($mjestoOdredista=NULL){


        $data['posts'] = $this->Posts_model->get_posts($mjestoOdredista);
        $post_id = $data['posts']['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);

        if(empty($data['posts'])){
            show_404();
        }
        $data['id'] =$data['posts'];

        $this->load->view('templates/header');
        $this->load->view('posts/view',$data);
        $this->load->view('templates/footer');
        
      
    }


    public function create()
    {
    	//check if user is logged in
    	if (!$this->session->userdata('logged_in')) {
    		redirect('users/login');
    	}
    	
    	$this->form_validation->set_rules('mjestoPolaska', 'Mjesto Polaska', 'required');
    	$this->form_validation->set_rules('mjestoOdredista', 'Mjesto Odredista', 'required');
    	$this->form_validation->set_rules('datumPolaska', 'Datum Polaska', 'required');
    	$this->form_validation->set_rules('datumPovratka', 'Datum Povratka', 'required');
    	$this->form_validation->set_rules('cijena', 'Cijena', 'required');
    	$this->form_validation->set_rules('brojMjesta', 'Broj mjesta', 'required');
    	$this->form_validation->set_rules('opis', 'Opis', 'required');
    	
    	
    	$data['title'] = 'Create Posts';
    	$data['categories'] = $this->Posts_model->get_categories();
    	
    	if ($this->form_validation->run() === FALSE) {
    		
    		$this->session->set_flashdata("error", validation_errors());
    		$this->load->view('templates/header');
    		$this->load->view('posts/create', $data);
    		$this->load->view('templates/footer');
    	} else {
    		
    	 
    		
    		$path = 'assets/images/posts/';
    		$post_image = $this->ImageUpload($path, 'userfile', '');
    		if (!is_array($post_image)) {
    			
    			$this->session->set_flashdata('error', $post_image);
    			redirect(site_url() . 'posts/create');
    		}
    		$post_image = $post_image['file_name'];
    		
    		$this->Posts_model->create_post($post_image);
    		$this->session->set_flashdata('post_creted', 'You post has been created');
    		redirect('posts');
    	}
    }
    
    public function ImageUpload($upload_path, $uploading_file_name, $file_name = '') {
    	
    	$obj = &get_instance();
    	$obj->load->library('upload');
    	
    	$file_name = 'image_' . time() . $file_name . "." . pathinfo($_FILES[$uploading_file_name]['name'], PATHINFO_EXTENSION);
    	$full_path = FCPATH . $upload_path;
        $full_path = $upload_path;
    	
    	
    	$config['upload_path'] = $full_path;
    	$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
    	$config['max_size'] = 2048;
    	$config['max_width'] = 2048;
    	$config['max_height'] = 2048;
    	$config['file_name'] = $file_name;
    	
    	$obj->upload->initialize($config);
    	
    	if (!$obj->upload->do_upload($uploading_file_name)) {
    		return $obj->upload->display_errors();
    	} else {
    		return $obj->upload->data();
    	}
    }

    public function delete($id){

        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }


        $this->Posts_model->delete_post($id);
        $this->session->set_flashdata('post_deleted', 'You post has been deleted  ') ;
        redirect('posts');
    }



    public function edit($mjestoOdredista){
    	if(!$this->session->userdata('logged_in')){
    		redirect('users/login');
    	}
    	
    	$data['posts']= $this->Posts_model->get_posts($mjestoOdredista);
    	
    	//Check if user is logged in
    	if($this->session->userdata('user_id') != $this->Posts_model->get_posts($mjestoOdredista)['user_id']){
    		redirect('posts');
    	}
    	
    	$data['categories'] = $this->Posts_model->get_categories();
    	
    	if(empty($data['posts'])){
    		show_404();
    	}
    	
    	$data['title'] = 'Edit Post';
    	$this->load->view('templates/header');
    	$this->load->view('posts/edit',$data);
    	$this->load->view('templates/footer');
    }


    public function update(){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $this->Posts_model->update_post();
        $this->session->set_flashdata('post_updated', 'You post has been updated ') ;
        redirect('posts');

    }

    }

?>