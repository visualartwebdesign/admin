<?php

class Admin_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

############## OBTENER INFORMACION ###################

// Obtiene los datos de la tabla para la vista principal
	function getTabla($tabla){
		$sql="SELECT * from " . $tabla;
		$query=$this->db->query($sql);
		return $query->result_array();
	}

// Obtiene los nombres de las columnas de la tabla
	function columnName($tabla,$db=NULL){
		/*if($db=NULL){
			$sql="SELECT COLUMN_NAME 'titulos'
	  				FROM INFORMATION_SCHEMA.COLUMNS
	 					WHERE table_name = '" . $tabla . "' and TABLE_SCHEMA='admin'";
		}
	 	else{
 			$sql="SELECT COLUMN_NAME 'titulos'
  				FROM INFORMATION_SCHEMA.COLUMNS
 					WHERE table_name = '" . $tabla . "' and TABLE_SCHEMA='" . $db ."'";
	 	}*/

	 	$sql="SELECT COLUMN_NAME 'titulos'
	  				FROM INFORMATION_SCHEMA.COLUMNS
	 					WHERE table_name = '" . $tabla . "' and TABLE_SCHEMA='admin'";
		

		$query=$this->db->query($sql);
		return $query->result_array();
	}

// Obtiene el nombre de todas las tablas menos la de users
	function getNombreTablas($bd=NULL){
		if($bd==NULL)
			$sql="SELECT TABLE_NAME 
					FROM INFORMATION_SCHEMA.TABLES
					WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_NAME!='users' AND TABLE_SCHEMA='admin'";
 		else
 			$sql="SELECT TABLE_NAME 
					FROM INFORMATION_SCHEMA.TABLES
					WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_NAME!='users' AND TABLE_SCHEMA= '" . $bd . "'";
 		$query=$this->db->query($sql);
		return $query->result_array();
	}

// Obtiene las propiedades de las columnas de la tabla
	function getTablaAdd($tabla,$db=NULL){
		$sql="SELECT * FROM information_schema.columns where table_schema='admin' and table_name='" . $tabla . "'";
		$query=$this->db->query($sql);
		return $query->result_array();

	}
	
// Obtiene los datos de la tabla que coincide con el ID
	function getValues($tabla,$ID){
		$sql="SELECT * from " . $tabla . " where ID=" . $ID;
		$query=$this->db->query($sql);
		return $query->result_array();

	}

#-------------- Agregar -----------------

// Inserta los datos en la tabla
	function addValues($tabla,$datos){
		$this->db->insert($tabla,$datos);
	}

#-------------- Eliminar -----------------

// Elimina los datos de la tabla que coinciden con el id
	function del($tabla,$ID){
		$this->db->where('ID', $ID);
		$this->db->delete($tabla);
	}

#-------------- Editar -----------------
	function update($tabla,$datos,$ID){
		$this->db->where('ID',$datos['ID']);
		$this->db->update($tabla,$datos);

	}




}