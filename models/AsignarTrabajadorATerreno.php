<?php
	require_once 'Conexion.php';

	class AsignarTrabajadorATerreno
	{	
		private $id;
		private $id_terreno;	
		private $id_trabajador;	

		const TABLA = "asignar_trabajador_a_terreno";

		function __construct($id=null,$id_terreno,$id_trabajador){
			$this->id = $id;
			$this->id_terreno=$id_terreno;
			$this->id_trabajador=$id_trabajador;
		}

		public function getId($id){
			$this->id = $id;
		}

		public function getIdTerreno($id_terreno){
			$this->id_terreno=$id_terreno;
		}

		public function getIdTrabajador($id_trabajador){
			$this->id_trabajador = $id_trabajador;
		}	

		public function setId($id){
			echo $this->id = $id;
		}

		public function setIdTerreno($id_terreno){
			echo $this->id_terreno=$id_terreno;
		}

		public function setIdTrabajador($id_trabajador){
			echo $this->id_trabajador = $id_trabajador;
		}

		public function Insert(){
			try {
				$data = array();
				$conexion = new Conexion;
				$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(id_terreno, id_trabajador) VALUES(:id_terreno,:id_trabajador)");
				$stmt->bindParam(':id_terreno' , $this->id_terreno);
				$stmt->bindParam(':id_trabajador', $this->id_trabajador);
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