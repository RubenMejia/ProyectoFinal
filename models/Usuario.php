<?php

	require_once "Conexion.php";
	require_once "Persona.php";


	class Usuario extends Persona
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

		public function serPass($pass){
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




		function guardar(){

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
				$data['encargado']=$this->username;
				//$data['nombre_usuario']=$this->username;
			}else{
				$data['estado']="err";
				$data['resultado']="Error al registrar el usuario ";
				
			}

			$conectar=null;

			echo json_encode($data);
		}

		function get_usuario($nombre_usuario,$pass){

			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare("SELECT * FROM ".self::TABLA." WHERE nombre_usuario=:nom AND password=:pass");
			$sql->bindParam(':nom',$nombre_usuario);
			$sql->bindParam(':pass',$pass);
			if($sql->execute()){
				$num=$sql->rowCount();
				if($num>0){
					$registros=$sql->fetchAll();
					$data['estado']='ok';
					$data['resultado']=$registros;
				}else{
					$registros="Usuario o Contraseña incorrecto";
					$data['estado']='err';
					$data['resultado']=$registros;

				}

				$conectar=null;
				echo json_encode($data);
			}else{
				echo json_encode("Error al conectar con la base de datos");
			}
		}

		function ComprobarDisponibilidad($nombre_usuario){
			$data=array();
			$conectar=new Conexion();
			$sql=$conectar->prepare("SELECT nombre_usuario FROM ".self::TABLA." WHERE nombre_usuario=:nombre_usuario");
			$sql->bindParam(':nombre_usuario',$nombre_usuario);
			if($sql->execute()){
				$num=$sql->rowCount();
				if($num>0){
					$data['resultado']='yes';
				}else{
					$data['resultado']='not';
				}

				$conectar=null;
				echo json_encode($data);
			}else{
				echo json_encode("Error al conectar con la base de datos");
			}
		}

	}

?>