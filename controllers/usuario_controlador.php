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

 			public function comprobarNombreUsuario($username){
 				$comprobar=Usuario::ComprobarDisponibilidad($username);
 			}

 			public function setEncargado($usuario,$pass,$tipo,$id_persona,$foto){
 				$registrar=new Usuario($usuario,$pass,$tipo,$id_persona,$foto);
 				$registrar->guardar();
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

 		if($accion=="comprobar_nickname"){
 			$nombre_usuario=$_POST['nombre_usuario'];
 			$obj=new UsuarioControlador;
 			$obj->comprobarNombreUsuario($nombre_usuario);
 		}


 		if($accion=='registrar_usuario_encargado'){

 			$usuario=$_POST['usuario'];
 			$pass=$_POST['pass'];
 			$tipo="encargado";
 			$foto="../views/dist/img/images_users/manager.png";
 			$id_persona=$_POST['id_persona'];

 			$nuevo_admin=new UsuarioControlador;
 			$nuevo_admin->setEncargado($usuario,$pass,$tipo,$id_persona,$foto);

 		}

?>