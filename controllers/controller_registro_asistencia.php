<?php
	require_once'../models/RegistroAsistencia.php';
	
	class controller_registro_asistencia
	{
		public function Insertar($fecha, $id_trabajador, $id_asistencia){
			$asignacion = new RegistroAsistencia(null, $fecha, $id_trabajador, $id_asistencia);
			$asignacion->Insert();
		}

	}
	$accion = $_POST['accion'];
	switch ($accion) {
		case 'Insertar':
			$fecha=$_POST['fecha'];
			$id_trabajador = $_POST['id_trabajador'];
			$id_asistencia = $_POST['id_asistencia'];
			$asignacion = new controller_registro_asistencia;
			$asignacion->Insertar($fecha, $id_trabajador, $id_asistencia);
		break;
		
		default:
			echo "NO ENTRO A NINGUN CASO";
		break;
	}
?>