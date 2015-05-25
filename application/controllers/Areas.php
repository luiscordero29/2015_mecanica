<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {

	/**
	 * Controller: Panel
	 * Comments: Gestor de usuarios - Pagina Privada
	 *
	 * 
	 */

	public $controller = "areas";

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
		

	public function index($table_page=null,$id=null,$search=null)
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
			if(($data['session']['tipo'] === 'ADMINISTRADOR'))
			{

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'		=> 'panel/index',
	              	'Gestor de &Aacute;reas'    => '',            	
	            );
					
					$table_limit = 30;
					$table_page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;		

					$s = trim($this->input->post('s'));
					$search = trim($search);
					if(!empty($s)){
						$data['search'] = $s;
						$data['search_url'] = '/'.$s;					
					}elseif(!empty($search)){
						$data['search'] = urldecode($search);
						$data['search_url'] = '/'.$search;
					}else{
						$data['search'] = $s;
						$data['search_url'] = '';
					}

					$data['controller'] = $this->controller;				
					$data['table'] = $this->modulo->table($table_page*$table_limit,$table_limit,$data['search']);
					$data['table_rows'] = $this->modulo->table_rows($data['search']);
					$data['table_page'] = $table_page;
					$data['table_limit'] = $table_limit;

					$this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view($this->controller.'/table',$data);
					$this->load->view('panel/theme/footer');

			}
			
		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}		
	}

	public function create()
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
			if(($data['session']['tipo'] === 'ADMINISTRADOR'))
			{

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'  	=> 'panel/index',
	              	'Gestor de &Aacute;reas'	=> $this->controller.'/index',
	              	'Registrar &Aacute;rea'		=> '',              	
	            );
	            
	            $data['controller'] = $this->controller;
				
				$this->form_validation->set_rules('area', '&Aacute;rea', 'trim|required');


				if($this->form_validation->run() == FALSE)
				{
					
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view($this->controller.'/create',$data);
					$this->load->view('panel/theme/footer');			

				}else{

					$this->modulo->create();
					
					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view($this->controller.'/create',$data);
					$this->load->view('panel/theme/footer');
				}
			}		

		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}		
	}

	public function update($id=false)
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
			if(($data['session']['tipo'] === 'ADMINISTRADOR'))
			{
				if($id===FALSE)
				{
					show_404();				
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'  	=> 'panel/index',
	              	'Gestor de &Aacute;reas'	=> $this->controller.'/index',
	              	'Editar &Aacute;reas'		=> '',              	
	            );
	            
	            $data['controller'] = $this->controller;
				
				$this->form_validation->set_rules('area', '&Aacute;rea', 'trim|required');
				
				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->modulo->read($id);
					if(empty($data['row']))
					{
						show_404();
					}

				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view($this->controller.'/update',$data);
					$this->load->view('panel/theme/footer');			

				}else{
					$this->modulo->update();
					
					$data['row'] = $this->modulo->read($id);
					if(empty($data['row']))
					{
						show_404();
					}

					$data['alert']['success'] = 
						array( 
							'Guardado Exitosamente',				
						);
				    
				    $this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view($this->controller.'/update',$data);
					$this->load->view('panel/theme/footer');	
				}
			}		

		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}		
	}

	public function delete($id=false)
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
			if(($data['session']['tipo'] === 'ADMINISTRADOR'))
			{
				if($id===FALSE)
				{
					show_404();				
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'  	=> 'panel/index',
	              	'Gestor de &Aacute;reas'	=> $this->controller.'/index',
	              	'Eliminar &Aacute;reas'		=> '',              	
	            );


				$check = $this->modulo->delete($id);
				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Areas Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Existe Areas ó No es posible eliminar por motivos de seguridad',				
						);
		      	}
				
					$this->load->view('panel/theme/header');
					$this->load->view('panel/theme/nav',$data);
					$this->load->view('panel/theme/breadcrumbs',$data);
					$this->load->view($this->controller.'/delete',$data);
					$this->load->view('panel/theme/footer');
			}			

		}
		else
		{
		    //If no session, redirect to login page
		    redirect('signin', 'refresh');
		}		
	}

}