<?php
	require_once'../models/AsignarTrabajadorATerreno.php';
	
	class controller_asignar_trabajador_a_terreno
	{
		public function Insertar($id_terreno,$id_trabajador){
			$asignacion = new AsignarTrabajadorATerreno($id_terreno, $id_trabajador);
			$asignacion->Insert();
		}

		public function consultarTerreno($id_trabajador){
			$consulta=new AsignarTrabajadorATerreno(null,$id_trabajador);
			$consulta->getTerreno();
		}

		public function getTrabajadoresByTerreno($id_terreno)
		{
			$consulta=new AsignarTrabajadorATerreno($id_terreno,null);
			$consulta->getTrabajadores();
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

		default:
			echo "NO ENTRO A NINGUN CASO";
		break;


		case 'mostrar_trabajadores_por_terreno':
			$id_terreno=$_POST['id_terreno'];
			$consultar=new controller_asignar_trabajador_a_terreno;
			$consultar->getTrabajadoresByTerreno($id_terreno);
		break;

		
	}
?>