<?php
	require_once '../models/Asistencia.php';
	class controller_asistencia {
		
		function Insertar($nombre_usuario){
			$obj = new Asistencia(null,$nombre_usuario);
			$obj->Insert();
		}
	}

	$accion =$_POST['accion'];

	switch ($accion) {
		case 'insertar_asistencia':
			$nombre_usuario = $_POST['nombre_usuario'];
			$obj = new controller_asistencia;
			$obj->Insertar($nombre_usuario);
		break;
	}


?>