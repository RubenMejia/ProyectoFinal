<?php
	require_once 'Conexion.php';
	class Asistencia{
		private $id;
		private $nombre_usuario;
		private $fecha;

		const TABLA = "asistencia";

		function __construct($id, $nombre_usuario,$fecha){
			$this->id = $id;
			$this->nombre_usuario = $nombre_usuario;
			$this->fecha=$fecha;
		}
		
		public function Insert(){
			$data = array();
			$conexion=new Conexion;
			$consulta=$conexion->prepare("SELECT id FROM ".self::TABLA." WHERE fecha=:fecha");
			$consulta->bindParam(":fecha",$this->fecha);

			if($consulta->execute()){
				$num_row=$consulta->rowCount();
				if($num_row>0){
					$data['status']="err";
					$data['result_2']="El usuario ya esta tomando asistencia hoy";
				}else{
				 	try{
						
						$conexion = new Conexion;
						$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(nombre_usuario,fecha) VALUES(:nombre_usuario,:fecha)");
						$stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
						$stmt->bindParam(':fecha', $this->fecha);

						if ($stmt->execute()){
						  $this->id=$conexion->lastInsertId();
						  $data['status'] = "ok";
						  $data['result'] = $this->id;
						}else{
					   	  $data['status'] = "err";
						  $data['result'] = "Error en la consulta, por favor revisa los datos";
						}
						
					} catch (Exception $e) {
						die("Error Fatal: ".$e->getmessage());
					}
				}
			}

			$conexion = null;
			echo json_encode($data);

		 	
		} 

		
	}
	
?>