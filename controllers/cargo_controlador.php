<?php
	require_once "../models/Cargo.php";


	class cargo_controlador 
	{
		public function getCargos(){
			Cargo::getRegistros();
		}
		
	} 


	$obj=new cargo_controlador;
	$obj->getCargos();



?>