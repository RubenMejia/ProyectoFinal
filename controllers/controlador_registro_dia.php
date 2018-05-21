<?php 
	require_once "../models/Registro_dia.php";

	
	class controllerRegistroDia
	{
		function EmpezarDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno,$estado){
			$registrar=new RegistroDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno,$estado);
			$registrar->empezarDia();

		}

		function ComprobarDisponibilidad($fecha,$id_terreno){
			$query=new RegistroDia(null,null,null,$fecha,null,null,$id_terreno,null);
			$query->ComprobarDisponibilidad();
		}

		function finalizarDia($fecha,$id_terreno){
			$query=new RegistroDia(null,null,null,$fecha,null,null,$id_terreno,null);
			$query->finalizarDia();
		}

		function consultarEstadoDia($fecha,$id_terreno){
			$query=new RegistroDia(null,null,null,$fecha,null,null,$id_terreno,null);
			$query->getEstado();
		}

		function getCantidad($user){
			$objeto = new RegistroDia(null,null,null,null,$user,null,null,null);
			$objeto->getCantidadDias();
		}

		function cancelarDia($fecha){
			$query=new RegistroDia(null,null,null,$fecha,null,null,null,null);
			$query->cancelarDia();
		}
		
	}

	$accion=$_POST['accion'];

	switch ($accion) {
		case 'nuevoDia':
			$id=null;
			$kilos_de_cafe=null;
			$descripcion=null;
			$fecha=null;
			$estado="activo";
			$nombre_usuario=$_POST['nombre_usuario'];
			$id_trabajador=null;
			$id_terreno=$_POST['terreno_id'];
			$obj=new controllerRegistroDia;
			$obj->EmpezarDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno,$estado);
		break;

		case 'finalizarDia':
			$fecha=$_POST['fecha'];
			$id_terreno=$_POST['id_terreno'];
			$obj=new controllerRegistroDia;
			$obj->finalizarDia($fecha,$id_terreno);
		break;

		case 'comprobarDia':
			$fecha=$_POST['fecha'];
			$id_terreno=$_POST['id_terreno'];
			$obj=new controllerRegistroDia;
			$obj->ComprobarDisponibilidad($fecha,$id_terreno);
		break;
		
		case 'consultarEstadoDia':
			$fecha=$_POST['fecha'];
			$id_terreno=$_POST['id_terreno'];
			$obj=new controllerRegistroDia;
			$obj->consultarEstadoDia($fecha,$id_terreno);
		break;

		case 'cancelarDia':
			$fecha=$_POST['fecha'];
			$obj=new controllerRegistroDia;
			$obj->cancelarDia($fecha);
		break;

		case 'cantidad':
			$user = $_POST['user'];
			controllerRegistroDia::getCantidad($user);
		break;


		
		default:
			# code...
		break;
	}

?>