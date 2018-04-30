$(document).ready(iniciar);

function iniciar(){
	comprobarLogin();
	show_view_dashboard();
	$(".opcion_trabajadores").off("click").on("click",show_view_workers);
	$("#guardar_registro").off("click").on("click",save_worker);
	$("#search-btn").off("click").on("click",SearchByName);
	$('.cerrar_sesion').on('click',cerrar);
	$('.mas').on('click',buscar_cargos);
	$('.agregar_nuevo').on('click',buscar_cargos);
	$('.inicio').on('click',show_view_dashboard);
	$('.mostrar_terrenos').on('click',show_view_ground);

}


function cerrar(){
	localStorage['usuario']="nada";
	localStorage['pass']="";
	localStorage['tipo_usuario']="";
	localStorage['id_persona']="";
	localStorage['foto_perfil']="";
	location.href="../index.php";
}

function comprobarLogin(){
	
	if(localStorage['usuario']=="nada"){
		location.href="../template.php";
	}else{
		$('.user-image').attr("src",localStorage['foto_perfil']);
		$('.nombre_usuario').html(localStorage['usuario']);
		$('.tipo_usuario').html(localStorage['tipo_usuario']);
		

	}
}


//Muestra La vista de Trabajadores y esconde las demas vistas 

function show_view_workers() {
	$(".tabla_terrenos").attr("hidden","true");
	listaEmpleados();
	var Json={
		'accion':'SearchByName',
		'nombres':'', 
	};

	$.ajax({

		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {
				if (data.status=="err") {
					$(".mensaje").removeAttr("hidden");
					$(".show_info").attr("hidden","true");
					//Cambio de Nivel
					$("#nivel").html("Trabajadores");
				}else{
					$(".caja_mas").removeAttr("hidden");
					$(".SearchByNamet").removeAttr("hidden");
					$(".tabla").removeAttr("hidden");
					$(".show_info").attr("hidden","true");
					$(".mensaje").attr("hidden","true");
					//Cambio de Nivel
					$("#nivel").html("Trabajadores");
					
				}
		}
	});
}

//Muestra la vista del panel y esconde las demas vistas

// function show_view_dashboard(e){
// 	e.preventDefault();
// 	$(".caja_mas").attr("hidden","true");
// 	$(".SearchByNamet").attr("hidden","true");
// 	$(".tabla").attr("hidden","true");
// 	$(".show_info").removeAttr("hidden");
// 	$(".mensaje").attr("hidden","true");
// 	$(".tabla_terrenos").attr("hidden","true");

// 	var json={
// 		'accion':'cantidad',
// 		'tipo':'encargado'
// 	};

// 	//Falta conexion con el controller de encargados
// 	$.ajax({
// 		type:"POST",
// 		data:json,
// 		dataType:"Json",
// 		url:"../controllers/terreno_controlador.php",
// 		success:function(data){
// 			$('.cantidad_terrenos').html(data);


// 		}
// 	})

// 	$.ajax({
// 		type:"POST",
// 		data:json,
// 		dataType:"Json",
// 		url:"../controllers/controller_trabajador.php",
// 		success:function(data){
			
// 			$('.cantidad_trabajadores').html(data);

// 		}
// 	})


// 	$.ajax({
// 		type:"POST",
// 		data:json,
// 		dataType:"Json",
// 		url:"../controllers/usuario_controlador.php",
// 		success:function(data){
// 			$('.cantidad_encargados').html(data);
// 		}
// 	})
// }

function show_view_dashboard(){
	$(".caja_mas").attr("hidden","true");
	$(".SearchByNamet").attr("hidden","true");
	$(".tabla").attr("hidden","true");
	$(".show_info").removeAttr("hidden");
	$(".mensaje").attr("hidden","true");
	$(".tabla_terrenos").attr("hidden","true");

	var json_0={
		'accion':'cantidad',
		'tipo':'encargado',
		'user':localStorage['usuario']
	};

	$.ajax({
		type:"POST",
		data:json_0,
		dataType:"Json",
		url:"../controllers/terreno_controlador.php",
		success:function(data){
			$('.cantidad_terrenos').html(data);
		}
	})

	var json_1={
		'accion':'cantidad',
		'tipo':'encargado',
		'user':localStorage['usuario']
	};

	$.ajax({
		type:"POST",
		data:json_1,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success:function(data){
			$('.cantidad_trabajadores').html(data);

		}
	})

	var json_2={
		'accion':'cantidad',
		'tipo':'encargado',
		'user':localStorage['usuario']
	};

	$.ajax({
		type:"POST",
		data:json_2,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success:function(data){
			$('.cantidad_encargados').html(data);
		}
	})

	//Falta conexion con el controller de empesar dia
}

//Muestra la vista de Terrenos y esconde las demas vistas
function show_view_ground(){
	$("#nivel").html("Terrenos");
	$(".show_info").attr("hidden","true");
	$(".SearchByNamet").attr("hidden","true");
	$(".mensaje").attr("hidden","true");
	$(".tabla").attr("hidden","true");
	$(".tabla_terrenos").removeAttr("hidden");

	var Json={
		'accion':'buscar_todos_terrenos',
		'nombres':'',
	};
	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/terreno_controlador.php",
		success:function(data){
			var i = 0;

			var verterrenos ='<tr>';

			while(i<data.result.length){
				verterrenos += '<td class="nombre">'+data.result[i][1]+'</td>';
				verterrenos += '<td class="tamano"><button id="eliminar_terreno" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
				verterrenos += '<td class="tamano"><button id="editar" class="btn btn-success" type="submit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
				verterrenos += '<td class="tamano"><button id="eliminar" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-check"></span></button></td>';
				verterrenos += '</tr>';

				i++;
			}
			$(".ver_terrenos").html(verterrenos)
			$("#eliminar_terreno").on("click",eliminar_terreno);
		}
	});
}
function eliminar_terreno(){
	var opcion = confirm("Estas seguro de Eliminar el personaje");

	if(opcion == true){
		var id = $(this).attr('data-id');
	}
}

