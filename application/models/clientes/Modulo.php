<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}		

	function table($limit,$start,$search)
	{

	    $sql = 
	    "SELECT * FROM usuarios 
	     WHERE (tipo = 'CLIENTE') 
	     AND (usuario LIKE '%".$search."%' ESCAPE '!' OR apellidos LIKE '%".$search."%' ESCAPE '!' OR nombres LIKE '%".$search."%')
	     ORDER BY id_usuario DESC
	     LIMIT  ".$limit.",".$start."
	    ";
	    $query = $this->db->query($sql);

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

	    $sql = 
	    "SELECT * FROM usuarios 
	     WHERE (tipo = 'CLIENTE') 
	     AND (usuario LIKE '%".$search."%' ESCAPE '!' OR apellidos LIKE '%".$search."%' ESCAPE '!' OR nombres LIKE '%".$search."%')
	     ORDER BY id_usuario DESC
	    ";
	    $query = $this->db->query($sql);

	    /* for foro
	    $this->db->order_by('id_usuario', 'DESC'); 
	    $this->db->like('usuario', $search); 
	    $this->db->or_like('usuario', $search); 
	    $this->db->or_like('apellidos', $search); 
	    $this->db->or_like('nombres', $search);
	    $query = $this->db->get('usuarios');*/

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
	    
	    $usuario 		= $this->input->post('identidad');
	   	$clave 			= MD5($usuario);
	   	$identidad 		= $this->input->post('identidad');
	   	$apellidos 		= $this->input->post('apellidos');
	   	$nombres 		= $this->input->post('nombres');
	   	$activo 		= $this->input->post('activo');	   		   	
	   	$telefono 		= $this->input->post('telefono');
	   	$tipo 			= $this->input->post('tipo');
	   	$correo 		= $this->input->post('correo');
	   	$direccion 		= $this->input->post('direccion');
	   	$sexo 			= $this->input->post('sexo');
	   	   	
	   	$data = array(
		   	'usuario' 		=> $usuario,
			'clave' 		=> $clave,
			'identidad' 	=> $identidad,
			'apellidos' 	=> $apellidos,
			'nombres' 		=> $nombres,
			'sexo' 			=> $sexo,
			'activo' 		=> $activo,
			'telefono' 		=> $telefono,
			'tipo' 			=> $tipo,
			'correo'		=> $correo,
			'direccion'		=> $direccion,	   
		);

		$this->db->insert('usuarios', $data); 
	    
	    return true;

	} 

	function read($id_usuario)
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

	function update()
	{
	    
	    $id_usuario = $this->input->post('id_usuario');

	    $usuario 		= $this->input->post('identidad');
	   	$clave 			= MD5($usuario);
	   	$identidad 		= $this->input->post('identidad');
	   	$apellidos 		= $this->input->post('apellidos');
	   	$nombres 		= $this->input->post('nombres');
	   	$activo 		= $this->input->post('activo');	   		   	
	   	$telefono 		= $this->input->post('telefono');
	   	$tipo 			= $this->input->post('tipo');
	   	$correo 		= $this->input->post('correo');
	   	$direccion 		= $this->input->post('direccion');
	   	$sexo 			= $this->input->post('sexo');
	   	   	
	   	$data = array(
		   	'usuario' 		=> $usuario,
			'clave' 		=> $clave,
			'identidad' 	=> $identidad,
			'apellidos' 	=> $apellidos,
			'nombres' 		=> $nombres,
			'sexo' 			=> $sexo,
			'activo' 		=> $activo,
			'telefono' 		=> $telefono,
			'tipo' 			=> $tipo,
			'correo'		=> $correo,
			'direccion'		=> $direccion,	   
		);
	    
		$query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario, 'tipo' => 'CLIENTE'));	    

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

	function delete($id_usuario)
	{
	   
	    $query = $this->db->get_where('usuarios', array('id_usuario' => $id_usuario, 'tipo' => 'CLIENTE'));	

	    if($query->num_rows() > 0)
	    {	      
	      	$this->db->where('id_usuario', $id_usuario);
			$this->db->delete('usuarios'); 
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

	    $query = $this->db->get_where('usuarios', array('id_usuario !=' => $id_usuario, 'tipo' => 'CLIENTE', 'identidad' => $identidad));

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