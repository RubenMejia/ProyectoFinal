<?php

	require_once '../models/Trabajador.php';

	class controller_Trabajador
	{
		
		public function nuevo_Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo,$tipo)
		{
			$objeto = new Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo,$tipo);
			$objeto->insert();
		}
	
		public function get_Trabajador($nombres)
		{
			$objeto = new Trabajador(null, null, null, null, $nombres, null, null);
			$objeto->searchByName();
		}

		public function update_Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo)
		{
			$objeto = new Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo);
			$objeto->Update();
		}

		public function eliminar_Trabajador($id)
		{
			Trabajador::Delete($id);
		}

		public function getCantidad($user)
		{
			Trabajador::getCantidadTrabajadores($user);
		}

		public function getCantidadEncargtados($user)
		{
			Trabajador::getCantidadEncargtadosT($user);
		}

	}

	$accion = $_POST['accion'];
	
	switch ($accion) {
		case 'insert':
			
			$id = null;	
			$nombres = $_POST['nombres'];	
			$apellidos = $_POST['apellidos'];	
			$telefono = $_POST['telefono'];	
			$nombre_usuario = $_POST['nombre_usuario'];	
			$id_cargo = $_POST['id_cargo'];
			$tipo_trabajador="trabajador";

			$obj = new controller_Trabajador;
			$obj->nuevo_Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo,$tipo_trabajador);

		break;

		case 'SearchByName':
			$nombre = "david";
			$obj = new controller_Trabajador;
			$obj->get_Trabajador($nombre);
		break;

		case 'Update':
			
			$id = $_POST['id'];	
			$nombres = $_POST['nombres'];	
			$apellidos = $_POST['apellidos'];	
			$telefono = $_POST['telefono'];	
			$nombre_usuario = $_POST['nombre_usuario'];	
			$id_cargo = $_POST['id_cargo'];

			$obj = new controller_Trabajador;
			$obj->update_Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo);

		break;
		
		case'Delete':
			$id = $_POST['id'];
			$obj= new controller_Trabajador;
			$obj->eliminar_Trabajador($id);
		break;

		case 'cantidad':
			$user = "david";
			controller_Trabajador::getCantidad($user);
		break;

		case 'cantidad_!':
			$user = $_POST['user'];
			controller_Trabajador::getCantidadEncargtados($user);
		break;


		
	}



?>