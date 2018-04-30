$(document).ready(iniciar);

function iniciar(){
	var nombre_usuario;
	var pass;
	var nombre_terreno;
	$('#registrarse').on('click',registrarse);
	$('#entrar').on('click',entrar);
}



//funcion para Registrar Usuario
function registrarse(){
	var nombres=$('#inputNombre').val();
	var apellidos=$('#inputApellidos').val();
	nombre_usuario=$('#inputUsuario').val();
	pass=$('#inputPass').val();
	var telefono=$('#inputTelefono').val();
	nombre_terreno=$('#inputTerreno').val();

	var datos={'accion':'registrar_usuario',
	'nombres':nombres,
	'apellidos':apellidos,
	'telefono':telefono};

	$.ajax({
		type:'POST',
		url:"controllers/persona_controlador.php",
		dataType:'json',
		data:datos,
		success:function(data){
			if(data.estado=="ok"){
				alert("persona registrada!");
				var id_persona=data.id;
				datos ={'accion':'registrar_usuario','usuario':nombre_usuario,'pass':pass,'id_persona':id_persona};

				$.ajax({
					type:'POST',
					url:"controllers/usuario_controlador.php",
					dataType:'json',
					data:datos,
					success:function(data){
						if(data.estado=="ok"){
							alert("usuario Registrado");

							datos={'accion':'registrar_terreno','usuario':nombre_usuario,'terreno':nombre_terreno};

							$.ajax({
								type:'POST',
								url:"controllers/terreno_controlador.php",
								dataType:'json',
								data:datos,
								success:function(data){
									if(data.estado=="ok"){
										alert("Terreno registrado");
									}else if(data.estado=="err"){
										alert(data.resultado);
									}
								}
							})

						}else if(data.estado=="err"){
							alert("Error a regitrar persona");
						}
					}
				})
			}else if(data.estado=="err"){
				alert("Error al registrar persona ");
			}
		}
	})

}
//Funcion para El Iingreso
function entrar(e){
	e.preventDefault();
	nombre_usuario=$('#exampleInputEmail1').val();
	pass=$('#exampleInputPassword1').val();

	var datos={'accion':'comprobar_ingreso','nombre_usuario':nombre_usuario,'pass':pass};

	$.ajax({
		type:'POST',
		url:"controllers/usuario_controlador.php",
		dataType:'json',
		data:datos,
		success:function(data){
			
			if(data.estado=="ok"){
				localStorage['usuario']=data.resultado["0"].nombre_usuario;
				localStorage['pass']=data.resultado["0"].password;
				localStorage['tipo_usuario']=data.resultado["0"].tipo_usuario;
				localStorage['id_persona']=data.resultado["0"].id_persona;
				localStorage['foto_perfil']=data.resultado["0"].foto_perfil;

				//alert(data.resultado["0"].tipo_usuario);
				//alert(localStorage['usuario']);

				location.href ="views/template.php";
			}else if(data.estado=="err"){
				alert(data.resultado);

			}
		}
	})
}




