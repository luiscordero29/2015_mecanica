<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	   	$this->db->order_by('id_area', 'DESC'); 
	    $this->db->like('area', $search); 
	    $query = $this->db->get('areas', $start, $limit);

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

	    $this->db->order_by('id_area', 'DESC'); 
	    $this->db->like('area', $search); 
	    $query = $this->db->get('areas');

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
	   	$area 			= $this->input->post('area');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'area' 			=> $area, 
		);

		$this->db->insert('areas', $data); 
	    
	    return true;

	} 

	function read($id_area)
	{			    
	    
	    $query = $this->db->get_where('areas', array('id_area' => $id_area));	    

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
	    
	    $id_area = $this->input->post('id_area');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$area 			= $this->input->post('area');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'area' 			=> $area, 
		);
	    
		$query = $this->db->get_where('areas', array('id_area' => $id_area));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_area', $id_area);
			$this->db->update('areas', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_area)
	{
	   
	    $query = $this->db->get_where('areas', array('id_area' => $id_area));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_area', $id_area);
			$this->db->delete('areas'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}	

}