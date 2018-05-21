<?php
	require_once'../models/AsignarTrabajadorATerreno.php';
	
	class controller_asignar_trabajador_a_terreno
	{
		public function Insertar($id_terreno,$id_trabajador){
			$asignacion = new AsignarTrabajadorATerreno($id_terreno, $id_trabajador,null);
			$asignacion->Insert();
		}

		public function consultarTerreno($id_trabajador){
			$consulta=new AsignarTrabajadorATerreno(null,$id_trabajador,null);
			$consulta->getTerreno();
		}

		public function getTrabajadoresByTerrenoAsistencia($id_terreno,$id_asistencia)
		{
			$consulta=new AsignarTrabajadorATerreno($id_terreno,"null",$id_asistencia);
			$consulta->getTrabajadoresAsistencia();
		}

		public function getTrabajadoresByTerrenoPagos($id_terreno,$fecha)
		{
			$consulta=new AsignarTrabajadorATerreno($id_terreno,null,null);
			$consulta->getTrabajadoresPagos($fecha);
		}


		public function Eliminar($id_terreno,$id_trabajador){
			$asignacion = new AsignarTrabajadorATerreno($id_terreno, $id_trabajador,null);
			$asignacion->Eliminar();
		}

		public function getCantidadTrabajadoresByTerreno($id_terreno){
			$cantidad=new AsignarTrabajadorATerreno($id_terreno,null,null);
			$cantidad->Cantidad();
		}

	}
	$accion = $_POST['accion'];
	switch ($accion) {
		case 'Insertar':
			$id_terreno = $_POST['id_terreno'];
			$id_trabajador = $_POST['id_trabajador'];
			$asignacion = new controller_asignar_trabajador_a_terreno;
			$asignacion->Insertar($id_terreno,$id_trabajador);
		break;
		
		case 'consultarTerreno':
			$id_trabajador=$_POST['id_trabajador'];
			$consultar=new controller_asignar_trabajador_a_terreno;
			$consultar->consultarTerreno($id_trabajador);
		break;

		
		case 'Eliminar':
			$id_terreno = $_POST['id_terreno'];
			$id_trabajador = $_POST['id_trabajador'];
			$asignacion = new controller_asignar_trabajador_a_terreno;
			$asignacion->Eliminar($id_terreno,$id_trabajador);
		break;

		case 'mostrar_trabajadores_por_terreno_asistencia':
			$id_terreno=$_POST['id_terreno'];
			$id_asistencia=$_POST['id_asistencia'];
			$consultar=new controller_asignar_trabajador_a_terreno;
			$consultar->getTrabajadoresByTerrenoAsistencia($id_terreno,$id_asistencia);
		break;

		case 'mostrar_trabajadores_por_terreno_pagos':
			$id_terreno=$_POST['id_terreno'];
			$fecha=$_POST['fecha'];
			$consultar=new controller_asignar_trabajador_a_terreno;
			$consultar->getTrabajadoresByTerrenoPagos($id_terreno,$fecha);
		break;

		case 'consultarCantidadTrabajadores':
			$id_terreno=$_POST['id_terreno'];
			$consultar=new controller_asignar_trabajador_a_terreno;
			$consultar->getCantidadTrabajadoresByTerreno($id_terreno);
		break;

		default:
			echo "NO ENTRO A NINGUN CASO";
		break;


	}
?>