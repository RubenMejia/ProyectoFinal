<?php
	require_once '../models/PagoTrabajadores.php';
	class controller_pago_trabajadores{

		public function insertar($comprobante,$cantidad_pago,$fecha,$id_trabajador,$nombre_usuario){
			$objeto = new PagoTrabajadores(null,$comprobante,$cantidad_pago,$fecha,$id_trabajador,$nombre_usuario);
			$objeto->Insert();
		}

		public function cantidad_pagos($fecha){
			$obj=new PagoTrabajadores(null,null,null,$fecha,null,null);
			$obj->cantidadPagosDia();
		}

		public function cantidadPagosByidTrabajador($id_trabajador){
			$obj=new PagoTrabajadores(null,null,null,null,$id_trabajador,null);
			$obj->getPagosByIdTrabajador();
		}

		public function TotalPagadoByidTrabajador($id_trabajador){
			$obj=new PagoTrabajadores(null,null,null,null,$id_trabajador,null);
			$obj->getTotalPagado();
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
		
		case 'consultarPagosByFecha':
			$fecha=$_POST['fecha'];
			$consulta=new controller_pago_trabajadores;
			$consulta->cantidad_pagos($fecha);
		break;

		case 'consultarPagosByIdTrabajador':
			$id_trabajador=$_POST['id_trabajador'];
			$consulta=new controller_pago_trabajadores;
			$consulta->cantidadPagosByidTrabajador($id_trabajador);
		break;

		case 'consultarTotalPagadoById':
			$id_trabajador=$_POST['id_trabajador'];
			$consulta=new controller_pago_trabajadores;
			$consulta->TotalPagadoByidTrabajador($id_trabajador);
		break;

		default:
		
		break;
	}


?>