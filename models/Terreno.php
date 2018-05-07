<?php
	require_once "Conexion.php";


	class Terreno 
	{
		private $id;
		private $nombre;
		private $username;
		const TABLA="terrenos";

		function __construct($id,$nombre,$username)
		{

			$this->id=$id;
			$this->nombre=$nombre;
			$this->username=$username;
			
		}

		public function guardar(){
			$data=array();
			$conectar=new Conexion();

			$sql=$conectar->prepare("INSERT INTO ".self::TABLA." (nombre,nombre_usuario) VALUES ( :nom,:username)");
			$sql->bindParam(':nom',$this->nombre);
			$sql->bindParam(':username',$this->username);
			if($sql->execute()){
				$this->id=$conectar->lastInsertId();
				$data['estado']="ok";
				$data['resultado']="Terreno Registrado";
			}else{
				$data['estado']="err";
				$data['resultado']="error al intentar registrar el terreno";
			}

			echo json_encode($data);
			$conectar=null;
		}

		public function BuscarTodosTerrenos(){
			$data=array();

			$conection = new Conexion();

			$stmt = $conection->prepare("SELECT * FROM ".self::TABLA." WHERE nombre_usuario=:nom");
			$stmt->bindParam(':nom',$this->username);

			if ($stmt->execute()){

				$num = $stmt->rowCount();

				if ($num > 0) {

					$registros = $stmt->fetchAll();
					$data['status'] = 'ok';
	        		$data['result'] = $registros;      			
				
				} else {
				
					$registros = 'No se encontro el nombre del personaje que buscas';;
					$data['status'] = 'err';
	        		$data['result'] = $registros;
				}

				$conection = null;
				
				echo json_encode($data);
	
			}
		}

	public function eliminar()
		{
			$data = array();
			try {
				$conection = new Conexion();
				$stmt = $conection->prepare('DELETE FROM '.self::TABLA.' WHERE id = :id ');
				$stmt->bindParam(':id', $this->id);

				if ($stmt->execute()){
					$data['status'] = 'ok';
			   		$data['result'] = "Eliminado Correctamente";      			
				}else{
					$data['status'] = 'ok';
			        $data['result'] ="No se Elimino.";
				}

				$conection=null;

				echo json_encode($data);
		
			} catch (Exception $e) {
				echo "Ha ocurrido un error: ".$e->getmessage();					
			}
	}

	public function Actualizar(){
		$array = array();

		try {
			$Conexion = new Conexion();
		
			$stmt = $Conexion->prepare("UPDATE ".self::TABLA." set nombre = :nombres WHERE id = :id"); 
				$stmt->bindParam(':id', $this->id); 
				$stmt->bindParam(':nombres', $this->nombre); 

			if ($stmt->execute()){
				$array['status'] = 'ok ';
		   		$array['result'] = "Actualizado Correctamente ";      			
			}else{
				$array['status'] = 'err';
		        $array['result'] ="No se Actualizo.";
			}

			$Conexion=null;

			echo json_encode($array);

		} catch (Exception $e) {
			echo "Ha ocurrido un error: ".$e->getmessage();
		}	
	}


	public function getCantidadTerrenos(){
		$data="0";
		$conexion=new Conexion();
		try {
			$sentencia=$conexion->prepare("SELECT COUNT(id) AS cantidad FROM ".self::TABLA."
										 WHERE nombre_usuario = :user");

			$sentencia->bindParam(":user", $this->username);
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