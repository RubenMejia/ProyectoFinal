<?php
	require_once 'Conexion.php';
	class PagoTrabajadores{
		private $id;
		private $comprobante;
		private $cantidad_pago;
		private $fecha;
		private $id_trabajador;		
		private $nombre_usuario;		
		
		const TABLA = "pago_a_trabajadores";
		//private $nombre_terreno; (?)

		function __construct($id,$comprobante,$cantidad_pago,$fecha,$id_trabajador,$nombre_usuario){
			$this->id =$id ;	
			$this->comprobante=$comprobante;
			$this->cantidad_pago=$cantidad_pago;
			$this->fecha=$fecha;
			$this->id_trabajador=$id_trabajador;	
			$this->nombre_usuario=$nombre_usuario;
		}

		function Insert(){
			try{
				$data = array();
				$conexion = new Conexion;
				$stmt = $conexion->prepare("INSERT INTO ".self::TABLA."(comprobante,cantidad_pago,fecha,id_trabajador,nombre_usuario) VALUES (:comprobante,:cantidad_pago,:fecha,:id_trabajador,:nombre_usuario)");
					$stmt->bindParam(':comprobante',$this->comprobante);
					$stmt->bindParam(':cantidad_pago',$this->cantidad_pago);
					$stmt->bindParam(':fecha',$this->fecha);
					$stmt->bindParam(':id_trabajador',$this->id_trabajador);	
					$stmt->bindParam(':nombre_usuario',$this->nombre_usuario);
				
				if ($stmt->execute()){
				  $this->id=$conexion->lastInsertId();
				  $data['status'] = "ok";
				  $data['result'] = "Pago Realizado Con Exito";

				  
				}else{
			   	  $data['status'] = "err";
				  $data['result'] = "Error en la consulta, por favor revisa los datos";
				}
				$conexion = null;
				echo json_encode($data);
			} catch (Exception $e) {
				die("Error Fatal: ".$e->getmessage());
			}
		}

		function cantidadPagosDia(){
			$data="0"; 
			$conexion=new Conexion;
			$sql=$conexion->prepare("SELECT COUNT(id) AS cantidad FROM pago_a_trabajadores where fecha=:fecha");
			$sql->bindParam(':fecha',$this->fecha);

			if($sql->execute()){
				$num=$sql->rowCount();
				if($num>0){
					while($row=$sql->fetch($conexion::FETCH_ASSOC))
					{
						$data=$row['cantidad'];
					}
				}else{
					$data="0";
				}

			}

			$conexion=null;
			echo json_encode($data);
		}

		public function getTotalPagado(){
			$data=array();
			$conectar=new Conexion;

			$sql=$conectar->prepare('SELECT SUM(cantidad_pago) FROM '.self::TABLA.' WHERE id_trabajador=:id_trabajador');
			$sql->bindParam(':id_trabajador',$this->id_trabajador);

			if($sql->execute()){
				$num_row=$sql->rowCount();
				if($num_row>0){
					while ($row=$sql->fetch($conectar::FETCH_ASSOC)) {
						$data['resultado']=$row['SUM(cantidad_pago)'];
					}
					$data['estado']="ok";
					if($data['resultado']==null){
						$data['resultado']="0";
					}
				}else{
					$data['estado']="err";
					$data['resultado']="0";
				}
			}else{
				$data['estado']="err_sql";
				$data['resultado']="Hubo un error al intentar buscar la cnatidad todal pagado al trabajador";
			}
			$conexion=null;
			echo json_encode($data);
		}

		public function getPagosByIdTrabajador(){
			$data=array();
			$conectar=new Conexion;

			$sql=$conectar->prepare("SELECT * FROM ".self::TABLA." WHERE id_trabajador=:id_trabajador");
			$sql->bindParam(':id_trabajador',$this->id_trabajador);

			if($sql->execute()){
				$num_row=$sql->rowCount();

				if($num_row>0){
					$registros=$sql->fetchAll();
					$data['estado']="ok";
					$data['resultado']=$registros;
				}else{
					$data['estado']="err";
					$data['resultado']="No se ha realizado ningun pago hasta el momento a este trabajador";
				}
			}else{
				$data['estado']="err";
				$data['resultado']="Hubo un error al intentar buscar la cantidad de pagos realizaod al trabajador";
			}
			$conexion=null;
			echo json_encode($data);

		}

	}

?>