/*
function listaEmpleados() {
	var Json={
		'accion':'SearchByName',
		'nombres':'',
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {

			var i = 0;
			var tabla1 ='<tr>';
			
			while(i<data.result.length){
				tabla1 +=		'<td data-nombre="'+data.result[i][1]+'" class="nombre">'+data.result[i][1]+'</td>';
				tabla1 +=		'<td data-apellido="'+data.result[i][2]+'" class="apellido">'+data.result[i][2]+'</td>';
				tabla1 +=		'<td data-telefono="'+data.result[i][3]+'" class="telefono">'+data.result[i][3]+'</td>';
				tabla1 +=		'<td data-cargo="'+data.result[i][5]+'" class="cargo_trabajador">'+data.result[i][5]+'</td>';
				tabla1 +=		'<td class="tamano"><button id="eliminar" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
				tabla1 +=		'<td class="tamano"><button class="btn btn-success editar_trabajador" type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
				tabla1 +=		'<td class="tamano"><button id="ver_informacion" class="btn btn-info" type="submit" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>';
				tabla1 +=	'</tr>';

				i++;
			}
			$(".contenedor").html(tabla1);
			$(".editar_trabajador").on("click",editar_trabajador);
			
		}
	});
}

*/
function listaEmpleados(){
	var Json={
		'accion':'SearchByName',
		'nombres':localStorage['usuario']
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {


			var i = 0;
			var tabla1 ='<tr>';
			
			if (data.status == "ok") {
			 while(i<data.result.length){
			 	tabla1 +=		'<td class="apellido" >'+data.result[i][1]+'</td>';
			 	tabla1 +=		'<td class="telefono">'+data.result[i][2]+'</td>';
			 	tabla1 +=		'<td class="cargo_trabadores">'+data.result[i][3]+'</td>';	
			 	tabla1 +=		'<td class="nombre">'+data.result[i][5]+'</td>';
			 	tabla1 +=		'<td class="tamano"><button data_id='+data.result[i][0]+'  class="btn btn-danger gato" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
			 	tabla1 +=		'<td class="tamano"><button  id="editar" class="btn btn-success" type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
			 	tabla1 +=		'<td class="tamano"><button  id="ver_informacion" class="btn btn-info" type="submit" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>';
			 	tabla1 +=	'</tr>';

			 	i++;
			 }
			} 
			$(".contenedor").html(tabla1);

			$(".gato").off("click").on("click", function(){
				
				swal({
				  title: "Deseas eliminar este trabajdor?",
				  text: "Una vez elimnado no podras recuperarlo!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    var id_trabajador = $(this).attr('data_id');

				  	  	var eliminar_T = {'accion':'Delete', 'id':id_trabajador}

				  	  	$.ajax({
				  	  		type: 'POST',
				  	  		data: eliminar_T,
				  	  		dataType:'json',
				  	  		url:"../controllers/controller_trabajador.php",
				  	  		success:function(data){
				  	  			listaEmpleados();
				  	  			swal("El trabajdor fue eliminado con exito!", {
							    icon: "success",
							    });		   
				  	  		}
				  	  	});
				  } else {
				    swal("Your imaginary file is safe!");
				  }
				});

			});

				
		}
	});	
}


function editar_trabajador(){
		
		var nombre_trabajador = $(this).parents().siblings(".nombre").attr("data-nombre");
		var apellido_trabajador = $(this).parents().siblings(".apellido").attr("data-apellido");
		var telefono_trabajador = $(this).parents().siblings(".telefono").attr("data-telefono");
		var cargos_trabajador = $(this).parents().siblings(".cargo_trabajador").attr("data-cargo");
		
		$("#nuevo_nombre").val(nombre_trabajador);
		$("#nuevo_apellido").val(apellido_trabajador);
		$("#nuevo_telefono").val(telefono_trabajador);

	}

//recoge los datos y revisa se se puede o no se puede guardar en la base de datos
function save_worker() {

	var nombre = $("#nombre").val();
	var apellido = $("#apellido").val();
	var telefono = $("#telefono").val();
	var usuario = localStorage['usuario'];
	var cargo = $("#cargo").val();
	alert(nombre+apellido+telefono+usuario+cargo);

	var Json={
		'accion':'insert',
		'nombres':nombre,
		'apellidos':apellido,
		'telefono':telefono,
		'nombre_usuario':usuario,
		'id_cargo':cargo
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {
				console.log(data);
				show_view_workers();
		}
	});

}

function SearchByName(e) {
	e.preventDefault();
	var nombres = $(".SearchByName").val();
	
	//alert(nombres);
	
	var Json={
		'accion':'SearchByName',
		'nombres':nombres
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {
				console.log(data);
		}
	});
}


function clean(){
	$("#nombre").val("");
	$("#apellido").val("");
	$("#telefono").val("");
}

function buscar_cargos(){

	$.ajax({
		type:"POST",
		dataType:"Json",
		url:'../controllers/cargo_controlador.php',
		success:function(data){
			
			if(data.estado=="ok"){
				var i=0;
				var html;
				
				while(i<data.resultado.length){
					html+="<option value="+data.resultado[i][0]+">"+data.resultado[i][1]+"</option>";
					i++;
				}
				$(".cargo").html(html);

			}else if(data.estado=="err"){
				alert(data.resultado);
			}else{
				alert("nada");			
			}
			
		}

	});
}





