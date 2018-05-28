<?php

 	require_once "../models/Persona.php";
 	$accion=$_POST['accion'];


 	
 	class PersonaControlador
 	{
 		public function setPersona($nombres,$apellidos,$telefono){
 			$registrar=new Persona($nombres,$apellidos,$telefono,null,null);
 			$registrar->guardar();
 		}

 		public function setPersonaEncargado($nombres,$apellidos,$telefono,$cedula){
 			$registrar=new Persona($nombres,$apellidos,$telefono,null,$cedula);
 			$registrar->guardarPersonaEncargado();
 		}

 		public function getPersona($usuario)
 		{
 			$objeto=new Persona(null, null, null, null, null);
 			$objeto->getPersona($usuario);
 		}

 		public function actualizarDatosPersona($user,$nombre,$apellido,$telefono,$nombre_empresa)
 		{
 			$objeto = new Persona($nombre,$apellido,$telefono,$nombre_empresa, null);
 			$objeto->actualizarPersona($user);
 		}

 		
 	}

 	if($accion=='registrar_usuario'){

 		$nombres=$_POST['nombres'];
 		$apellidos=$_POST['apellidos'];
 		$telefono=$_POST['telefono'];

 		$nuevo=new PersonaControlador;
 		$nuevo->setPersona($nombres,$apellidos,$telefono);
 		
 		
 	}else if($accion=="registrar_usuario_encargado"){
 		$nombres=$_POST['nombres'];
 		$apellidos=$_POST['apellidos'];
 		$telefono=$_POST['telefono'];
 		$cedula=$_POST['cedula'];

 		$nuevo=new PersonaControlador;
 		$nuevo->setPersonaEncargado($nombres,$apellidos,$telefono,$cedula);

 	}elseif ($accion=='datosempresa') {
 		$usuario=$_POST['id_persona'];
 		$objeto=new PersonaControlador;
 		$objeto->getPersona($usuario);

 	}elseif ($accion=='actualizarPersona') {
 		$user = $_POST['usuario'];
 		$nombre = $_POST['nombre'];
 		$apellido = $_POST['apellido'];
 		$telefono = $_POST['telefono'];
 		$nombre_empresa = $_POST['nombre_empresa'];

 		$objeto=new PersonaControlador();
 		$objeto->actualizarDatosPersona($user,$nombre,$apellido,$telefono,$nombre_empresa);
 	}



?>