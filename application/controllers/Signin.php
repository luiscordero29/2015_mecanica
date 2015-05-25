<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	/**
	 * Login.
	 *
	 * 
	 * #autor: Ing. Luis Cordero
	 * #mail: info@luiscordero29.com
	 */

	function __construct()
  	{
    	parent::__construct();  
    	$this->load->driver('session');   
    	$this->load->model('signin/modulo'); 	
  	}

	public function index()
	{
		// rules
		$this->form_validation->set_rules('user', 'Usuario', 'required');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required|callback_session');
		// message
		$this->form_validation->set_message('session', '1.- El usuario no existe <br />2.- Contraseña invalidad <br />3.- No tiene acceso temporalmente');
		// views
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('signin/theme/header');
			$this->load->view('signin/theme/nav');			
			$this->load->view('signin/default');
			$this->load->view('signin/theme/footer');	
		}
		else
		{			
	        redirect('panel', 'refresh');	     
		}
	}
	public function session()
	{
	    $result = $this->modulo->session();
	    if($result)
	    {
	      	foreach($result as $row)
	      	{           
		        $sess_array = array(
		        	'id_usuario' 	=> $row->id_usuario,
		        	'usuario' 		=> $row->usuario,
		        	'identidad' 	=> $row->identidad,
		          	'apellidos' 	=> $row->apellidos,
		          	'nombres' 		=> $row->nombres,
		          	'tipo' 			=> $row->tipo,		          	
		        );
	        	$this->session->set_userdata($sess_array);
	      	}
	      	return true;
	    }else{
	      	return false;
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */