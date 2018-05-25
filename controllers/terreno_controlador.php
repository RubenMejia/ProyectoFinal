<?php

	require_once "../models/Terreno.php";

	$accion=$_POST['accion'];

	class terreno_controlador
	{
		public function nuevoTerreno($id, $nombre, $nombre_usuario){
			  $registrar=new Terreno($id, $nombre, $nombre_usuario);
			  $registrar->guardar();
		}

		public function BuscarTodosTerrenos($usuario){
			$terreno = new Terreno(null, null, $usuario);
			$terreno->BuscarTodosTerrenos();
		}
		public function EliminarTerreno($id){
			$terreno = new Terreno($id, null, null);
			$terreno->eliminar();
		}

		public function ActualizarTerreno($id,$nombre_terreno){
			$terreno = new Terreno($id,$nombre_terreno, null);
			$terreno->Actualizar();
		}

		
			public function getCantidad($user){
				$objeto = new Terreno(null,null,$user);
				$objeto->getCantidadTerrenos();
			}

			public function getCantidadParaEncargados($user){
				$objeto = new Terreno(null,null,$user);
				$objeto->getCantidadTerrenosParaEncargados();
			}

		public function BuscarTodosTerrenos_2($usuario,$encargado){
			$terreno = new Terreno(null, null, $usuario);
			$terreno->BuscarTodosTerrenos_2($encargado);
		}	

		public function BuscarTodosTerrenosAsignados($usuario){
			$terreno = new Terreno(null, null, $usuario);
			$terreno->BuscarTodosTerrenosAsignados($usuario);
		}

		
	}

	switch ($accion) {
		case "registrar_terreno":
			$nombre_usuario=$_POST['usuario'];
			$nombre_terreno=$_POST['terreno']; 
			$terreno = new terreno_controlador;
			$terreno->nuevoTerreno(null,$nombre_terreno,$nombre_usuario);
		break;
		case 'buscar_todos_terrenos':
			$usuario=$_POST['nombre_usuario'];
			$terreno = new terreno_controlador;
			$terreno->BuscarTodosTerrenos($usuario);
		break;
		case 'buscar_todos_terrenos_2':
			$usuario=$_POST['nombre_usuario'];
			$encargado=$_POST['encargado'];
			$terreno = new terreno_controlador;
			$terreno->BuscarTodosTerrenos_2($usuario,$encargado);
		break;

		case 'buscar_todos_terrenos_asignados':
			$usuario=$_POST['nombre_encargado'];
			$terreno = new terreno_controlador;
			$terreno->BuscarTodosTerrenosAsignados($usuario);
		break;

		case 'eliminar_terreno':
			$id = $_POST['id_terreno'];
			$terreno = new terreno_controlador;
			$terreno->EliminarTerreno($id);
		break;
		case 'actualizar_terreno':
			$id = $_POST['id'];
			$nombre_terreno = $_POST['nombre_terreno'];
			$terreno = new terreno_controlador;
			$terreno->ActualizarTerreno($id,$nombre_terreno);
		break;

		case 'cantidad':
			$user = $_POST['user'];
			terreno_controlador::getCantidad($user);
		break;

		case 'cantidad_para_encargados':
			$user = $_POST['user'];
			terreno_controlador::getCantidadParaEncargados($user);
		break;
	}
?>