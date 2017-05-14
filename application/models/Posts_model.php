<?php
 class Posts_Model extends CI_Model{
 	
 	public function __construct(){
 		$this->load->database();
 	}
 	
 	 function get_posts($mjestoOdredista=FALSE){
 		if($mjestoOdredista === FALSE){
 			$this->db->order_by('posts.id','DESC');
 			$this->db->join('categories','categories.id = posts.category_id');
 			$query=$this->db->get('posts');
 			
 			return $query->result_array();  
 		}
 		$query=$this->db->get_where('posts', array('mjestoOdredista' => $mjestoOdredista));
 		return $query->row_array(); 
 	}
 	
 	//Kreiranje post
 	public function create_post($post_image){
 		
 		$mjestoPolaska = url_title($this->input->post('title'));
 		
 		$data=array(
 				'mjestoPolaska' => $mjestoPolaska,
 				'mjestoOdredista' => $this->input ->post('mjestoOdredista'),
 				'vrsta_usluge' => $this->input ->post('vrsta_usluge'),
 				'datum_polaska' => $this->input ->post('datum_polaska'),
 				'datum_povratka' => $this->input ->post('datum_povratka'),
 				'cijena' => $this->input ->post('cijena'),
 				'broj_mjesta' => $this->input ->post('broj_mjesta'),
 				'opis' => $this->input ->post('opis'),
 				'category_id'=>$this->input->post('category_id'),
 				'post_image'=>$post_image
 				
 		);
 		
 		return $this->db->insert('posts',$data);
 		
 		
 	}
 	
 	public function delete_post($id){
 		$this->db->where('id',$id);
 		$this->db->delete('posts');
 		return true;
 	}
 	
 	public function update_post(){
 		$mjestoPolaska=url_title($this->input->post('Mjesto Polaska'));
 		$data=array(
 				'id' =>$this->input->post('id'),
 				'Mjesto Polaska' => $this->input ->post('mjestoPolaska'),
 				'Mjesto Odredista' => $this->input ->post('mjestoOdredista'),
 				'Vrsta usluge' => $this->input ->post('vrsta_usluge'),
 				'Datum Polaska' => $this->input ->post('datum_polaska'),
 				'Datum Povratka' => $this->input ->post('datum_povratka'),
 				'Cijena' => $this->input ->post('cijena'),
 				'Broj Mjesta' => $this->input ->post('broj_mjesta'),
 				'Opis' => $this->input ->post('opis'),
 				'category_id'=>$this->input->post('category_id')
 				
 		);
 		$this->db->where('id',$this->input->post('id'));
 		return $this->db->update('posts',$data);
 		
 	}
 	
 	public function get_categories(){
 		$this->db->order_by('name');
 		$query = $this->db->get('categories');
 		return $query->result_array();
 	}
 	
 	public function get_posts_by_category($category_id){
 		
 		$this->db->order_by('posts.id','DESC');
 		
 		$this->db->join('categories','categories.id = posts.category_id');
 		$query=$this->db->get_where('posts',array('category_id'=>	$category_id));
 		return $query->result_array();
 		
 	}

 	}
 	


 ?>