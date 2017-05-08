<?php
 class Posts_Model extends CI_Model{
 	
 	public function __construct(){
 		$this->load->database();
 	}
 	
 	public function get_posts($mjesto_polaska=FALSE){
 		if($mjesto_polaska === FALSE){
 			$this->db->order_by('id','DESC');
 			$query=$this->db->get('posts');
 			return $query->result_array(); 
 		}
 		$query=$this->db->get_where('posts', array('mjesto_polaska' => $mjesto_polaska));
 		return $query->row_array(); 
 	}
 	
 	public function create_post(){
 		$mjesto_polaska=url_title($this->input->post('title'));
 		
 		$data=array(
 				'mjesto_polaska'=>$mjesto_polaska,
 				'mjesto_odredista'=>$this->input->post('mjesto_odredista'), 
 				'datum_polaska'=>$this->input->post('datum_polaska'), 
 				'datum_povratka'=>$this->input->post('datum_povratka'), 
 				'cijena'=>$this->input->post('cijena'), 
 				'broj_mjesta'=>$this->input->post('broj_mjesta'), 
 				'opis'=>$this->input->post('opis'), 
 				
 				
 		);
 		return $this->db->insert('posts',$data);
 	}
 }