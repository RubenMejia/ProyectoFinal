<?php
	require_once "../models/Cargo.php";


	class cargo_controlador 
	{
		public function getCargos(){
			Cargo::getRegistros();
		}
		public function buscarCargoId($id_cargo){
			$buscar=new Cargo($id_cargo,null);
			$buscar->buscarCargoId();
		}

		public function setCargo($nombre_cargo){
			$query=new Cargo(null,$nombre_cargo);
			$query->setCargo();
		}

		public function updateCargo($id,$tipo){
			$query=new Cargo($id,$tipo);
			$query->updateCargo();
		}

		public function deleteCargo($id){
			$query=new Cargo($id,null);
			$query->deleteCargo();
		}
		
	} 
	
	$accion=$_POST['accion'];


	switch ($accion) {
		case 'buscar_cargo_id':
			$id_cargo=$_POST['id_cargo'];
			$obj=new cargo_controlador;
			$obj->buscarCargoId($id_cargo);
		break;

		case 'registrar_cargo':
			$nombre_cargo=$_POST['nombre_cargo'];
			cargo_controlador::setCargo($nombre_cargo);
		break;

		case 'actualizar_cargo':
			$nombre_cargo=$_POST['nombre'];
			$id_cargo=$_POST['id'];
			cargo_controlador::updateCargo($id_cargo,$nombre_cargo);
		break;

		case 'eliminar_cargo':
			$id_cargo=$_POST['id_cargo'];
			cargo_controlador::deleteCargo($id_cargo);
		break;
		
		default:
			$obj=new cargo_controlador;
			$obj->getCargos();
		break;
	}


	
		

	
		
	
		


	
	



?>