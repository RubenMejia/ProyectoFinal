<?php
	require_once 'Conexion.php';

	class AsignarTrabajadorATerreno
	{	

		private $id_terreno;	
		private $id_trabajador;	

		const TABLA = "asignar_trabajador_a_terreno";

		function __construct($id_terreno,$id_trabajador){
			
			$this->id_terreno=$id_terreno;
			$this->id_trabajador=$id_trabajador;
		}

		

		public function getIdTerreno($id_terreno){
			$this->id_terreno=$id_terreno;
		}

		public function getIdTrabajador($id_trabajador){
			$this->id_trabajador = $id_trabajador;
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
				$stmt=$conexion->prepare('SELECT * FROM asignar_trabajador_a_terreno WHERE id_terreno=:id_terreno AND id_trabajador=:id_trabajador');
				$stmt->bindParam(':id_terreno',$this->id_terreno);
				$stmt->bindParam(':id_trabajador',$this->id_trabajador);
				if($stmt->execute()){
					$num_row=$stmt->rowCount();
							
					if($num_row>0){
						
						$data['status']="err";
						$data['result']="El Trabajador ya esta asignado a ese Terreno";
					}else if($num_row<=0){
					
						$stmt2 = $conexion->prepare("INSERT INTO ".self::TABLA." (id_terreno, id_trabajador) VALUES (:id_terreno_2,:id_trabajador_2)");
						$stmt2->bindParam(':id_terreno_2', $this->id_terreno);
						$stmt2->bindParam(':id_trabajador_2', $this->id_trabajador);
						if ($stmt2->execute()){
						  $data['status'] = "ok";
						  $data['result'] = "El trabajado a quedado asignado al terreno con exito";
						}else{
					   	  $data['status'] = "err";
						  $data['result'] = "Error en la consulta, por favor revisa los datos";
						}
					}
					
					$conexion = null;
					echo json_encode($data);
				}

			} catch (Exception $e) {
				die("Error Fatal: ".$e->getmessage());
			}
		}


		public function getTerreno(){
			$data=array();
			$conexion=new Conexion();
			$sql=$conexion->prepare("SELECT nombre from terrenos INNER JOIN asignar_trabajador_a_terreno ON id=id_terreno WHERE id_trabajador=:id_trabajador");
			$sql->bindParam(':id_trabajador',$this->id_trabajador);
			if($sql->execute()){
				$num_row=$sql->rowCount();
				if($num_row>0){
					$registros=$sql->fetchAll();
					$data['estado']="ok";
					$data['resultado']=$registros;
				}else{
					$data['estado']="err";
					$data['resultado']="El Trabajador aun no se encuentra asignado a ningun terreno";
				}
			}else{
				$data['estado']="err";
				$data['resultado']="Error al Ejecutat la consulta sql";
			}

			$conexion=null;
			echo json_encode($data);

		}
	}
	


?>  