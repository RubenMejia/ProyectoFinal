<?php 	 
	require_once '../models/Administrador_encargado.php';
	
	class controller_administrador_encargado{
		public function insert($id_usuario,$id_encargado){
			$obj = new Administrador_encargado($id_usuario,$id_encargado);
			$obj->Insert();
		}

		public function cantidad($usuario){
			$obj = new Administrador_encargado($usuario,null);
			$obj->cantidad();
		}
	}

	$accion = $_POST['accion'];
	switch ($accion) {
		
		case 'insertar':
			$id_usuario = $_POST['usuario'] ;
			$id_encargado = $_POST['encargado'];
			
			$obj = new controller_administrador_encargado;
			$obj->insert($id_usuario,$id_encargado);
		
		break;


		case 'cantidad':
			$usuario=$_POST['user'];
			$obj = new controller_administrador_encargado;
			$obj->cantidad($usuario);
		break;
		
		default:
			echo("NADA");
		break;
	}
?>