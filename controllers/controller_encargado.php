 <?php
 		require_once "../models/Encargado.php";
 		
 		class controller_encargado {	
 			public function GetCantidad($nombre_usuario){
 				$obj = new Encargado($nombre_usuario,null,null,null,null);
 				$obj->getCantidad();
 			}
 			
 			public function insertar($username, $pass, $foto_perfil, $tipo, $id_persona){
 				$obj = new Encargado($username, $pass, $foto_perfil, $tipo, $id_persona);
 				$obj->Insert();
 			}
 			
 			public function GetEncargados($username){
 				$obj = new Encargado($username,null,null,null,null);
 				$obj->getEncargados();
 			}
 			
 			public function DeleteE($nombre_usuario){
 				$obj = new Encargado($nombre_usuario,null,null,null,null);
 				$obj->Delete();
 			}

 			public function UpdateE($username, $pass, $foto_perfil, $tipo, $id_persona){
 				$obj = new Encargado($username, $pass, $foto_perfil, $tipo, $id_persona);
 				$obj->Update();
 			}
 		}

 		$accion=$_POST['accion'];

 		switch ($accion) { 			
 			case 'buscar_cantidad': 
 				$nombre_usuario= $_POST['nombre_usuario'];
 				$obj = new controller_encargado;
 				$obj->GetCantidad($nombre_usuario);
 			break;

 			case 'insertar': 
 				$username = $_POST['nombre_usuario'];
		 		$pass = $_POST['password'];
		 		$foto_perfil = $_POST['foto_perfil'];
		 		$tipo = $_POST['tipo'];
		 		$id_persona = $_POST['id_persona'];
 				$obj = new controller_encargado;
 				$obj->insertar($username, $pass, $foto_perfil, $tipo, $id_persona);
 			break;

 			case 'buscar': 
 				$nombre_usuario=$_POST['nombre_usuario'];
 				$obj = new controller_encargado;
 				$obj->GetEncargados($nombre_usuario);
 			break;		
 			case 'eliminar': 
 				$nombre_usuario=$_POST['nombre_usuario'];
 				$obj = new controller_encargado;
 				$obj->DeleteE($nombre_usuario);
 			break;
 	 	}
?>