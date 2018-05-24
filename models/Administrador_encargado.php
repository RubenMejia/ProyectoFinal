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
				$data['resultado']="Usando Encargado!";
				$data['encargado']=$this->id_encargado;

			}else{
				$data['estado']="err";
				$data['resultado']="Error al registrar el usuario ";
				
			}
			$conectar=null;

			echo json_encode($data);
		}


		public function cantidad(){
			$data="0";
			$conexion=new Conexion();
			try {
				$sentencia=$conexion->prepare("SELECT COUNT(id) AS cantidad FROM ".self::TABLA."
											 WHERE id_usuario = :user");

				$sentencia->bindParam(":user", $this->id_usuario);
				$sentencia->execute();
				$num=$sentencia->rowCount();
				if($num>0){
					while($row=$sentencia->fetch($conexion::FETCH_ASSOC)){
						$data=$row['cantidad'];
					}
				}else{
					$data="0";
				}
			} catch (Exception $e) {
				$data="Por favor verifique que no hallan problemas de conectividad".$e->getMessage(); 
			}

			$conexion=null;
			echo json_encode($data);
		}
	}
?>