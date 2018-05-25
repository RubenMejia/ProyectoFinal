<?php

	require_once '../models/Trabajador.php';

	class controller_Trabajador
	{
		
		public function nuevo_Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo,$tipo)
		{
			$objeto = new Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo,$tipo);
			$objeto->insert();
		}
	
		public function get_Trabajador($usuario,$nombre_trabajador)
		{
			$objeto = new Trabajador(null, $nombre_trabajador, null, null, $usuario, null, null);
			$objeto->searchByName();
		}

		public function update_Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo)
		{
			$objeto = new Trabajador($id,$nombres,$apellidos,$telefono,$nombre_usuario,$id_cargo,null);
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

		public function getTrabajadores($user)
		{
			Trabajador::getTrabajadores($user);
		}


		public function getTrabajadoresAsignar($user, $id_terreno)
		{
			Trabajador::getTrabajadoresAsignar($user, $id_terreno);
		}

		public function getTrabajadoresAsignarEncargado($user, $id_terreno)
		{
			Trabajador::getTrabajadoresAsignarEncargado($user, $id_terreno);
		}

		public function getCargoTrabajador($id_trabajador)
		{
			$consulta=new Trabajador($id_trabajador,null,null,null,null,null,null);
			$consulta->getCargoTrabajador();
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
			$usuario = $_POST['usuario'];
			$nombre_trabajador=$_POST['nombre_buscar'];
			$obj = new controller_Trabajador;
			$obj->get_Trabajador($usuario,$nombre_trabajador);
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
			$user = $_POST['user'];
			controller_Trabajador::getCantidad($user);
		break;

		case 'cantidad_!':
			$user = $_POST['user'];
			controller_Trabajador::getCantidadEncargtados($user);
		break;

		case 'mostrar_trabajadores':
			$user=$_POST['user'];
			controller_Trabajador::getTrabajadores($user);
		break;

		case 'mostrar_trabajadores_para_asignar':
			$user=$_POST['user'];
			$id_terreno=$_POST['id_terreno'];
			controller_Trabajador::getTrabajadoresAsignar($user, $id_terreno);
		break;

		case 'consultar_cargo_trabajador':
			$id_trabajador=$_POST['id_trabajador'];
			controller_Trabajador::getCargoTrabajador($id_trabajador);
		break;	

		case 'mostrar_trabajadores_para_asignar_encargados':
			$user=$_POST['user'];
			$id_terreno=$_POST['id_terreno'];
			controller_Trabajador::getTrabajadoresAsignarEncargado($user, $id_terreno);
		break;

		


		
	}



?>