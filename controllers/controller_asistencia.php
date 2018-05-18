<?php
	require_once '../models/Asistencia.php';
	class controller_asistencia {
		
		function Insertar($nombre_usuario,$fecha){
			$obj = new Asistencia(null,$nombre_usuario,$fecha);
			$obj->Insert();
		}
	}

	$accion =$_POST['accion'];

	switch ($accion) {
		case 'insertar_asistencia':
			$nombre_usuario = $_POST['nombre_usuario'];
			$fecha=$_POST['fecha'];
			$obj = new controller_asistencia;
			$obj->Insertar($nombre_usuario,$fecha);
		break;
	}


?>