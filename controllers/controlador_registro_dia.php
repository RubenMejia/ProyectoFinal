<?php 
	require_once "../models/Registro_dia.php";

	
	class controllerRegistroDia
	{
		function EmpezarDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno){
			$registrar=new RegistroDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno);
			$registrar->empezarDia();

		}

		function ComprobarDisponibilidad($fecha,$id_terreno){
			$query=new RegistroDia(null,null,null,$fecha,null,null,$id_terreno);
			$query->ComprobarDisponibilidad();
		}

		
	}

	$accion=$_POST['accion'];

	switch ($accion) {
		case 'nuevoDia':
			$id=null;
			$kilos_de_cafe=null;
			$descripcion=null;
			$fecha=null;
			$nombre_usuario=$_POST['nombre_usuario'];
			$id_trabajador=null;
			$id_terreno=$_POST['terreno_id'];
			$obj=new controllerRegistroDia;
			$obj->EmpezarDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno);
		break;

		case 'comprobarDia':
			$fecha=$_POST['fecha'];
			$id_terreno=$_POST['id_terreno'];
			$obj=new controllerRegistroDia;
			$obj->ComprobarDisponibilidad($fecha,$id_terreno);
		break;
		
		
		default:
			# code...
		break;
	}

?>