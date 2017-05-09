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
 	
 	//Kreiranje post
 	public function create_post(){
 		$mjesto_polaska=url_title($this->input->post('mjesto_odredista'));
 		
 		$data=array(
 				'Mjesto Polaska' => $this->input ->post('mjesto_polaska'),
 				'Mjesto Odredista' => $this->input ->post('mjesto_odredista'),
 				'Vrsta usluge' => $this->input ->post('vrsta_usluge'),
 				'Datum Polaska' => $this->input ->post('datum_polaska'),
 				'Datum Povratka' => $this->input ->post('datum_povratka'),
 				'Cijena' => $this->input ->post('cijena'),
 				'Broj Mjesta' => $this->input ->post('broj_mjesta'),
 				'Opis' => $this->input ->post('opis'),
 				
 		);
 		
 		return $this->db->insert('posts',$data);
 		
 	}
 	
 	public function delete_posts($id){
 		$this->db->where('id',$id);
 		$this->db->delete('posts');
 		return true;
 	}

 	}
 	


 ?>