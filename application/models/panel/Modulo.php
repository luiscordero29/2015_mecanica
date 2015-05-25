<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	function set_usuario($id_usuario)
	{			    
	    
	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario));	    

	    if($query->num_rows() > 0)
	    {	      
	      return $query->row_array();
	    }
	    else
	    {
	      return false;
	    }
	}

	function correo_check()
	{		
	    $correo 		= $this->input->post('correo');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'correo' => $correo));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function identidad_check()
	{		
	    $identidad 		= $this->input->post('identidad');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'identidad' => $identidad));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

	function set_usuario_check()
	{		
	    $usuario 		= $this->input->post('usuario');
	    $id_usuario 	= $this->input->post('id_usuario');

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'usuario' => $usuario));

	    if($query->num_rows() > 0)
	    {	      
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}


	function update_usuario()
	{
	    
	    $id_usuario = $this->input->post('id_usuario');

	    $identidad 		= $this->input->post('identidad');
	   	$usuario 		= $this->input->post('usuario');
	   	$apellidos 		= $this->input->post('apellidos');
	   	$nombres 		= $this->input->post('nombres');  	
	   	$sexo 			= $this->input->post('sexo');	   	
	   	$telefono 		= $this->input->post('telefono');	   	   	
	   	$correo 		= $this->input->post('correo');
	   	$direccion 		= $this->input->post('direccion');

	   	   	
	   	$data = array(
		   	'identidad' 	=> $identidad,
		   	'usuario' 		=> $usuario,
			'apellidos' 	=> $apellidos,
			'nombres' 		=> $nombres,
			'sexo' 			=> $sexo,
			'telefono' 		=> $telefono,
			'correo'		=> $correo,
			'direccion'		=> $direccion,
		);
	    
		$query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario));	    

	    if($query->num_rows() > 0)
	    {	      	      	
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->update('usuarios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	} 

	function update_usuario_clave()
	{
	    $id_usuario 	= $this->input->post('id_usuario');
	    $clave 			= MD5($this->input->post('pass'));

	    $data = array(
			'clave' 		=> $clave  
		);
	    
	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario));

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->update('usuarios', $data); 
	      	return true;
	    }
	    else
	    {
	      	return false;
	    }
	}

}