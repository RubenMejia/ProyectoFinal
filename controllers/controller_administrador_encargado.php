<?php 	 
	require_once '../models/Administrador_encargado.php';
	
	class controller_administrador_encargado{
		public function insert($id_usuario,$id_encargado){
			$obj = new Administrador_encargado($id_usuario,$id_encargado);
			$obj->Insert();
		}
	}

	$accion = 'insertar';
	switch ($accion) {
		
		case 'insertar':
			$id_usuario = "deividasccc1" ;
			$id_encargado = "danka";
			
			$obj = new controller_administrador_encargado;
			$obj->insert($id_usuario,$id_encargado);
		
		break;
		
		default:
			echo("NADA");
		break;
	}
?>