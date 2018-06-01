<?php

	require_once 'Conexion.php';

	class Cargo 
	{
		private $id;
		private $tipo;
		
		const TABLA="cargo";


		function __construct($id,$tipo){
			$this->id=$id;
			$this->tipo=$tipo;
		}

		//Metodos

		function getRegistros(){

			 	$data=array();


				$conectar=new Conexion();

			
				$sql=$conectar->prepare("SELECT * FROM ".self::TABLA);
				if($sql->execute()){
					$num=$sql->rowCount();
					if($num>0){
							$registros=$sql->fetchAll();

							foreach ($registros as $key => $value) {
								$registros[$key]=array_map('utf8_encode', $registros[$key]);
							}

							$data['estado']='ok';
							$data['resultado']=$registros;
					}else{
						$registros="No se encontro informacion acerca de los cargos de trabajadores";
						$data['estado']='err';
						$data['resultado']=$registros;
					}
					$conectar=null;
					echo json_encode($data);
				}else{
					$conectar=null;
					echo json_encode("Error al conectar con la BD");
				}
				
		}

		function getRegistros2(){

			 	$data=array();


				$conectar=new Conexion();

			
				$sql=$conectar->prepare("SELECT * FROM ".self::TABLA);
				if($sql->execute()){
					$num=$sql->rowCount();
					if($num>0){
							$registros=$sql->fetchAll();

							

							$data['estado']='ok';
							$data['resultado']=$registros;
					}else{
						$registros="No se encontro informacion acerca de los cargos de trabajadores";
						$data['estado']='err';
						$data['resultado']=$registros;
					}
					$conectar=null;
					echo json_encode($data);
				}else{
					$conectar=null;
					echo json_encode("Error al conectar con la BD");
				}
				
		}
		

		function buscarCargoId(){
			 	$data=array();


				$conectar=new Conexion();

			
				$sql=$conectar->prepare("SELECT * FROM ".self::TABLA." WHERE id=:id");
				$sql->bindParam(':id',$this->id);
				
				if($sql->execute()){
					$num=$sql->rowCount();
					if($num>0){
							$registros=$sql->fetchAll();

							foreach ($registros as $key => $value) {
								$registros[$key]=array_map('utf8_encode', $registros[$key]);
							}

							$data['estado']='ok';
							$data['resultado']=$registros;
					}else{
						$registros="No se encontro informacion acerca de los cargos de trabajadores";
						$data['estado']='err';
						$data['resultado']=$registros;
					}
					$conectar=null;
					echo json_encode($data);
				}else{
					$conectar=null;
					echo json_encode("Error al conectar con la BD");
				}

			

			
		}

		public function setCargo(){
			$conectar=new Conexion;
			$sql=$conectar->prepare("INSERT INTO ".self::TABLA." (tipo) VALUES (:nom)");
			$sql->bindParam(":nom",$this->tipo);
			if($sql->execute()){
				$this->id=$conectar->lastInsertId();
				$data="Cargo Registrado Correctamente";
			}else{
				$data="Error al registrar cargo";
			}
			$conectar=null;
			echo json_encode($data);

		}

		public function editCargo(){

		}


		public function borrarCargo(){
			$conectar=new Conexion;
			$sql=$conectar->prepare("DELETE FROM ".self::TABLA." WHERE id=:id");
			$sql->bindParam(":id",$this->id);
			if($sql->execute()){

				$data="Cargo Eliminado Correctamente";
			}else{
				$data="Error al Eliminar cargo";
			}
			$conectar=null;
			echo json_encode($data);
		}


		public function updateCargo(){
			$conectar=new Conexion;
			$sql=$conectar->prepare("UPDATE ".self::TABLA." SET tipo=:tipo WHERE id=:id");
			$sql->bindParam(":tipo",$this->tipo);
			$sql->bindParam(":id",$this->id);

			if($sql->execute()){

				$data="Cargo Actualizado Correctamente";
			}else{
				$data="Error al Actualizar cargo";
			}
			$conectar=null;
			echo json_encode($data);

		}

		public function deleteCargo(){
			$conectar=new Conexion;
			$sql=$conectar->prepare("DELETE FROM ".self::TABLA." WHERE id=:id");
			$sql->bindParam(":id",$this->id);

			if($sql->execute()){

				$data="Cargo Eliminado Correctamente";
			}else{
				$data="Error al Eliminar cargo";
			}
			$conectar=null;
			echo json_encode($data);

		}





	}


?>

