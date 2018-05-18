<?php  
	require_once "Conexion.php";
	
	class Administrador_encargado {
		
		private $id_usuario;
		private $id_encargado;

		const TABLA = "administrador_encargados"; 

		function __construct($id_usuario,$id_encargado){
			$this->id_usuario = $id_usuario;
			$this->id_encargado = $id_encargado;
		}

		function Insert(){
			$conectar = new Conexion();
			
			$stmt=$conectar->prepare("INSERT INTO ".self::TABLA."(id_usuario , id_encargado) VALUES(:id_usuario,:id_encargado)");
			echo "$this->id_usuario, $this->id_encargado";
			$stmt->bindParam(':id_usuario', $this->id_usuario);
			$stmt->bindParam(':id_encargado', $this->id_encargado);

			if($stmt->execute()){
				$data['estado']="ok";
				$data['resultado']="Dato Insertado";
				//$data['nombre_usuario']=$this->username;

			}else{
				$data['estado']="err";
				$data['resultado']="Error al registrar el usuario ";
				
			}
			$conectar=null;

			echo json_encode($data);
		}
	}
?>