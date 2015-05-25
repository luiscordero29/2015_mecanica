<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($id_vehiculo)
	{

	   	$this->db->join('mantenimientos', 'mantenimientos.id_mantenimiento=servicios.id_mantenimiento', 'left');
	   	$this->db->join('areas', 'areas.id_area=servicios.id_area', 'left');
	   	$this->db->order_by('servicios.id_servicio', 'DESC'); 
	    $this->db->where('servicios.id_vehiculo', $id_vehiculo);
	    $query = $this->db->get('servicios');

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
	    
	   	$id_usuario 		= $this->input->post('id_usuario');
	   	$date_array 		= explode('/',$this->input->post('fecha'));
		$date_array 		= array_reverse($date_array);		
		$fecha 				= date(implode('-', $date_array));
	   	$costo 				= $this->input->post('costo');
	   	$id_mantenimiento 	= $this->input->post('id_mantenimiento');
	   	$id_area 			= $this->input->post('id_area');
	   	$descripcion 		= $this->input->post('descripcion');
	   	$observacion 		= $this->input->post('observacion');
	   	$id_vehiculo 		= $this->input->post('id_vehiculo');

	   
	   	$data = array(
		   	'id_usuario' 		=> $id_usuario,
			'fecha'	 			=> $fecha, 
			'costo'	 			=> $costo, 
			'id_mantenimiento' 	=> $id_mantenimiento, 
			'id_area' 			=> $id_area, 
			'descripcion' 		=> $descripcion, 
			'observacion' 		=> $observacion, 
			'id_vehiculo' 		=> $id_vehiculo, 
		);

		$this->db->insert('servicios', $data); 
	    
	    return true;

	} 

	function read($id_servicio,$id_vehiculo)
	{			    
	    
	    $query = $this->db->get_where('servicios', array('id_servicio' => $id_servicio,'id_vehiculo' => $id_vehiculo));	    

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
	    
	    $id_servicio = $this->input->post('id_servicio');

	    $id_usuario 		= $this->input->post('id_usuario');
	   	$date_array 		= explode('/',$this->input->post('fecha'));
		$date_array 		= array_reverse($date_array);		
		$fecha 				= date(implode('-', $date_array));
	   	$costo 				= $this->input->post('costo');
	   	$id_mantenimiento 	= $this->input->post('id_mantenimiento');
	   	$id_area 			= $this->input->post('id_area');
	   	$descripcion 		= $this->input->post('descripcion');
	   	$observacion 		= $this->input->post('observacion');
	   	$id_vehiculo 		= $this->input->post('id_vehiculo');

	   
	   	$data = array(
		   	'id_usuario' 		=> $id_usuario,
			'fecha'	 			=> $fecha, 
			'costo'	 			=> $costo, 
			'id_mantenimiento' 	=> $id_mantenimiento, 
			'id_area' 			=> $id_area, 
			'descripcion' 		=> $descripcion, 
			'observacion' 		=> $observacion, 
			'id_vehiculo' 		=> $id_vehiculo, 
		);
	    
		$query = $this->db->get_where('servicios', array('id_servicio' => $id_servicio));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_servicio', $id_servicio);
			$this->db->update('servicios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function delete($id_servicio)
	{
	   
	    $query = $this->db->get_where('servicios', array('id_servicio' => $id_servicio));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_servicio', $id_servicio);
			$this->db->delete('servicios'); 
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

	function read_vehiculo($id_vehiculo)
	{			    
	    
	    $this->db->join('tipos', 'tipos.id_tipo=vehiculos.id_tipo', 'left');
	   	$this->db->join('marcas', 'marcas.id_marca=vehiculos.id_marca', 'left');
	   	$this->db->join('modelos', 'modelos.id_modelo=vehiculos.id_modelo', 'left');
	   	$this->db->join('colores', 'colores.id_color=vehiculos.id_color', 'left');
	   	$query = $this->db->get_where('vehiculos', array('id_vehiculo' => $id_vehiculo));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function table_mantenimientos()
	{			    
	    $this->db->order_by("mantenimiento", "asc"); 
	    $query = $this->db->get('mantenimientos');	    

	    if($query->num_rows() > 0)
	    {	      
	      	return $query->result_array();
	    }
	    else
	    {
	      	return false;
	    }
	}

	function table_areas()
	{			    
	    $this->db->order_by("area", "asc"); 
	    $query = $this->db->get('areas');	    

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