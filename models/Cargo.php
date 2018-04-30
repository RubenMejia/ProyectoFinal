<?php

	require_once 'Conexion.php';

	class Cargo 
	{
		private $id;
		private $tipo;
		const TABLA="cargo";

		
		function __construct($tipo,$id=null)
		{
			$this->tipo=$tipo;
			$this->id=$id;
		}


		//Getter and setters 

		function getId(){
			return $this->id;
		}

		function setId($id){
			$this->id=$id;
		}


		function getTipo(){
			return $this->tipo;
		}


		function setTipo($tipo){
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
					echo json_encode("Error al conectar con la base de datos");
				}
				

			
		}

	}


?>