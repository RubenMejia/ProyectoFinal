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
 	}



?>