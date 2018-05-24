<?php
	require_once 'Conexion.php';

	
	class Persona 
	{
		private $id;
		private $nombres;
		private $apellidos;
		private $telefono;
		private $nombre_empresa;
		const TABLA="persona";

		function __construct($nombres,$apellidos,$telefono,$nombre_empresa=null,$id)
		{
			$this->id=$id;
			$this->nombres=$nombres;
			$this->apellidos=$apellidos;
			$this->telefono=$telefono;
			$this->nombre_empresa=$nombre_empresa;
		}

		//Getter y Setters

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setNombres($nombres){
			$this->nombres=$nombres;
		}

		public function getNombres(){
			return $this->nombres;
		}

		public function setApellidos($apellidos){
			$this->apellidos=$apellidos;
		}

		public function getApellidos(){
			return $this->apellidos;
		}

		public function setTelefono($telefono){
			$this->telefono=$telefono;
		}

		public function getTelefono(){
			return $this->telefono;
		}

		public function setNombreEmpresa($nom){
			$this->nombre_empresa=$nom;

		}

		public function getNombreEmpresa(){
			return $this->nombre_empresa;
		}



		#metodos de la clase

		public function guardar(){
			$data=array();
			$conectar=new Conexion();
			
			$sql=$conectar->prepare("INSERT INTO ".self::TABLA." (nombres,apellidos,telefono) VALUES (:nom,:ape,:tel)");

			$sql->bindParam(':nom',$this->nombres);
			$sql->bindParam(":ape",$this->apellidos);
			$sql->bindParam(":tel",$this->telefono);

			if($sql->execute()){
				$this->id=$conectar->lastInsertId();
				$data['estado']="ok";
				$data['resultado']="Persona Registrada";
				$data['id']=$this->id;
			}else{
				$data['estado']="err";
				$data['resultado']="No se puedo registrar Persona ";
			}

			echo json_encode($data);
			$conectar=null;

			

		}

		public function guardarPersonaEncargado(){
			$data=array();
			$conectar=new Conexion();
			
			$sql=$conectar->prepare("INSERT INTO ".self::TABLA." (nombres,apellidos,telefono,id) VALUES (:nom,:ape,:tel,:id)");

			$sql->bindParam(':nom',$this->nombres);
			$sql->bindParam(":ape",$this->apellidos);
			$sql->bindParam(":tel",$this->telefono);
			$sql->bindParam(":id",$this->id);

			if($sql->execute()){
				$this->id=$conectar->lastInsertId();
				$data['estado']="ok";
				$data['resultado']="Persona Registrada";
				$data['id']=$this->id;
			}else{
				$data['estado']="err";
				$data['resultado']="No se puedo registrar Persona ";
			}

			echo json_encode($data);
			$conectar=null;

		}





	}
?>