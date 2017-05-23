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
				'mjestoOdredista' => $this->input ->post('Mjesto Odredista'),
				'datumPolaska' => $this->input ->post('Datum Polaska'),
				'datumPovratka' => $this->input ->post('Datum Povratka'),
				'brojMjesta' => $this->input ->post('Broj Mjesta'),
				'cijena' => $this->input ->post('cijena'),
				'opis' => $this->input ->post('Opis'),
				'category_id'=>$this->input->post('category_id'),
				'user_id' =>$this->session->userdata('user_id'),
				'post_image'=>$post_image
				
		);
		
		return $this->db->insert('posts',$data);
	}
	
	//Brisanje posta
	public function delete_post($id){
		$this->db->where('id',$id);
		$this->db->delete('posts');
		return true;
	}
	
	
	//editovanje posta
	public function update_post(){
		$mjestoPolaska=url_title($this->input->post('Mjesto Polaska'));
		$data=array(
				'mjestoPolaska' => $mjestoPolaska,
				'mjestoOdredista' => $this->input ->post('Mjesto Odredista'),
				'datumPolaska' => $this->input ->post('Datum Polaska'),
				'datumPovratka' => $this->input ->post('Datum Povratka'),
				'brojMjesta' => $this->input ->post('Broj Mjesta'),
				'cijena' => $this->input ->post('cijena'),
				'opis' => $this->input ->post('Opis'),
				'category_id'=>$this->input->post('category_id'),
				'user_id' =>$this->session->userdata('user_id'),
				'post_image'=>$post_image
				
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
		$query=$this->db->get_where('posts',array('category_id'=>   $category_id));
		return $query->result_array();
		
	}
	
}



?>