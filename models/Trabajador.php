<?php 
require_once 'Conexion.php';
class Trabajador{

	private $id;	
	private $nombres;	
	private $apellidos;	
	private $telefono;	
	private $nombre_usuario;	
	private $id_cargo;
	private $tipo;

	const TABLA = "trabajador";

	// contructor
	function __construct($id, $nombres, $apellidos, $telefono, $nombre_usuario, $id_cargo, $tipo){
		
		$this->id =$id;	
		$this->nombres =$nombres;	
		$this->apellidos = $apellidos;	
		$this->telefono =$telefono;	
		$this->nombre_usuario = $nombre_usuario;	
		$this->id_cargo = $id_cargo;
		$this->tipo=$tipo;
	}

	//Insertar trabajador
	public function insert(){
			$array = array();

			try {
				$Conexion = new Conexion();

				$stmt = $Conexion->prepare('INSERT INTO '.self::TABLA.'(nombres, apellidos, telefono, nombre_usuario, id_cargo,tipo_trabajador) VALUES(:nombres, :apellidos, :telefono, :nombre_usuario, :id_cargo,:tipo)');
				$stmt->bindParam(':nombres' ,$this->nombres); 
				$stmt->bindParam(':apellidos',$this->apellidos);
				$stmt->bindParam(':telefono',$this->telefono); 
				$stmt->bindParam(':nombre_usuario',$this->nombre_usuario); 
				$stmt->bindParam(':id_cargo',$this->id_cargo);
				$stmt->bindParam(':tipo',$this->tipo); 

				if ($stmt->execute()){
					$this->id = $Conexion->lastInsertId();
					$array['status']="ok";
					$array['result']="Insertado Correctamente";
				}else{
					$array['status']="err";
					$array['result']="No Se Ha Insertado";
				}

				$Conexion=null;

				echo json_encode($array);

			} catch (Exception $e) {

				echo "Ha ocurrido un error: ".$e->getmessage();				
			
			}
		}

	//Buscar Por nombre de trabajador
	public function searchByName(){
		try {
			$array = array();
			$Conexion = new Conexion();
			
			$stmt = $Conexion->prepare('SELECT * FROM '.self::TABLA.' WHERE nombre_usuario=:nombre_usuario AND nombres LIKE "%" :nombres "%" ');
			
			$stmt->bindParam(':nombre_usuario', $this->nombre_usuario);
			$stmt->bindParam(':nombres',$this->nombres);
				
				if($stmt->execute()) {

					$num = $stmt->rowCount();

					if ($num > 0) {
						$registros = $stmt->fetchAll();
						$array['status'] = 'ok';
		        		$array['result'] = $registros;      			
					} else {
					
						$registros = 'No se encontro el trabajador que buscabas';
						$array['status'] = 'err';//pone un estado
		        		$array['result'] = $registros;//pone un resulatado  es decir un regristro
					
					}

					$conectar = null;// limpia la conexion 
					
					echo json_encode($array);//codificar un json->convertir el array en json
				} else {
					echo 'Error en consulta a db';
				}	
			
		} catch (Exception $e) {
			echo "Ha ocurrido un error: ".$e->getmessage();				
		}
	}

	//Eliminar trabajador
	public function Delete($id){
		$array = array();
		try {
			$Conexion = new Conexion();
			$stmt = $Conexion->prepare('DELETE FROM '.self::TABLA.' WHERE id = :id ');
			$stmt->bindParam(':id', $id);

			if ($stmt->execute()){
				$array['status'] = 'ok';
		   		$array['result'] = "Eliminado Correctamente";      			
			}else{
				$array['status'] = 'ok';
		        $array['result'] ="No se Elimino.";
			}

			$Conexion=null;

			echo json_encode($array);
	
		} catch (Exception $e) {
			echo "Ha ocurrido un error: ".$e->getmessage();				
			
		}
	}

