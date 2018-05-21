<?php
	require_once'../models/RegistroAsistencia.php';
	
	class controller_registro_asistencia
	{
		public function Insertar($fecha, $id_trabajador, $id_asistencia){
			$asignacion = new RegistroAsistencia(null, $fecha, $id_trabajador, $id_asistencia);
			$asignacion->Insert();
		}

		public function cantidadTotal($fecha){
			$obj=new RegistroAsistencia(null,$fecha,null,null);
			$obj->cantidadAsistenciaDia();
		}

		public function consultarTrabajadoresAsistencia($id_terreno){
			RegistroAsistencia::getTrabajadoresAsistencia($id_terreno);
			
		}
		
		public function Eliminar($fecha, $id_trabajador, $id_asistencia){
			$asignacion = new RegistroAsistencia(null, $fecha, $id_trabajador, $id_asistencia);
			$asignacion->eliminar();
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

		case 'consultarCantidadAsistenciaByFecha':
			$fecha=$_POST['fecha'];
			$consulta=new controller_registro_asistencia;
			$consulta->cantidadTotal($fecha);
		break;

		case 'buscar_trabajadores_con_asistencia':
			$id_terreno=$_POST['id_terreno'];
			$consultar=new controller_registro_asistencia;
			$consultar->consultarTrabajadoresAsistencia($id_terreno);
			
		break;

		case 'Eliminar':
			$fecha=$_POST['fecha'];
			$id_trabajador = $_POST['id_trabajador'];
			$id_asistencia = $_POST['id_asistencia'];
			$asignacion = new controller_registro_asistencia;
			$asignacion->Eliminar($fecha, $id_trabajador, $id_asistencia);
		break;
		
		default:
			echo "NO ENTRO A NINGUN CASO";
		break;
	}
?>