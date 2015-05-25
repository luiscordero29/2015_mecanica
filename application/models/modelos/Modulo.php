<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	   	$this->db->select('modelos.*, marcas.marca');
	    $this->db->join('marcas', 'marcas.id_marca = modelos.id_marca','left');
	    $this->db->order_by('id_modelo', 'DESC'); 
	    $this->db->like('modelo', $search); 
	    $query = $this->db->get('modelos', $start, $limit);

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

	    $this->db->select('modelos.*, marcas.marca');
	    $this->db->join('marcas', 'marcas.id_marca = modelos.id_marca','left');
	    $this->db->order_by('id_modelo', 'DESC'); 
	    $this->db->like('modelo', $search); 
	    $query = $this->db->get('modelos');

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
	   	$id_marca 			= $this->input->post('id_marca');
	   	$modelo 		= $this->input->post('modelo');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'id_marca' 		=> $id_marca, 
			'modelo' 		=> $modelo, 
		);

		$this->db->insert('modelos', $data); 
	    
	    return true;

	} 

	function read($id_modelo)
	{			    
	    
	    $query = $this->db->get_where('modelos', array('id_modelo' => $id_modelo));	    

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
	    
	    $id_modelo = $this->input->post('id_modelo');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$id_marca 			= $this->input->post('id_marca');
	   	$modelo 		= $this->input->post('modelo');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'id_marca' 		=> $id_marca, 
			'modelo' 		=> $modelo, 
		);
	    
		$query = $this->db->get_where('modelos', array('id_modelo' => $id_modelo));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_modelo', $id_modelo);
			$this->db->update('modelos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_modelo)
	{
	   
	    $query = $this->db->get_where('modelos', array('id_modelo' => $id_modelo));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_modelo', $id_modelo);
			$this->db->delete('modelos'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}	

	function table_marcas()
	{			    
	    $this->db->order_by("marca", "asc"); 
	    $query = $this->db->get('marcas');	    

	    if($query->num_rows() > 0)
	    {	      
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

}