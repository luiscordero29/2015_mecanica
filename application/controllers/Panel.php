<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	/**
	 * Controller: Panel
	 * Comments: Gestor de operaciones - Pagina Privada
	 *
	 * 
	 */

	public $controller = "panel";

	public function __construct()
	{
		parent::__construct();		
		
		$this->load->driver('session');
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

   			$sess_array = array(
			    'id_usuario' 	=> $this->session->userdata('id_usuario'),
			    'usuario' 		=> $this->session->userdata('usuario'),
			    'identidad' 	=> $this->session->userdata('identidad'),
			    'apellidos' 	=> $this->session->userdata('apellidos'),
			    'nombres' 		=> $this->session->userdata('nombres'),
			    'tipo' 			=> $this->session->userdata('tipo'),	          	
			);
   			$data['session'] = $sess_array;
   				    	
	    	$this->load->view('panel/theme/header');			
			$this->load->view('panel/theme/nav',$data);
			$this->load->view('panel/home');
			$this->load->view('panel/theme/footer');	        
	        
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function backup()
	{
		if($this->session->has_userdata('id_usuario'))
   		{

   			$prefs = array(
                'format'      => 'txt',             // gzip, zip, txt
                'filename'    => 'backup-'.date("Y-m-d_H-m-s").'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

   			$this->load->dbutil();

   			// Backup your entire database and assign it to a variable
			$backup =& $this->dbutil->backup($prefs);

			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('./assets/files/backup/backup-'.date("Y-m-d_H-m-s").'.gz', $backup);

			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('backup-'.date("Y-m-d_H-m-s").'.gz', $backup);         
	        
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}


	public function profile($type=FALSE)
	{
		if($this->session->has_userdata('id_usuario'))
   		{

   			if($type===FALSE)
			{
				redirect('panel');								
			}

   			$sess_array = array(
			    'id_usuario' 	=> $this->session->userdata('id_usuario'),
			    'usuario' 		=> $this->session->userdata('usuario'),
			    'identidad' 	=> $this->session->userdata('identidad'),
			    'apellidos' 	=> $this->session->userdata('apellidos'),
			    'nombres' 		=> $this->session->userdata('nombres'),
			    'tipo' 			=> $this->session->userdata('tipo'),	          	
			);
   			$data['session'] = $sess_array;
   			
   			// panel/profile/profile
   			if($type==='profile')
   			{	    	
		    	
		    	$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Editar Perfil'          => '',              	
	            );	            
				
				$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
				$this->form_validation->set_rules('identidad', 'Cedula de Identidad', 'trim|required|callback_identidad_check');
				$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required');
				$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
				$this->form_validation->set_rules('correo', 'Correo', 'trim|required|callback_correo_check|valid_email');
				$this->form_validation->set_rules('direccion', 'Direcci&oacute;n', 'trim|required');
				$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|is_natural');


				// message
				$this->form_validation->set_message('correo_check', 'Correo Duplicado');	

				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->modulo->set_usuario($data['session']['id_usuario']);    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/profile');
					$this->load->view('panel/theme/footer');		

				}else{

					$this->modulo->update_usuario();
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
					$data['row'] = $this->modulo->set_usuario($data['session']['id_usuario']);    
				    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/profile');
					$this->load->view('panel/theme/footer');
		        }
	    	// panel/profile/pass
	    	}elseif ($type==='pass') {
	    		
	    		$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'        => 'panel/index',
	              	'Cambiar Contraseña'          => '',              	
	            );	            

				$this->form_validation->set_rules('pass', 'Contraseña', 'required');
				$this->form_validation->set_rules('veryfi', 'Contraseña', 'required|matches[pass]');

				if($this->form_validation->run() == FALSE)
				{
					$data['usuario'] = $this->modulo->set_usuario($data['session']['id_usuario']);    

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/pass');
					$this->load->view('panel/theme/footer');		

				}else{

					$this->modulo->update_usuario_clave();
					
					$data['alert']['success'] = 
					array( 
						'Guardado Exitosamente',				
					);
					
					$data['usuario'] = $this->modulo->set_usuario($data['session']['id_usuario']);    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view('panel/profile/pass');
					$this->load->view('panel/theme/footer');
				}
	    	}else{

	    		redirect('panel');

	    	}
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}

	}

	public function usuario_check()
  	{      
      	$check = $this->modulo->usuario_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

  	public function identidad_check()
  	{      
      	$check = $this->modulo->identidad_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

  	public function correo_check()
  	{      
      	$check = $this->modulo->correo_check();
      	if($check)
      	{
           	return false;
      	}
      	else
      	{         
           	return true;
      	}
  	}

	public function logout()
 	{
	   	$sess_array = array(
		    'id_usuario' 	=> '',
		    'usuario' 		=> '',
		    'apellidos' 	=> '',
		    'nombres' 		=> '',
		    'tipo' 			=> '',	          	
		);

		$this->session->unset_userdata($sess_array);
	   	$this->session->sess_destroy();
	   	
	   	redirect('signin', 'refresh');
 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */