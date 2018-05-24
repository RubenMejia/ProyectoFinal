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
		const TABLA2="administrador_encargados";

		private $data=array();

		
		function __construct($username, $pass, $foto_perfil, $tipo, $id_persona)
		{
			$this->username=$username;
			$this->pass=$pass;
			$this->foto_perfil=$foto_perfil;
			$this->tipo=$tipo;
			$this->id_persona=$id_persona;
		}


		public function getUsername($user){
			$this->username=$user;

		}

		public function setUsername(){
			return $this->username;
		}

		public function getPass($pass){
			$this->pass=$pass;
		}

		public function setPass(){
			return $this->pass;
		}

		public function getFoto($foto){
			$this->foto_perfil=$foto;
		}

		public function setFoto(){
			return $this->foto_perfil;
		}

		public function getTipo($tipo){
			$this->tipo=$tipo;
		}

		public function setTipo(){
			return $this->tipo;
		}

		public function getIdPersona($id){
			$this->id_persona=$id;
		}

		public function setIdPersona(){
			return $this->id_persona;
		}




		function Insert(){
			$conectar = new Conexion();
			
			$stmt=$conectar->prepare("INSERT INTO ".self::TABLA."(nombre_usuario, password, foto_perfil, tipo_usuario, id_persona) VALUES(:user, :pass, :foto, :tipo, :id_persona)");

			$stmt->bindParam(':user', $this->username);
			$stmt->bindParam(':pass', $this->pass);
			$stmt->bindParam(':foto', $this->foto_perfil);
			$stmt->bindParam(':tipo', $this->tipo);
			$stmt->bindParam(':id_persona',$this->id_persona);

			if($stmt->execute()){
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

			$data =  array();
			$conectar=new Conexion();

			$stmt = $conectar->prepare("SELECT COUNT(nombre_usuario) AS cantidad from ".self::TABLA." WHERE tipo_usuario = 'encargado'");
			
			if ($stmt->execute()) {
				
				$num_row  =$stmt->rowCount();

				if($num_row>0){

						$data['result'] = $stmt->fetch();

				}else{

					$data['result']="0";

				}

			}

			$conectar=null;

			echo json_encode($data);

		}
		function getEncargados(){
			$data =  array();
			$conectar=new Conexion();
			$stmt = $conectar->prepare("SELECT Usuario.* from ".self::TABLA." INNER JOIN ".self::TABLA2." on ".self::TABLA2.".id_encargado = ".self::TABLA.".nombre_usuario WHERE ".self::TABLA2.".id_usuario = :nombre_usuario");
			$stmt->bindParam(':nombre_usuario',$this->username);
			
			if ($stmt->execute()) {
				$num_row = $stmt->rowCount();
				if($num_row>0){
						$data['status'] = "ok";
						$data['result'] = $stmt->fetchall();
				}else{
					$data['status'] = "err";
					$data['result']="0";
				}
			}

			$conectar=null;

			echo json_encode($data);
		}

		function Delete(){
			$data =  array();
			$conectar=new Conexion();
			$stmt = $conectar->prepare("DELETE FROM ".self::TABLA." WHERE nombre_usuario = :nombre_usuario");
			$stmt->bindParam(':nombre_usuario',$this->username);
			if ($stmt->execute()) {
				$data['result'] = "Eliminidaco correctamente";
			}else{
				$data['result']="No se Elmino el encargado";
			}
			$conectar=null;
			echo json_encode($data);
		}

		public function getAll(){
			$Conexion=new Conexion;

			$sql=$Conexion->prepare("SELECT ".self::TABLA.".*,persona.* FROM ".self::TABLA." INNER JOIN persona on persona.id=usuario.id_persona WHERE tipo_usuario='encargado'");
			if($sql->execute()){
				$num_row=$sql->rowCount();

				if($num_row>0){
					$resultado=$sql->fetchAll();
					$data['resultado']=$resultado;
					$data['estado']="ok";
				}else{
					$data['resultado']="No hay";
					$data['estado']="No";
				}
			}else{
				$data['resultado']="No se puedo ejecutar la consulta SQL";
				$data['estado']="err";
			}

			echo json_encode($data);
			$Conexion=null;

		}
	}

?>