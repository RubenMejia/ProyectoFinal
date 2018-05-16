<?php

	require_once "Conexion.php";
	require_once "Persona.php";


	class Encargado extends Persona
	{
		private $username;
		private $pass;
		private $foto_perfil;
		private $tipo;
		private $id_persona;
		const TABLA="usuario";
		private $data=array();

		
		function __construct($username,$pass,$tipo,$id_persona,$foto_perfil)
		{
			$this->username=$username;
			$this->pass=$pass;
			$this->foto_perfil=$foto_perfil;
			$this->tipo=$tipo;
			$this->id_persona=$id_persona;
		}


		public function setUsername($user){
			$this->username=$user;

		}

		public function getUsername(){
			return $this->username;
		}

		public function setPass($pass){
			$this->pass=$pass;
		}

		public function getPass(){
			return $this->pass;
		}

		public function setFoto($foto){
			$this->foto_perfil=$foto;
		}

		public function getFoto(){
			return $this->foto_perfil;
		}

		public function setTipo($tipo){
			$this->tipo=$tipo;
		}

		public function getTipo(){
			return $this->tipo;
		}

		public function setIdPersona($id){
			$this->id_persona=$id;
		}

		public function getIdPersona(){
			return $this->id_persona;
		}




		function Insert(){

			$conectar=new Conexion();
			$sql=$conectar->prepare("INSERT INTO ".self::TABLA." (nombre_usuario,password,foto_perfil,tipo_usuario,id_persona) VALUES (:user,:pass,:foto,:tipo,:id_persona)");

			$sql->bindParam(":user",$this->username);
			$sql->bindParam(":pass",$this->pass);
			$sql->bindParam(":foto",$this->foto_perfil);
			$sql->bindParam(":tipo",$this->tipo);
			$sql->bindParam(":id_persona",$this->id_persona);

			if($sql->execute()){
				$data['estado']="ok";
				$data['resultado']="Usuario agregado";
				//$data['nombre_usuario']=$this->username;
			}else{
				$data['estado']="err";
				$data['resultado']="Error al registrar el usuario ";
				
			}

			$conectar=null;

			echo json_encode($data);
		}


		function getCantidad(){
			$conectar=new Conexion();
			$sql=$conectar->prepare("SELECT COUNT(id) AS cantidad from ".self::TABLA." WHERE tipo_usuario='encargado'");

			$num_row=$sql->rowCount();
			if($num_row>0){
				while ($row=$sql->fetch($conectar::FETCH_ASSOC)) {
					$data['result']=$row['cantidad'];
				}
			}else{
				$data['result']="0";
			}

			$conectar=null;
			json_encode($data);

		}
	}

?>