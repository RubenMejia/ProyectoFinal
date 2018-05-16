<?php 
	require_once "../models/Registro_dia.php";

	
	class controllerRegistroDia
	{
		function EmpezarDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno){
			$registrar=new RegistroDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno);
			$registrar->empezarDia();

		}


		
	}

	$accion=$_POST['accion'];

	switch ($accion) {
		case 'nuevoDia':
			$id=null;
			$kilos_de_cafe=null;
			$descripcion=null;
			$fecha=$_POST['fecha'];
			$nombre_usuario=$_POST['nombre_usuario'];
			$id_trabajador=null;
			$id_terreno=$_POST['terreno_id'];
			$obj=new controllerRegistroDia;
			$obj->EmpezarDia($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno);
		break;

		
		
		default:
			# code...
		break;
	}

?>