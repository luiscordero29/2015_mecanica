<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {

	/**
	 * Controller: Panel
	 * Comments: Gestor de usuarios - Pagina Privada
	 *
	 * 
	 */

	public $controller = "vehiculos";

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
		

	public function index($id_usuario=null)
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
	              	'Gestor de Clientes'	=> 'clientes/index/'.$id_usuario,
	              	'Gestor de Veh&iacute;culos'    => '',            	
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

				$data['controller'] = $this->controller;				
				$data['table'] = $this->modulo->table($id_usuario);

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

	public function create($id_usuario=null)
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
	              	'Gestor de Veh&iacute;culos'	=> $this->controller.'/index/'.$id_usuario,
	              	'Registrar Veh&iacute;culo'		=> '',              	
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
	            
	            $data['controller'] = $this->controller;
	            $data['table_tipos'] = $this->modulo->table_tipos();
	            $data['table_marcas'] = $this->modulo->table_marcas();
	            $data['table_colores'] = $this->modulo->table_colores();
				
				$this->form_validation->set_rules('placa', 'Placa del Veh&iacute;culo', 'trim|required|is_unique[vehiculos.placa]');
				$this->form_validation->set_rules('periodo', 'Año', 'trim|required|is_unique[vehiculos.placa]|exact_length[4]|is_natural_no_zero');
				$this->form_validation->set_rules('id_tipo', 'Tipo', 'required');
				$this->form_validation->set_rules('id_color', 'Color', 'required');
				$this->form_validation->set_rules('id_marca', 'Marca', 'required');
				$this->form_validation->set_rules('id_modelo', 'Modelo', 'required');
				

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

	public function update($id_usuario=null,$id=false)
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
	              	'Pagina Principal'  	=> 'panel/index',
	              	'Gestor de Clientes'	=> 'clientes/index',
	              	'Gestor de Veh&iacute;culos'	=> $this->controller.'/index/'.$id_usuario,
	              	'Editar Veh&iacute;culos'		=> '',              	
	            );
	            
	            $data['controller'] = $this->controller;
	            $data['table_tipos'] = $this->modulo->table_tipos();
	            $data['table_marcas'] = $this->modulo->table_marcas();
	            $data['table_colores'] = $this->modulo->table_colores();
				
				$this->form_validation->set_rules('placa', 'Placa del Veh&iacute;culo', 'trim|required|callback_placa_check');
				$this->form_validation->set_rules('periodo', 'Año', 'trim|required|is_unique[vehiculos.placa]|exact_length[4]|is_natural_no_zero');
				$this->form_validation->set_rules('id_tipo', 'Tipo', 'required');
				$this->form_validation->set_rules('id_color', 'Color', 'required');
				$this->form_validation->set_rules('id_marca', 'Marca', 'required');
				$this->form_validation->set_rules('id_modelo', 'Modelo', 'required');
				
				$this->form_validation->set_message('placa_check', 'El campo Placa ingresado ya se encuentra ocupado.');
				
				if($this->form_validation->run() == FALSE)
				{
					$data['row'] = $this->modulo->read($id,$id_usuario);
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
					
					$data['row'] = $this->modulo->read($id,$id_usuario);
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
	              	'Pagina Principal'  	=> 'panel/index',
	              	'Gestor de Clientes'	=> 'clientes/index',
	              	'Gestor de Veh&iacute;culos'	=> $this->controller.'/index/'.$id_usuario,
	              	'Eliminar Veh&iacute;culos'		=> '',              	
	            );


				$check = $this->modulo->delete($id);
				if($check)
		      	{
		           	$data['alert']['success'] = 
						array( 
							'Vehiculos Eliminado Exitosamente',				
						);
		      	}
		      	else
		      	{         
		           	$data['alert']['danger'] = 
						array( 
							'No Existe Vehiculos ó No es posible eliminar por motivos de seguridad',				
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

	public function table_modelos()
    {
        if($this->session->has_userdata('id_usuario'))
   		{     				
	     		     	
	        $rows = "";
	        
	        $id_marca = $this->input->post('id_marca');
	        $rows = $this->modulo->table_modelos($id_marca);
	        echo '<option value="">SELECCIONE...</option>';
	        if ($rows) {
		        foreach($rows as $row)
		        {	
		            echo '<option value="'.$row['id_modelo'].'">'.$row['modelo'].'</option>';
		        }
	        }
	        
	    }
	   	else
	   	{
	     	//If no session, redirect to login page
	     	redirect('signin', 'refresh');
	   	}
    }

    public function placa_check()
	{	
		$check = $this->modulo->placa_check();
		if($check)  
	    {  
	        return false;  
	    }  
	    else  
	    {  
	        return true;  
	    }		
	}

}