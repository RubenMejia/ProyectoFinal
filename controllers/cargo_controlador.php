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
		
	} 
	
	$accion=$_POST['accion'];

	if($accion=='buscar_cargo_id'){
		$id_cargo=$_POST['id_cargo'];
		$obj=new cargo_controlador;
		$obj->buscarCargoId($id_cargo);
	}else{
		$obj=new cargo_controlador;
		$obj->getCargos();
	}

	
	



?>