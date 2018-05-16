<?php

	require_once 'Conexion.php';

	class Cargo 
	{
		private $id;
		private $tipo;
		
		const TABLA="cargo";


		function __construct($id,$tipo){
			$this->id=$id;
			$this->cargo=$tipo;
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



	}


?>

