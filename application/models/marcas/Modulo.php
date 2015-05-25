<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	   	$this->db->order_by('id_marca', 'DESC'); 
	    $this->db->like('marca', $search); 
	    $query = $this->db->get('marcas', $start, $limit);

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

	    $this->db->order_by('id_marca', 'DESC'); 
	    $this->db->like('marca', $search); 
	    $query = $this->db->get('marcas');

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
	   	$marca 	= $this->input->post('marca');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'marca' => $marca, 
		);

		$this->db->insert('marcas', $data); 
	    
	    return true;

	} 

	function read($id_marca)
	{			    
	    
	    $query = $this->db->get_where('marcas', array('id_marca' => $id_marca));	    

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
	    
	    $id_marca = $this->input->post('id_marca');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$marca 	= $this->input->post('marca');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'marca' 			=> $marca, 
		);
	    
		$query = $this->db->get_where('marcas', array('id_marca' => $id_marca));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_marca', $id_marca);
			$this->db->update('marcas', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_marca)
	{
	   
	    $query = $this->db->get_where('marcas', array('id_marca' => $id_marca));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_marca', $id_marca);
			$this->db->delete('marcas'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}	

}