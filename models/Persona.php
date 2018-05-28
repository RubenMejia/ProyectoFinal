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

		public function getPersona($usuario)
		{
			$data = array();

			$conectar=new Conexion();

			$sentencia=$conectar->prepare("SELECT * FROM ".self::TABLA." WHERE id = :id");
			$sentencia->bindParam(":id", $usuario);

			if($sentencia->execute()){				
				$num=$sentencia->rowCount();

				if($num > 0){
					$registros=$sentencia->fetchAll();

					foreach ($registros as $key => $value) {
						$registros[$key]=array_map('utf8_encode', $registros[$key]);
					}

					$data['status']='ok';
					$data['result']=$registros;
				}else{
					$data['status']='err';
					$data['result']='No se encontraron datos';
				}	

				$conectar=null;
				echo json_encode($data);			
			}else{
				$conectar=null;
				echo json_encode("Error al conectar con la BD");
			}
		}

		public function actualizarPersona($user)
		{
			$data = array();

			$conectar = new Conexion();

			$sentencia=$conectar->prepare("UPDATE ".self::TABLA." SET nombres = :nom, apellidos = :apel, telefono = :tel, nombre_empresa = :nom_empre WHERE id = :id_persona");

			$sentencia->bindParam(":nom", $this->nombres);
			$sentencia->bindParam(":apel", $this->apellidos);
			$sentencia->bindParam(":tel", $this->telefono);
			$sentencia->bindParam(":nom_empre", $this->nombre_empresa);
			$sentencia->bindParam(":id_persona", $user);

			if ($sentencia->execute()){
					$data['status']='ok';
					$data['result']='La persona se a actualizado correctamente';								
			}else{
				$data['status']='err';
				$data['result']='no hemos podido actualizar la persona';
			}	

			$conectar=null;
			echo json_encode($data);				
		}


	}
?>