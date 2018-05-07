$(document).ready(iniciar);


function iniciar(){
	var nombre_usuario;
	var pass;
	var nombre_terreno;
	$('#registrarse').on('click',registrarse);
	$('#entrar').on('click',entrar);
	comprobarLogin();

	
}

function disponibilidad(usuario){
	//alert(usuario.value);
	var datos={'accion':'comprobar_nickname','nombre_usuario':usuario.value};
	//var url="controllers/usuario_controlador.php",
	//var ajax=new Ajax.Updater('');
	
	$.ajax({
		type:'POST',
		url:'controllers/usuario_controlador.php',
		dataType:'json',
		data:datos,

		success:function(data){

			if(data.resultado=="yes"){
				$('#inputUsuario').addClass("is-invalid");
				$('#registrar').addClass('disabled');
				$('#registrar').hide();
			}else{
				$('#inputUsuario').removeClass("is-invalid");
				$('#registrar').removeClass('disabled');
				$('#registrar').show();
			}
		}
	})



}

function comprobarLogin(){
	
	if(localStorage['usuario']=="nada"|| localStorage['usuario']==undefined){
	
	}else {
		location.href="http://localhost/Proyecto%20Final/views/template.php";
	}
}

/*
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
*/
//Validar Sesion
	$.validator.setDefaults({
		submitHandler:function(){
			nombre_usuario=$('#exampleInputEmail1').val();
			pass=$('#exampleInputPassword1').val();

			var info={'accion':'comprobar_ingreso','nombre_usuario':nombre_usuario,'pass':pass};

			$.ajax({
				type:'POST',
				url:"controllers/usuario_controlador.php",
				dataType:'json',
				data:info,
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
 	});


//Validar Sesion
	$.validator.setDefaults({
		submitHandler:function(){
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


	});

	$("#entrar").submit(function(e){e.preventDefault();}).validate({
	debug:false,
	rules:{
		"exampleInputEmail1":{required:true},
		"exampleInputPassword1":{required:true}
	},
	messages:{
		"exampleInputEmail1":{required:"Intruduce tu nombre de usuario"},
		"exampleInputPassword1":{required:"Intruduce tu contraseña"}
	}});


//Registro Sesion
	
	$.validator.setDefaults({
		submitHandler: function(){
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

									var info={'accion':'registrar_terreno','usuario':nombre_usuario,'terreno':nombre_terreno};

									$.ajax({
										type:'POST',
										url:"controllers/terreno_controlador.php",
										dataType:'json',
										data:info,
										success:function(data){
											if(data.estado=="ok"){
												alert("Terreno registrado");
												window.location.href = 'http://localhost/Proyecto%20Final/';
											}else if(data.status=="err"){
												alert(data.result);
											}
										}
									})

								}else if(data.status=="err"){
									alert("Error a regitrar persona");
								}
							}
						})
					}else if(data.status=="err"){
						alert("Error al registrar persona ");
					}
				}
			})
		}
	})
	
	$('#registrarse').submit(function(e){e.preventDefault();}).validate({
		debug:false,
		rules:{
			"inputNombre":{required:true},
			"inputApellidos":{required:true},
			"inputUsuario":{required:true},
			"inputPass":{required:true},
			"terreno":{required:true}
		},
		messages:{
			"inputNombre":{required:"Porfavor Ingresa tu nombre"},
			"inputApellidos":{required:"Porfavor ingresa tu apellido"},
			"inputUsuario":{required:"Porfavor ingresa un nombre de usuario"},
			"inputPass":{required:"Porfavor ingrese una contraseña"},
			"terreno":{required:"ingresa un nombre de referencia a tu terreno principal"}
		}
	})


	$("#entrar").submit(function(e){e.preventDefault();}).validate({
	debug:false,
	rules:{
		"exampleInputEmail1":{required:true},
		"exampleInputPassword1":{required:true}
	},
	messages:{
		"exampleInputEmail1":{required:"Intruduce tu nombre de usuario"},
		"exampleInputPassword1":{required:"Intruduce tu contraseña"}
	}})
//--

//Registro Sesion
	
	$.validator.setDefaults({
		submitHandler: function(){
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
												window.location.href = 'http://localhost/Proyecto%20Final/';
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
	})
	
	$('#registrarse').submit(function(e){e.preventDefault();}).validate({
		debug:false,
		rules:{
			"inputNombre":{required:true},
			"inputApellidos":{required:true},
			"inputUsuario":{required:true},
			"inputPass":{required:true},
			"terreno":{required:true}
		},
		messages:{
			"inputNombre":{required:"Porfavor Ingresa tu nombre"},
			"inputApellidos":{required:"Porfavor ingresa tu apellido"},
			"inputUsuario":{required:"Porfavor ingresa un nombre de usuario"},
			"inputPass":{required:"Porfavor ingrese una contraseña"},
			"terreno":{required:"ingresa un nombre de referencia a tu terreno principal"}
		}
	});









