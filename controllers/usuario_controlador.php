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

 			public function actualizar_usuario($usuario){
 				$objeto=new Usuario($usuario,null,null,null,null);	
 				$objeto->update_usuario();		
 			}

 			public function editar_usuario_foto($username, $password, $archivo_foto){

 				date_default_timezone_set('America/Bogota');

				$nombre_archivo = basename(date("d-m-Y h_i_s_a")." ".$archivo_foto['foto_usuario']['name']); 	// Crear el nombre del archivo con la hora del sistema
				$nombre_archivo = strtolower($nombre_archivo);											// Poner todos los carracteres en minuscula
				$nombre_archivo = str_replace(" ", "_", $nombre_archivo);								// Reemplazar los espacios en blanco por _
				$directorio = "../views/files/".$nombre_archivo;											// Crear la ruta con el nombre con el que se guardara el archivo

				if (($archivo_foto['foto_usuario']['type']=="image/png") || ($archivo_foto['foto_usuario']['type']=="image/jpeg")) {
					
					if(move_uploaded_file($archivo_foto['foto_usuario']['tmp_name'], $directorio)) { 
						// Instrucciones para guardar en la base de datos
						Usuario::GuardarDatosFotoPerfil($username, $password, $nombre_archivo);
					} else{
						echo "Error#&#SubiendoFoto#&#IntentarNuevamente";
					}

				}else{
					echo "Error#&#Formato#&#SubirOtroArchivo";
				}

 			}
 			public function eliminar_cuenta($usuario, $contra, $id_persona){
 				$objeto= new Usuario($usuario, $contra,null,$id_persona,null);
 				$objeto->delete_user();
 			}
 		}

 		$accion=$_POST['accion'];

 		if($accion=='registrar_usuario'){

 			$usuario=$_POST['usuario'];
 			$pass=$_POST['pass'];
 			$tipo="administrador";
 			$foto="user.png";
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
 			$foto="manager.png";
 			$id_persona=$_POST['id_persona'];

 			$nuevo_admin=new UsuarioControlador;
 			$nuevo_admin->setEncargado($usuario,$pass,$tipo,$id_persona,$foto);

 		}

 		if($accion=='actualizar_datos_cuenta'){
 			$usuario=$_POST['usuario'];
 			$objeto=new UsuarioControlador();
 			$objeto->actualizar_usuario($usuario);
 		}

 		if($accion=='editar_perfil_foto'){
 			$objeto=new UsuarioControlador();

 			if ($_POST["campo_password"] == $_POST["campo_confirm_password"]) {
 				$objeto->editar_usuario_foto($_POST["campo_username"], $_POST["campo_password"], $_FILES);	
 			}else{
 				echo "CONTRASEÑAS NO COINCIDEN";
 			}
 		}

 		if($accion=='eliminar_cuenta'){
 			$usuario=$_POST['usuario'];
 			$contra=$_POST['contrasena'];
 			$id_persona=$_POST['id_usuario'];
 			$objeto= new UsuarioControlador();
 			$objeto->eliminar_cuenta($usuario, $contra, $id_persona);
 		}


?>