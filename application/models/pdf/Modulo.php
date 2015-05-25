<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	function read_servicio($id_servicio)
	{			    
	    $this->db->join('vehiculos', 'vehiculos.id_vehiculo=servicios.id_vehiculo', 'left');
	    $this->db->join('colores', 'colores.id_color=vehiculos.id_color', 'left');
	    $this->db->join('marcas', 'marcas.id_marca=vehiculos.id_marca', 'left');
	    $this->db->join('modelos', 'modelos.id_modelo=vehiculos.id_modelo', 'left');
	    $this->db->join('usuarios', 'usuarios.id_usuario=vehiculos.id_propetario', 'left');

	    $this->db->join('mantenimientos', 'mantenimientos.id_mantenimiento=servicios.id_mantenimiento', 'left');
	   	$this->db->join('areas', 'areas.id_area=servicios.id_area', 'left');
	    $query = $this->db->get_where('servicios', array('id_servicio' => $id_servicio));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}	

}