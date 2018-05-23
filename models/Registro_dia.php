<?php
	require_once 'Conexion.php';

	class RegistroDia 
	{
		private $id;
		private $kilos_de_cafe;
		private $descripcion;
		private $fecha;
		private $nombre_usuario;
		private $id_trabajador;
		private $id_terreno;
		private $estado;
		const TABLA="registro_trabajo_realizado";
		
		function __construct($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno,$estado)
		{
			$this->id=$id;
			$this->kilos_de_cafe=$kilos_de_cafe;
			$this->descripcion=$descripcion;
			$this->fecha=$fecha;
			$this->nombre_usuario=$nombre_usuario;
			$this->id_trabajador=$id_trabajador;
			$this->id_terreno=$id_terreno;
			$this->estado=$estado;
		}

		public function empezarDia(){
			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare('INSERT INTO '.self::TABLA.' (fecha,nombre_usuario,id_terreno,estado) VALUES (NOW(),:nombre_usuario,:id_terreno,:estado)');
			//$sql->bindParam(':fecha',$this->fecha);
			$sql->bindParam(':nombre_usuario',$this->nombre_usuario);
			$sql->bindParam(':id_terreno',$this->id_terreno);
			$sql->bindParam(':estado',$this->estado);

			if($sql->execute()){
				$this->id=$conectar->lastInsertId();
				$data['estado']="ok";
				$data['resultado']="Dia Registrado y Empezado";

			}else{
				$data['estado']="err";
				$data['resultado']="No se puedo registrar Dia ";
			}

			echo json_encode($data);
			$conectar=null;
		}

		public function ComprobarDisponibilidad(){
			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare('SELECT id FROM '.self::TABLA.' WHERE fecha=:fecha AND id_terreno=:id_terreno');
			$sql->bindParam(':fecha',$this->fecha);
			$sql->bindParam(':id_terreno',$this->id_terreno);

			if($sql->execute()){
				$num_row=$sql->rowCount();
				if($num_row>0){
					$data['estado']="No disponible";
					$data['resultado']="El dia ya se esta realizando o se ha realizado";
				}else{
					$data['estado']="disponible";
					$data['resultado']="Dia Disponible";
				}


			}else{
				$data['estado']="err";
				$data['resultado']="Hubo un error al ejecutar la consulta SQL";
			}

			$conectar=null;
			echo json_encode($data);

		}

		public function finalizarDia(){
			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare("UPDATE ".self::TABLA." set estado='finalizado' WHERE id_terreno=:id_terreno AND fecha=:fecha");
			$sql->bindParam(":id_terreno",$this->id_terreno);
			$sql->bindParam(":fecha",$this->fecha);

			if($sql->execute()){
				$data['estado']="ok";
				$data['resultado']="Dia Finalizado con Exito";
			}else{
				$data['estado']="err";
				$data['resultado']="Error al ejecutar la consulta SQL";
			}
			$conexion=null;
			echo json_encode($data);

		}

		public function getEstado(){
			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare("SELECT estado from registro_trabajo_realizado WHERE fecha=:fecha and id_terreno=:id_terreno");
			$sql->bindParam(":fecha",$this->fecha);
			$sql->bindParam(":id_terreno",$this->id_terreno);
			if($sql->execute()){
				$num_row=$sql->rowCount();
				
				while ($row=$sql->fetch($conectar::FETCH_ASSOC)) {
					$data['resultado']=$row['estado'];
				}
				$data['estado']="ok";
						
				
			}else{
				$data['estado']="err";
				$data['resultado']="Error al ejecutar la consulta SQL";
			}

			$conexion=null;
			echo json_encode($data);
		}

		public function getCantidadDias(){
			$data="0";
			$conexion=new Conexion();
			try {
				$sentencia=$conexion->prepare("SELECT COUNT(id) AS cantidad FROM ".self::TABLA." WHERE nombre_usuario = :user");

				$sentencia->bindParam(":user", $this->nombre_usuario);
				$sentencia->execute();
				$num=$sentencia->rowCount();
				if($num>0){
					while($row=$sentencia->fetch($conexion::FETCH_ASSOC)){
						$data=$row['cantidad'];
					}
				}else{
					$data="0";
				}
			} catch (Exception $e) {
				$data="Por favor verifique que no hallan problemas de conectividad".$e->getMessage(); 
			}

			$conexion=null;
			echo json_encode($data);
		}


		public function cancelarDia(){
			$conexion=new Conexion;
			$sql=$conexion->prepare("DELETE FROM ".self::TABLA." WHERE fecha=:fecha; 
									 DELETE FROM asistencia WHERE asistencia.fecha=fecha;
									 DELETE FROM pago_a_trabajadores WHERE fecha=fecha;
									 DELETE FROM registo_asistencia WHERE fecha=fecha ");
			$sql->bindParam(':fecha',$this->fecha);
			if($sql->execute()){
				$data="Dia Cancelado con Exito!";
			}else{
				$data="Erro al ejecutar la consulta sql";
			}
			// eliminar los demas registros de las tablas: asistencia, pago a trabajadores y registro de asistencia


			/* 
				CREATE TRIGGER cancelarDia BEFORE delete on registro_trabajo_realizado for EACH row 
				BEGIN
				DELETE FROM asistencia WHERE asistencia.fecha=fecha;
				DELETE FROM pago_a_trabajadores WHERE fecha=fecha;
				DELETE FROM registo_asistencia WHERE fecha=fecha;
				END;
	
			*/

			//En caso de no poderse hacer con el trigger hacer las demas consultas para eliminar aqui mismo 

			$conexion=null;
			echo json_encode($data);
		}


		public function consultarEstado(){
			$data=array();
			$conexion=new Conexion;
			$sql=$conexion->prepare("SELECT * FROM ".self::TABLA." WHERE fecha<>:fecha AND nombre_usuario=:nom");
			$sql->bindParam(":fecha",$this->fecha);
			$sql->bindParam(":nom",$this->nombre_usuario);
			if($sql->execute()){
				$num_row=$sql->rowCount();
				$data['estado']=array();
				$data['fecha']=array();
				if($num_row>0){

					$registros=$sql->fetchAll();
					$data['resultado']=$registros;

					$listaTemporal=$sql->fetchAll();

					foreach ($listaTemporal as $key => $value) {
						array_push($data['estado'], $value['estado']);
						array_push($data['fecha'], $value['fecha']);

						/*
						echo $value['estado']." " ;
						echo $value['fecha']." ";
						echo $value['id']."<br>";*/
					}
					/*
					$arr = $sql->fetchAll($conexion::FETCH_ASSOC);
					 foreach ($arr as $row) {
					     $data['estado']=$row['estado'];
					     $data['fecha']=$row['fecha'];
					   

					}*/
				}else{
					$data['estado']="empty";
				}
			}else{
				$data['resultado']="Hubo en error al ejecutar al consulta SQL";
			}

			
			$conexion=null;
			echo json_encode($data);
		}


		public function finalizarTodos(){
			$data="";
			$conexion=new Conexion;
			$sql=$conexion->prepare("UPDATE ".self::TABLA." SET estado='finalizado' WHERE fecha<>:fecha AND nombre_usuario=:nom");
			$sql->bindParam(":fecha",$this->fecha);
			$sql->bindParam(":nom",$this->nombre_usuario);
			if($sql->execute()){
				$data="Todos los dias Finalizados";
			}else{
				$data="Error al ejecutar la consulta sql";
			}
			$conexion=null;
			echo json_encode($data);
		}


		public function finalizarDia2(){
			$conexion=new Conexion;
			$sql=$conexion->prepare("UPDATE ".self::TABLA." SET estado='finalizado' WHERE id=:id");
			$sql->bindParam(":id",$this->id);
			if($sql->execute()){
				$data="Dia finalizado";
			}else{
				$data="Error al ejecutar la consulta sql";
			}

			
			$conexion=null;
			echo json_encode($data);
		}



	}


?>
