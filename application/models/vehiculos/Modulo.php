<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($id_usuario)
	{

	   	$this->db->join('tipos', 'tipos.id_tipo=vehiculos.id_tipo', 'left');
	   	$this->db->join('marcas', 'marcas.id_marca=vehiculos.id_marca', 'left');
	   	$this->db->join('modelos', 'modelos.id_modelo=vehiculos.id_modelo', 'left');
	   	$this->db->join('colores', 'colores.id_color=vehiculos.id_color', 'left');
	   	$this->db->order_by('id_vehiculo', 'DESC'); 
	    $this->db->where('id_propetario', $id_usuario);  
	    $query = $this->db->get('vehiculos');

	    if($query->num_rows() > 0)
	    {
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function create()
	{
	    
	   	$id_usuario 	= $this->input->post('id_usuario');
	   	$id_propetario 	= $this->input->post('id_propetario');
	   	$placa 			= $this->input->post('placa');
	   	$periodo 		= $this->input->post('periodo');
	   	$id_tipo 		= $this->input->post('id_tipo');
	   	$id_color 		= $this->input->post('id_color');
	   	$id_marca 		= $this->input->post('id_marca');
	   	$id_modelo 		= $this->input->post('id_modelo');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'id_propetario' => $id_propetario, 
			'placa' 		=> $placa, 
			'periodo' 		=> $periodo, 
			'id_tipo' 		=> $id_tipo, 
			'id_color' 		=> $id_color, 
			'id_marca' 		=> $id_marca, 
			'id_modelo' 	=> $id_modelo, 
		);

		$this->db->insert('vehiculos', $data); 
	    
	    return true;

	} 

	function read($id_vehiculo,$id_propetario)
	{			    
	    
	    $this->db->join('modelos', 'modelos.id_modelo=vehiculos.id_modelo', 'left');
	    $query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo,'id_propetario' => $id_propetario));	    

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
	    
	    $id_vehiculo = $this->input->post('id_vehiculo');

	    $id_usuario 	= $this->input->post('id_usuario');
	   	$id_propetario 	= $this->input->post('id_propetario');
	   	$placa 			= $this->input->post('placa');
	   	$periodo 		= $this->input->post('periodo');
	   	$id_tipo 		= $this->input->post('id_tipo');
	   	$id_color 		= $this->input->post('id_color');
	   	$id_marca 		= $this->input->post('id_marca');
	   	$id_modelo 		= $this->input->post('id_modelo');
	   
	   	$data = array(
		   	'id_usuario' 	=> $id_usuario,
			'id_propetario' => $id_propetario, 
			'placa' 		=> $placa, 
			'periodo' 		=> $periodo, 
			'id_tipo' 		=> $id_tipo, 
			'id_color' 		=> $id_color, 
			'id_marca' 		=> $id_marca, 
			'id_modelo' 	=> $id_modelo, 
		);
	    
		$query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_vehiculo', $id_vehiculo);
			$this->db->update('vehiculos', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_vehiculo)
	{
	   
	    $query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_vehiculo', $id_vehiculo);
			$this->db->delete('vehiculos'); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}	

	function read_usuario($id_usuario)
	{			    
	    
	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario, 'tipo' => 'CLIENTE'));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_tipos()
	{			    
	    $this->db->order_by("tipo", "asc"); 
	    $query = $this->db->get('tipos');	    

	    if($query->num_rows() > 0)
	    {	      
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_colores()
	{			    
	    $this->db->order_by("color", "asc"); 
	    $query = $this->db->get('colores');	    

	    if($query->num_rows() > 0)
	    {	      
	      	return $query->result_array();
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

	function table_modelos($id_marca)
	{			    
	    $this->db->order_by("modelo", "asc");
	    $this->db->where("id_marca", $id_marca); 
	    $query = $this->db->get('modelos');	    

	    if($query->num_rows() > 0)
	    {	      
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function placa_check()
	{		
	    $placa 		= $this->input->post('placa');
	    $id_vehiculo 	= $this->input->post('id_vehiculo');

	    $query = $this->db->get_where('vehiculos', array('id_vehiculo !=' => $id_vehiculo, 'placa' => $placa));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

}