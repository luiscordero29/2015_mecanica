<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modulo extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}

	public function session()
 	{
	    $user = $this->input->post('user',true);
	    $pass = md5($this->input->post('pass',true));
	    $this->db->select('id_usuario, usuario, identidad, apellidos, nombres, tipo');
	    $this->db->from('usuarios');
	    $this->db->where('usuario', $user);
	    $this->db->where('clave', $pass);	    
	    $this->db->where('activo', 'SI');
	    $this->db->where('tipo', 'ADMINISTRADOR');
	    $this->db->limit(1);

	    $query = $this->db->get();

	    if($query->num_rows() == 1)
	    {
	    	return $query->result();
	    }
	    else
	    {
	    	return false;
	    }
 	}

}