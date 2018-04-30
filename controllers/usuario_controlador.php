 <?php

 		require_once "../models/Usuario.php";
 		
 		class UsuarioControlador 
 		{
 			
 			public function setAdmin($username,$pass,$tipo,$id_persona,$foto_perfil){

 				$registrar=new Usuario($username,$pass,$tipo,$id_persona,$foto_perfil);
 				
 				$registrar->guardar();
 			}

 			public function getUsuario($username,$pass){
 				$comprobar=Usuario::get_usuario($username,$pass);
 			}


 		}

 		$accion=$_POST['accion'];

 		if($accion=='registrar_usuario'){

 			$usuario=$_POST['usuario'];
 			$pass=$_POST['pass'];
 			$tipo="administrador";
 			$foto="../views/dist/img/images_users/user.png";
 			$id_persona=$_POST['id_persona'];

 			$nuevo_admin=new UsuarioControlador;
 			$nuevo_admin->setAdmin($usuario,$pass,$tipo,$id_persona,$foto);

 		}

 		if($accion=='comprobar_ingreso'){
 			$usuario=$_POST['nombre_usuario'];
 			$pass=$_POST['pass'];
 			$obj=new UsuarioControlador;
 			$obj->getUsuario($usuario,$pass);
 		}

?>