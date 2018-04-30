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
				  $data['result'] = "Datos Ingresados Con Exito";
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
	}

?>