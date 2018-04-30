<?php
	require_once'../models/AsignarTrabajadorATerreno.php';
	
	class controller_asignar_trabajador_a_terreno
	{
		public function Insertar($id_terreno,$id_trabajador){
			$asignacion = new AsignarTrabajadorATerreno(null, $id_terreno, $id_trabajador);
			$asignacion->Insert();
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
		
		default:
			echo "NO ENTRO A NINGUN CASO";
		break;
	}
?>