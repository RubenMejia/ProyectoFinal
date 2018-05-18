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
		const TABLA="registro_trabajo_realizado";
		
		function __construct($id,$kilos_de_cafe,$descripcion,$fecha,$nombre_usuario,$id_trabajador,$id_terreno)
		{
			$this->id=$id;
			$this->kilos_de_cafe=$kilos_de_cafe;
			$this->descripcion=$descripcion;
			$this->fecha=$fecha;
			$this->nombre_usuario=$nombre_usuario;
			$this->id_trabajador=$id_trabajador;
			$this->id_terreno=$id_terreno;
		}

		public function empezarDia(){
			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare('INSERT INTO '.self::TABLA.' (fecha,nombre_usuario,id_terreno) VALUES (NOW(),:nombre_usuario,:id_terreno)');
			//$sql->bindParam(':fecha',$this->fecha);
			$sql->bindParam(':nombre_usuario',$this->nombre_usuario);
			$sql->bindParam(':id_terreno',$this->id_terreno);

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
	}


?>