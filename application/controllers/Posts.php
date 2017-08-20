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
        
        
        //loading post model for fetching all data from database and dispaly in view.php
        $this->load->model('Posts_model');
        $data['get_data_from_db'] = $this->Posts_model->get_data_from_db();
        $this->load->view('posts/view', $data);
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


    public function create(){
        //check if user is logged in
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
			
       $this->form_validation->set_rules('mjestoPolaska', 'Mjesto Polaska', 'required');
       $this->form_validation->set_rules('mjestoOdredista', 'Mjesto Odredista', 'required');
       $this->form_validation->set_rules('datumPolaska', 'Datum Polaska', 'required');
       $this->form_validation->set_rules('datumPovratka', 'Datum Odredista', 'required');
       $this->form_validation->set_rules('cijena', 'Cijena', 'required');
       $this->form_validation->set_rules('brojMjesta', 'Broj mjesta', 'required');
      // $this->form_validation->set_rules('opis', 'Opis', 'required');
      // $this->form_validation->set_rules('post_image', 'Image', 'required');
        
        $data['title'] ='Create Posts';
        $data['categories'] = $this->Posts_model->get_categories();



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

            $this->load->library('upload');
            

            if(!$this->upload->do_upload()){
                $error=array('error'=>$this->upload->display_errors());
                $post_image='noimage.jpg';
            }else{
                $data = array('upload_data'=>$this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            $this->Posts_model->create_post($post_image);
            $this->session->set_flashdata('post_creted', 'You post has been created') ;
            redirect('posts');
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



    public function edit($slug){
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['mjestoOdredista']= $this->Posts_model->get_posts($slug);

        //Check if user is logged in
        if($this->session->userdata('user_id') != $this->Posts_model->get_posts($slug)['user_id']){
        	redirect('posts');
        }
            
        $data['categories'] = $this->Posts_model->get_categories();

        if(empty($data['slug'])){
            show_404();
        }

        $data['id'] = 'Edit Post';
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