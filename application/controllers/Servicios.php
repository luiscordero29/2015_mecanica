<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	/**
	 * Controller: Panel
	 * Comments: Gestor de usuarios - Pagina Privada
	 *
	 * 
	 */

	public $controller = "servicios";

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
		

	public function index($id_usuario=null,$id_vehiculo=null)
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
	              	'Pagina Principal'				=> 'panel/index',
	              	'Gestor de Clientes'			=> 'clientes/index',
	              	'Gestor de Veh&iacute;culos'    => 'vehiculos/index/'.$id_usuario, 
	              	'Lista de Servicios'			=> '',           	
	            );

		        if($id_usuario===FALSE)
				{
					show_404();				
				}

				$data['row_usuario'] = $this->modulo->read_usuario($id_usuario);
				if(empty($data['row_usuario']))
				{
					show_404();
				}

				if($id_vehiculo===FALSE)
				{
					show_404();				
				}

				$data['row_vehiculo'] = $this->modulo->read_vehiculo($id_vehiculo);
				if(empty($data['row_vehiculo']))
				{
					show_404();
				}

				$data['controller'] = $this->controller;				
				$data['table'] = $this->modulo->table($id_vehiculo);

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

	public function create($id_usuario=null,$id_vehiculo=null)
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
	              	'Gestor de Clientes'	=> 'clientes/index',
	              	'Gestor de Veh&iacute;culos'    => 'vehiculos/index/'.$id_usuario, 
	              	'Lista de Servicios'			=> $this->controller.'/index/'.$id_usuario.'/'.$id_vehiculo,
	              	'Registrar Servicio'		=> '',              	
	            );

	            if($id_usuario===FALSE)
				{
					show_404();				
				}

				$data['row_usuario'] = $this->modulo->read_usuario($id_usuario);
				if(empty($data['row_usuario']))
				{
					show_404();
				}

				if($id_vehiculo===FALSE)
				{
					show_404();				
				}

				$data['row_vehiculo'] = $this->modulo->read_vehiculo($id_vehiculo);
				if(empty($data['row_vehiculo']))
				{
					show_404();
				}
	            
	            $data['controller'] = $this->controller;
	            $data['table_mantenimientos'] = $this->modulo->table_mantenimientos();
	            $data['table_areas'] = $this->modulo->table_areas();
				
				$this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');
				$this->form_validation->set_rules('costo', 'Costo', 'trim|required|is_numeric');
				$this->form_validation->set_rules('id_mantenimiento', 'Mantenimiento', 'required');
				$this->form_validation->set_rules('id_area', '&Aacute;rea', 'required');
				$this->form_validation->set_rules('descripcion', 'Descripci&oacte;n', 'trim|required');
				$this->form_validation->set_rules('observacion', 'Observaci&oacute;n', 'trim');
				

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

	public function update($id_usuario=null,$id_vehiculo=null,$id=false)
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
				if($id_usuario===FALSE)
				{
					show_404();				
				}

				$data['row_usuario'] = $this->modulo->read_usuario($id_usuario);
				if(empty($data['row_usuario']))
				{
					show_404();
				}

				if($id_vehiculo===FALSE)
				{
					show_404();				
				}

				$data['row_vehiculo'] = $this->modulo->read_vehiculo($id_vehiculo);
				if(empty($data['row_vehiculo']))
				{
					show_404();
				}

				if($id===FALSE)
				{
					show_404();				
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'  			=> 'panel/index',
	              	'Gestor de Clientes'			=> 'clientes/index',
	              	'Gestor de Veh&iacute;culos'    => 'vehiculos/index/'.$id_usuario, 
	              	'Lista de Servicios'			=> $this->controller.'/index/'.$id_usuario.'/'.$id_vehiculo,
	              	'Editar Servicio'				=> '',              	
	            );
	            
	            $data['controller'] = $this->controller;
	            $data['table_mantenimientos'] = $this->modulo->table_mantenimientos();
	            $data['table_areas'] = $this->modulo->table_areas();
				
				$this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');
				$this->form_validation->set_rules('costo', 'Costo', 'trim|required|is_numeric');
				$this->form_validation->set_rules('id_mantenimiento', 'Mantenimiento', 'required');
				$this->form_validation->set_rules('id_area', '&Aacute;rea', 'required');
				$this->form_validation->set_rules('descripcion', 'Descripci&oacte;n', 'trim|required');
				$this->form_validation->set_rules('observacion', 'Observaci&oacute;n', 'trim');
				
				$this->form_validation->set_message('placa_check', 'El campo Placa ingresado ya se encuentra ocupado.');
				
				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->modulo->read($id,$id_vehiculo);
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
					
					$data['row'] = $this->modulo->read($id,$id_vehiculo);
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

	public function delete($id_usuario=null,$id=false)
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
				if($id_usuario===FALSE)
				{
					show_404();				
				}

				$data['row_usuario'] = $this->modulo->read_usuario($id_usuario);
				if(empty($data['row_usuario']))
				{
					show_404();
				}

				if($id===FALSE)
				{
					show_404();				
				}

				$data['breadcrumbs'] = 
				array(
	              	'Pagina Principal'  			=> 'panel/index',
	              	'Gestor de Clientes'			=> 'clientes/index',
	              	'Gestor de Veh&iacute;culos'    => 'vehiculos/index/'.$id_usuario, 
	              	'Lista de Servicios'			=> $this->controller.'/index/'.$id_usuario.'/'.$id_vehiculo,
	              	'Eliminar Servicio'				=> '',              	
	            );


				$check = $this->modulo->delete($id);
				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Servicios Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Existe Servicios ó No es posible eliminar por motivos de seguridad',				
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