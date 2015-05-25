<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	   	$this->db->order_by('id_mantenimiento', 'DESC'); 
	    $this->db->like('mantenimiento', $search); 
	    $query = $this->db->get('mantenimientos', $start, $limit);

	    if($query->num_rows() > 0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_rows($search)
	{

	    $this->db->order_by('id_mantenimiento', 'DESC'); 
	    $this->db->like('mantenimiento', $search); 
	    $query = $this->db->get('mantenimientos');

	    if($query->num_rows() > 0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return false;
	    }
	}

	function create()
	{
	    
	   	$id_usuario 	= $this->input->post('id_usuario');
	   	$mantenimiento 	= $this->input->post('mantenimiento');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'mantenimiento' => $mantenimiento, 
		);

		$this->db->insert('mantenimientos', $data); 
	    
	    return true;

	} 

	function read($id_mantenimiento)
	{			    
	    
	    $query = $this->db->get_where('mantenimientos', array('id_mantenimiento' => $id_mantenimiento));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function update()
	{
	    
	    $id_mantenimiento = $this->input->post('id_mantenimiento');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$mantenimiento 	= $this->input->post('mantenimiento');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'mantenimiento' 			=> $mantenimiento, 
		);
	    
		$query = $this->db->get_where('mantenimientos', array('id_mantenimiento' => $id_mantenimiento));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_mantenimiento', $id_mantenimiento);
			$this->db->update('mantenimientos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_mantenimiento)
	{
	   
	    $query = $this->db->get_where('mantenimientos', array('id_mantenimiento' => $id_mantenimiento));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_mantenimiento', $id_mantenimiento);
			$this->db->delete('mantenimientos'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}	

}