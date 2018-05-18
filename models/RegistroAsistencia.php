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
			$data = array();
			$conexion=new Conexion;
			$sql=$conexion->prepare("SELECT id FROM ".self::TABLA." WHERE fecha=:fecha AND id_trabajador=:id_trabajador");
			$sql->bindParam(":fecha",$this->fecha);
			$sql->bindParam(":id_trabajador",$this->id_trabajador);
			if($sql->execute()){
				$num_row=$sql->rowCount();
				if($num_row>0){
				  $data['status'] = "err";
				  $data['result'] = "El trabajador ya se registro en la asistencia";
				}else{
				 	try{
						
						$conexion = new Conexion;
						$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(fecha, id_trabajador, id_asistencia) VALUES(:fecha, :id_trabajador, :id_asistencia)");
						$stmt->bindParam(':fecha', $this->fecha);
						$stmt->bindParam(':id_trabajador', $this->id_trabajador);
						$stmt->bindParam(':id_asistencia', $this->id_asistencia);

						
						if ($stmt->execute()){
						  $this->id=$conexion->lastInsertId();
						  $data['status'] = "ok";
						  $data['result'] = "Asistencia Registrada!";
						}else{
					   	  $data['status'] = "err";
						  $data['result'] = "Error en la consulta, por favor revisa los datos";
						}
						
					} catch (Exception $e) {
						die("Error Fatal: ".$e->getmessage());
					}

				}
			}else{
				$data['status'] = "err";
				$data['result'] = "Hubo un error ejecutando la consulta SQL";
			}
			$conexion = null;
			echo json_encode($data);
		 	
		} 



		public function cantidadAsistenciaDia(){
			$data="0"; 
			$conexion=new Conexion;
			$sql=$conexion->prepare("SELECT COUNT(registo_asistencia.id) AS cantidad FROM registo_asistencia INNER JOIN asistencia ON id_asistencia=asistencia.id where registo_asistencia.fecha=:fecha");
			$sql->bindParam(':fecha',$this->fecha);

			if($sql->execute()){
				$num=$sql->rowCount();
				if($num>0){
					while($row=$sql->fetch($conexion::FETCH_ASSOC))
					{
						$data=$row['cantidad'];
					}
				}else{
					$data="0";
				}

			}

			$conexion=null;
			echo json_encode($data);
		}

		public function getTrabajadoresAsistencia($id_terreno){
			$data=array();
			$conexion=new Conexion;
			$sql=$conexion->prepare("SELECT * FROM trabajador INNER JOIN asignar_trabajador_a_terreno ON id=id_trabajador INNER JOIN ".self::TABLA." ON registo_asistencia.id_trabajador=trabajador.id WHERE id_terreno=:id_terreno");
			$sql->bindParam(':id_terreno',$id_terreno);
			if($sql->execute()){
				$registros=$sql->fetchAll();
				$data['resultado']=$registros;
				$data['estado']="ok";
			}else{
				$data['resultado']="Hubo un error al ejecutar la consulta sql";
				$data['estado']="err";
			}
			$conexion=null;
			echo json_encode($data);

		}

		
	}
	
?>