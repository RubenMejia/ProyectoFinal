<?php
	require_once 'Conexion.php';
	class Asistencia{
		private $id;
		private $nombre_usuario;

		const TABLA = "asistencia";

		function __construct($id, $nombre_usuario){
			$this->id = $id;
			$this->nombre_usuario = $nombre_usuario;
		}
		
		public function Insert(){
		 	try{
				$data = array();
				$conexion = new Conexion;
				$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(nombre_usuario) VALUES(:nombre_usuario)");
				$stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
				
				if ($stmt->execute()){
				  $this->id=$conexion->lastInsertId();
				  $data['status'] = "ok";
				  $data['result'] = "Datos Ingresados Con Exito";
				}else{
			   	  $data['status'] = "err";
				  $data['result'] = "Error en la consulta, por favor revisa los datos";
				}
				$conexion = null;
				echo json_encode($data);
			} catch (Exception $e) {
				die("Error Fatal: ".$e->getmessage());
			}
		 } 
	}
	
?>