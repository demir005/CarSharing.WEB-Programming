<?php
 class Posts_Model extends CI_Model{
 	
 	public function __construct(){
 		$this->load->database();
 	}
 	
 	public function get_posts($mjesto_polaska=FALSE){
 		if($mjesto_polaska === FALSE){
 			$query=$this->db->get('posts');
 			return $query->result_array(); 
 		}
 		$query=$this->db->get_where('posts', array('mjesto_polaska' => $mjesto_polaska));
 		return $query->row_array(); 
 	}
 }