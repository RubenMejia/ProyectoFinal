<?php
	require_once'../models/AsignarEncargadosATerreno.php';
	
	class controller_asignar_encargado_a_terreno
	{
		public function Insertar($id_terreno,$encargado){
			$asignacion = new AsignarEncargadoATerreno($id_terreno, $encargado,null);
			$asignacion->Insert();
		}

		public function consultarTerreno($id_trabajador){
			$consulta=new AsignarEncargadoATerreno(null,$id_trabajador,null);
			$consulta->getTerreno();
		}


		public function Eliminar($id_terreno,$encargado){
			$asignacion = new AsignarEncargadoATerreno($id_terreno, $encargado,null);
			$asignacion->eliminar();
		}

		public function getCantidadEncargadosByTerreno($id_terreno){
			$cantidad=new AsignarEncargadoATerreno($id_terreno,null,null);
			$cantidad->Cantidad();
		}

	}
	$accion = $_POST['accion'];
	switch ($accion) {
		case 'Insertar':
			$id_terreno = $_POST['id_terreno'];
			$encargado = $_POST['encargado'];
			$asignacion = new controller_asignar_encargado_a_terreno;
			$asignacion->Insertar($id_terreno,$encargado);
		break;
		
		case 'consultarTerreno':
			$encargado=$_POST['encargado'];
			$consultar=new controller_asignar_encargado_a_terreno;
			$consultar->consultarTerreno($encargado);
		break;

		
		case 'Eliminar':
			$id_terreno = $_POST['id_terreno'];
			$encargado = $_POST['encargado'];
			$asignacion = new controller_asignar_encargado_a_terreno;
			$asignacion->Eliminar($id_terreno,$encargado);
		break;


		case 'consultarCantidadTrabajadores':
			$id_terreno=$_POST['id_terreno'];
			$consultar=new controller_asignar_encargado_a_terreno;
			$consultar->getCantidadTrabajadoresByTerreno($id_terreno);
		break;

		default:
			echo "NO ENTRO A NINGUN CASO";
		break;


	}
?>