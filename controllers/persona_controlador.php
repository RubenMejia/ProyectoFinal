<?php

 	require_once "../models/Persona.php";
 	$accion=$_POST['accion'];


 	
 	class PersonaControlador
 	{
 		public function setPersona($nombres,$apellidos,$telefono){
 			$registrar=new Persona($nombres,$apellidos,$telefono);
 			$registrar->guardar();
 		}
 		
 	}

 	if($accion=='registrar_usuario'){

 		$nombres=$_POST['nombres'];
 		$apellidos=$_POST['apellidos'];
 		$telefono=$_POST['telefono'];

 		$nuevo=new PersonaControlador;
 		$nuevo->setPersona($nombres,$apellidos,$telefono);
 		
 		
 	}



?>