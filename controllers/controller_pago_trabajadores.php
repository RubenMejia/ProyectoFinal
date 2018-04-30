<?php
	require_once '../models/PagoTrabajadores.php';
	class controller_pago_trabajadores{

		public function insertar($comprobante,$cantidad_pago,$fecha,$id_trabajador,$nombre_usuario){
			$objeto = new PagoTrabajadores(null,$comprobante,$cantidad_pago,$fecha,$id_trabajador,$nombre_usuario);
			$objeto->Insert();
		}
	}

	$accion = $_POST['accion'];

	switch ($accion) {
		case 'insert':
			$comprobante =$_POST['comprobante'];
			$cantidad_pago = $_POST['cantidad_pago'];
			$fecha = $_POST['fecha'];
			$id_trabajador=$_POST['id_trabajador'];
			$nombre_usuario = $_POST['nombre_usuario'];
			$objeto = new controller_pago_trabajadores;
			$objeto->insertar($comprobante,$cantidad_pago,$fecha,$id_trabajador,$nombre_usuario);
		break;
		
		default:
		
		break;
	}


?>