	//Actualizar trabajador
	public function Update(){
		$array = array();

		try {
			$Conexion = new Conexion();
		
			$stmt = $Conexion->prepare('UPDATE '.self::TABLA.' SET nombres=:nombres, apellidos=:apellidos, telefono=:telefono, nombre_usuario=:nombre_usuario, id_cargo=:id_cargo WHERE id = :id ');
				$stmt->bindParam(':nombres' ,$this->nombres); 
				$stmt->bindParam(':apellidos',$this->apellidos);
				$stmt->bindParam(':telefono',$this->telefono); 
				$stmt->bindParam(':nombre_usuario',$this->nombre_usuario); 
				$stmt->bindParam(':id_cargo',$this->id_cargo);
				$stmt->bindParam(':id',$this->id); 

			if ($stmt->execute()){
				$array['status'] = 'ok';
		   		$array['result'] = "Actualizado Correctamente";      			
			}else{
				$array['status'] = 'ok';
		        $array['result'] ="No se Actualizo.";
			}

			$Conexion=null;

			echo json_encode($array);

		} catch (Exception $e) {
			echo "Ha ocurrido un error: ".$e->getmessage();
		}	
	}

	public function getTrabajadores($user){
		$array=array();
		$conexion=new Conexion();
		$sql=$conexion->prepare('SELECT * FROM '.self::TABLA." WHERE nombre_usuario=:nom");
		$sql->bindParam(':nom',$user);
		$sql->execute();
		$num=$sql->rowCount();
		if($num>0){
			$registros=$sql->fetchAll();
			$array['estado']="ok";
			$array['resultado']=$registros;
		}else{
			$registros="No Hay trabajadores registrados aun";
			$array['estado']="err";
			$array['resultado']=$registros;
		}

		$conexion=null;
		echo json_encode($array);
	}

	public function getCantidadTrabajadores($user){
		$data="0";
		$tipo="trabajador";
		$conexion=new Conexion();
		try {
			$sentencia=$conexion->prepare("SELECT COUNT(id) AS cantidad FROM ".self::TABLA."
										 WHERE nombre_usuario = :user && tipo_trabajador = :tipo");
			$sentencia->bindParam(":user", $user);
			$sentencia->bindParam(":tipo", $tipo);
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
			$data="Por favor verifique que no hallan problemas de conectividad".$e-> getMessage(); 
		}

		$conexion=null;
		echo json_encode($data);
	}


	public function getCantidadEncargtadosT($user){
		$data="0";
		$tipo="encargado";
		$conexion=new Conexion();
		try {
			$sentencia=$conexion->prepare("SELECT COUNT(id) AS cantidad FROM ".self::TABLA."
										 WHERE nombre_usuario = :user && tipo_trabajador = :tipo");
			$sentencia->bindParam(":user", $user);
			$sentencia->bindParam(":tipo", $tipo);
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
			$data="Por favor verifique que no hallan problemas de conectividad".$e-> getMessage(); 
		}

		$conexion=null;
		echo json_encode($data);
	}


	public function getCargoTrabajador(){
		$data=array();
		$conexion=new Conexion();
		//Convertir caracteres en utf-8 (se puede llegar a implementar en la construccion de la conexion)
		//o usarlo de esta manera:
		$conexion->exec("SET CHARACTER SET utf8"); 
		try {
			$sql=$conexion->prepare("SELECT tipo FROM cargo INNER JOIN trabajador ON cargo.id=id_cargo WHERE trabajador.id=:id");
			$sql->bindParam(':id',$this->id);

			$sql->execute();
			$num_row=$sql->rowCount();

			if($num_row>0){
				while ($row=$sql->fetch($conexion::FETCH_ASSOC)) {
					$data['resultado']=$row['tipo'];

				}
				
				$data['estado']="ok";
			}else{
				$data['estado']="err";
				$data['resultado']="El Trabajador no tiene ningun cargo asginado aun";
			}


		} catch (Exception $e) {
			$data['estado']="err";
			$data['resultado']="Hubo un error al ejecutar la peticion con la base de datos:".$e->getMessage();
		}

		$conexion=null;

	
		echo json_encode($data);
	}		

}
?>