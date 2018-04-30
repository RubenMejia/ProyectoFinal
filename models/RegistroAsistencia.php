<?php
	require_once 'Conexion.php';
	class RegistroAsistencia{
		private $id;
		private $fecha;
		private $id_trabajador;
		private $id_asistencia;

		const TABLA = "registo_asistencia";

		function __construct( $id, $fecha, $id_trabajador, $id_asistencia ){
			$this->id = $id;
			$this->fecha = $fecha;
			$this->id_trabajador = $id_trabajador;
			$this->id_asistencia = $id_asistencia;
		}
		
		public function Insert(){
		 	try{
				$data = array();
				$conexion = new Conexion;
				$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(fecha, id_trabajador, id_asistencia) VALUES(:fecha, :id_trabajador, :id_asistencia)");
				$stmt->bindParam(':fecha', $this->fecha);
				$stmt->bindParam(':id_trabajador', $this->id_trabajador);
				$stmt->bindParam(':id_asistencia', $this->id_asistencia);

				
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