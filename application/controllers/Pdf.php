<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public $controller = "pdf";

	public function __construct()
	{
		parent::__construct();	
		$this->load->driver('session');
		$this->load->helper('pdf_helper');	
		$this->load->model($this->controller.'/modulo','',TRUE);

		// Control de Sessión
		if($this->session->has_userdata('id_usuario'))
   		{     				
					
			if(!($this->session->userdata('tipo') === 'ADMINISTRADOR'))
			{
				redirect('signin', 'refresh');
			}
			
		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}
		
	}
		

	public function index()
	{
		if($this->session->has_userdata('id_usuario'))
   		{     				
			redirect('panel/index');		
		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}		
	}

	public function servicio($id_servicio=false)
	{		

		if($this->session->has_userdata('id_usuario'))
   		{     					
			
			if($id_servicio===FALSE)
			{
				redirect('pdf/index');			
			}

			$data['row'] = $this->modulo->read_servicio($id_servicio);
			if(empty($data['row']))
			{
				redirect('panel/index');
			}
	    		    
		    $this->load->view('pdf/servicio',$data);		
		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}		
	}	

}