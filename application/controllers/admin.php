<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/login');
		}
	}
	
	public function index()	{	
		//Aca hay que elegir cual seria la categoria por defecto
		redirect(base_url().'index.php/admin/view/productos');
	}

#-------------- Ver -----------------

	function view($tabla){
		$this->load->model('admin_model');

		#pasar el valor por parametro con el nombre de la base de datos
		$data['nav']=$this->admin_model->getNombreTablas();
		
		$data['tabla']=$this->admin_model->getTabla($tabla);
		$data['titulos']=$this->admin_model->ColumnName($tabla);
		$data['nombre']=$tabla;

		$data['columnas']=$this->admin_model->getTablaAdd("productos");

		
		$data['body']=$this->load->view('admin_view',$data,true);
		$this->load->view('principal',$data);

	}

#-------------- Agregar -----------------

	function add($tabla){
		$this->load->model('admin_model');
		$data['nav']=$this->admin_model->getNombreTablas();
		$data['titulos']=$this->admin_model->columnName($tabla);
		$data['nombre']=$tabla;
		$data['formulario']=$this->admin_model->getTablaAdd($tabla);

		$data['body']=$this->load->view('admin_add',$data,true);
		$this->load->view('principal',$data);
	}

	function addValues(){
		$this->load->model('admin_model');
		$nombreTabla=$this->input->post('tabla');
		$columnas=$this->admin_model->columnName($nombreTabla);

		$datos['ID']=NULL;
		
		for($i=1;$i<count($columnas);$i++){
			$datos[$columnas[$i]['titulos']]=$this->input->post($i);
		}
	
		$this->admin_model->addValues($nombreTabla,$datos);
		redirect(base_url().'index.php/admin/view/' . $nombreTabla);
	}


	#-------------- Eliminar -----------------

	function del($tabla,$ID){

		$this->load->model('admin_model');
		$this->admin_model->del($tabla,$ID);

		redirect(base_url('/index.php/admin/view/' . $tabla));	
	}


	#-------------- Editar -----------------

	function edit($tabla,$ID){
		$this->load->model('admin_model');
		$data['nav']=$this->admin_model->getNombreTablas();
		$data['titulos']=$this->admin_model->columnName($tabla);
		$data['nombre']=$tabla;
		$data['formulario']=$this->admin_model->getTablaAdd($tabla);
		
		$data['datos'][0]=$this->admin_model->getValues($tabla,$ID);
		$data['datos']=array_values($data['datos'][0][0]);

		$data['body']=$this->load->view('admin_edit',$data,true);
		$this->load->view('principal',$data);

	}

	function update(){
		$this->load->model('admin_model');
		$tabla=$this->input->post('tabla');
		$columnas=$this->admin_model->columnName($tabla);
		
		$datos['ID']=$this->input->post('ID');

		for($i=1;$i<count($columnas);$i++){
			$datos[$columnas[$i]['titulos']]=$this->input->post($i);
		}

		$this->admin_model->update($tabla,$datos,$datos['ID']);
		redirect(base_url('index.php/admin/view/' . $tabla));
	}

}
