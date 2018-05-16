$(document).ready(iniciar);
//Deberia traer el valor desde BD


function iniciar(){
	//localStorage['dia']="no";
	//alert(localStorage['dia']);
	//alert((f.getMonth() + 1 )+" / "+f.getDate()+" / "+f.getFullYear());
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
	$('.empezarDia').on('click',show_view_day);
	$('.registrar_terreno').on('click',registrar_terreno);
	$('.encargados').on('click',show_view_managers);
	$('.agregar_nuevo_encargado').on('click',buscar_todos_terrenos_lista_option);
	$('#actualizar_trabajador').on('click',actualizar_trabajador);
	
}

function buscarCantidadEncargados(){
	var json={
		'accion':'buscar_cantidad',
		'usuario':localStorage['usuario']
	}
	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_encargado.php',
		success:function(data){
			alert(data);

		}

	})
}

function show_view_managers(){

	$('.vista_encargados').removeAttr('hidden');
	$('.mensaje_encargados').removeAttr('hidden');
	$('.dia').attr('hidden','true');
	$(".tabla_terrenos").attr("hidden","true");
	$(".show_info").attr("hidden","true");
	$('.mensaje_trabajador').attr('hidden','true');
	$('.caja_mas').attr('hidden','true');
	$('.SearchByNamet').attr('hidden','true');
	$('.tabla').attr('hidden','true');
}

function show_view_day(){
	if(localStorage['tipo_usuario']=="administrador" && localStorage['dia']=="no"){
		$('.menu_dia').removeClass("treeview");
		$("#modal-default").modal("show");
		

		var json={
			'nombre_usuario':localStorage['usuario'],
			'accion':'buscar_todos_terrenos'
		};
		$.ajax({
			type:"POST",
			dataType:"Json",
			url:'../controllers/terreno_controlador.php',
			data:json,
			success:function(data){
				var html="";
				var i=0;
				if(data.status=="ok"){
					while(i<data.result.length){
						html+="<tr>";
						html+='<td id="terreno_id">'+data.result[i]['id']+'</td>';
						html+='<td>'+data.result[i]['nombre']+'</td>';
						html+='<td class="escoger_terreno_dia"><span class="fa fa-check-square-o"></span></td>';
						i++;
					}
					$('#lista_terrenos').html(html);
				}else if(data.status=="err"){
					$('#lista_terrenos').html(data.result);
				}
				$('.escoger_terreno_dia').on('click',empezarDia);
			}


		})
	}else{
		if(localStorage['dia']=="ok"){
			//var opcion=confirm("Estas seguro de empezar un nuevo dia de trabajo?");
			//if(opcion==true){

				$('.menu_dia').addClass("treeview");
				$('.mensaje_trabajador').attr('hidden','true');
				$('.show_info').attr('hidden','true');
				$('.dia').removeAttr('hidden');
				$('#nivel').html("Empezar Dia");
				$('.vista_encargados').attr('hidden','true');
				$('.mensaje_encargados').attr('hidden','true');

		

				var json={
					'accion':'consultarPagos',
					'fecha':localStorage['fecha']
				};
				$.ajax({
					type:'POST',
					dataType:'Json',
					data:json,
					url:'../controllers/controller_pago_trabajadores.php',
					success:function(data){
						html='<input type="text" class="dial" id="pagos_realizados" value="'+data+'" data-min="0" data-max="100" name="" readOnly ><h5 class="text-center">Pagos Realizados Hoy</h5>';
						$('#pie_pago').html(html);

						$('.dial').knob({
							'min':0,
							'max':100
						});

					}
				});


			/*}else{
				$(".menu_dia").removeClass("treeview");

			}*/
		}else{
			$('.menu_dia').addClass("treeview");
			$('.mensaje_trabajador').attr('hidden','true');
			$('.show_info').attr('hidden','true');
			$('.dia').removeAttr('hidden');
			$('.vista_encargados').attr('hidden','true');
			$('.mensaje_encargados').attr('hidden','true');
			$('#nivel').html("Empezar Dia");
			
			$('.dial').knob({
				'min':0,
				'max':100
			});
		}
		
	}
}

function cerrar(){
	localStorage['usuario']="nada";
	localStorage['pass']="";
	localStorage['tipo_usuario']="";
	localStorage['id_persona']="";
	localStorage['foto_perfil']="";
	location.href="http://localhost/Proyecto%20Final/";
}

function comprobarLogin(){
	
	if(localStorage['usuario']=="nada" || localStorage['usuario']==undefined){
		localStorage['usuario']="nada";
		location.href="http://localhost/Proyecto%20Final/";
	}else{
		$('.user-image').attr("src",localStorage['foto_perfil']);
		$('.nombre_usuario').html(localStorage['usuario']);
		$('.tipo_usuario').html(localStorage['tipo_usuario']);
		

	}
}

//Muestra La vista de Trabajadores y esconde las demas vistas 
function show_view_workers() {
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.dia').attr('hidden','true');
	$(".tabla_terrenos").attr("hidden","true");
	//listaEmpleados();
	var Json={
		'accion':'mostrar_trabajadores',
		'user':localStorage['usuario']
	};

	$.ajax({

		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {
				if (data.estado=="err") {
					$(".mensaje_trabajador").removeAttr("hidden");
					$(".show_info").attr("hidden","true");
					//Cambio de Nivel
					$("#nivel").html("Trabajadores");
				}else if(data.estado=="ok"){

					$(".caja_mas").removeAttr("hidden");
					$(".SearchByNamet").removeAttr("hidden");
					$(".tabla").removeAttr("hidden");
					$(".show_info").attr("hidden","true");
					$(".mensaje_trabajador").attr("hidden","true");
					//Cambio de Nivel
					$("#nivel").html("Trabajadores");
					var nombre_cargo;
					var json={};
					var html="";
					var i=0;
					while(i<data.resultado.length){
						html += '<tr>';
						html +=		'<td class="nombre" >'+data.resultado[i][1]+'</td>';
						html +=		'<td class="apellido">'+data.resultado[i][2]+'</td>';
						html +=		'<td class="telefono">'+data.resultado[i][3]+'</td>';

						json={
							'accion':'buscar_cargo_id',
							'id_cargo':data.resultado[i][5]
						};

						html +=		'<td class="cargo_empleado">'+data.resultado[i][5]+'</td>';
						html +=		'<td><button data_id='+data.resultado[i][0]+'  class="btn btn-danger borrar_trabajador" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
						html +=		'<td ><button data_id='+data.resultado[i][0]+'   class="btn btn-success editar_trabajador" type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
						html +=		'<td ><button  data_id='+data.resultado[i][0]+' class="btn btn-info ver_informacion_trabajador" type="submit" data-toggle="modal" data-target="#bs-example-modal-lg"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>';
						html +=	'</tr>';

						/* Bug al mostrar nombre del cargo en la lista de empleados 
						$.ajax({

							type:'POST',
							dataType:'Json',
							data:json,
							url:'../controllers/cargo_controlador.php',
							success:function(cargo){
								nombre_cargo=cargo.resultado[0]['tipo'];
								$('.cargo_empleado').html(nombre_cargo)
								//alert(nombre_cargo);
							},
							error:function(data){
								console.log(data);
							}
						})*/

						i++;
					}
					$('.contenedor').html(html);
					$('.borrar_trabajador').off('click').on('click',borrar_trabajador);

					$('.editar_trabajador').off('click').on('click',function(){
						buscar_cargos();
						$('#nuevo_nombre').val($(this).parent().siblings('.nombre').html());
						$('#nuevo_apellido').val($(this).parent().siblings('.apellido').html());
						$('#nuevo_telefono').val($(this).parent().siblings('.telefono').html());
						$('#actualizar_trabajador').attr('data_id',$(this).attr('data_id'));
					});

					$('.ver_informacion_trabajador').on('click',ver_informacion_trabajador);
					
				}
		}
	});
}

function ver_informacion_trabajador() {
	var nombre_trabajador=$(this).parent().siblings('.nombre').html();
	var apellido_trabajador=$(this).parent().siblings('.apellido').html();
	var id_trabajador=$(this).attr('data_id');
	$('.nombreTrabajador').html(nombre_trabajador+" "+apellido_trabajador);
	/* Orden de las consultas a realizar
	#Conexion con:
		-Controlador asignar trabajadores a terreno (crear case y consulta terreno asignado del trabajador)
		-Controlador cargo (consultar nombre del cargo del trabajado en cuestion)
		-Controlador registro_trabajo_realizdo (consultar kilos de cafe recogidos total en todo los tiempos (pimero))
		-Controlador pago_a_trabajadores (consultar pago y fecha <- si modifican esta fecha el acomulador de kilos de cafe cambia hasta esa fecha)
	*/

	var json={
		'id_trabajador':id_trabajador,
		'accion':'consultarTerreno'
	};

	var html="<tr><td>";

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_asignar_trabajador_a_terreno.php',
		success:function(terrenos_asginados){
			
			var i=0;
			if(terrenos_asginados.estado=="ok"){
				//console.log[terrenos_asginados.resultado];
				
				while(i<terrenos_asginados.resultado.length){

					html+= terrenos_asginados.resultado[i][0]+" | ";
					i++;
				}
				

			}else if(terrenos_asginados.estado=="err"){
				html+= terrenos_asginados.resultado;
				
			}
			
			html+= "</td>";

			json={
				'id_trabajador':id_trabajador,
				'accion':'consultar_cargo_trabajador'
			};

			$.ajax({
				type:'POST',
				dataType:'Json',
				data:json,
				url:'../controllers/controller_trabajador.php',
				success:function(cargo_trabajador){
					
					html+= "<td>";

					if(cargo_trabajador.estado=="ok"){
						//console.log(cargo_trabajador.resultado);
						
						html+= cargo_trabajador.resultado;
						
					}else if(cargo_trabajador.estado=="err"){
						html+= cargo_trabajador.resultado;
						
					}

					html+= "</td>";
					html+= '<td><button  data_id="'+id_trabajador+'" class="btn btn-success consultarPagos" data-toggle="modal" data-target="#ModalPagos" style="Width:15%; padding:initial" ><span class="fa fa-usd" aria-hidden="true"></span></button></td>';
					$('#ver_informacion_trabajador').html(html);
					$('.consultarPagos').off('click').on('click',consultarPagos);

				}



			});
		}
	})
}

function consultarPagos(){
	$('#bs-example-modal-lg').modal('hide');
	
	var json={
		'accion':'consultarPagosByIdTrabajador',
		'id_trabajador':$(this).attr("data_id")	
	};

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_pago_trabajadores.php',
		success:function(data){
			if(data.estado=="ok"){
				var html="";
				var i=0;
				while(i<data.resultado.length){
					html+="<tr>";
					html +=		'<td class="nombre" >'+data.resultado[i]['id']+'</td>';
					html +=		'<td class="apellido">'+data.resultado[i]['nombre_usuario']+'</td>';
					html +=		'<td class="telefono">'+data.resultado[i]['fecha']+'</td>';
					html +=		'<td class="telefono">'+data.resultado[i]['cantidad_pago']+'</td>';
					html+="</tr>";
					i++;
				}
				$('#mostrarInformacionPagos').html(html);
			}else if(data.estado=="err"){
				$('#mostrarInformacionPagos').html(data.resultado);
			}
		}
	});

	json={
		'accion':'consultarTotalPagadoById',
		'id_trabajador':$(this).attr("data_id")
	};


	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_pago_trabajadores.php',
		success:function(data){
			if(data.estado=="ok"){
				$('.cantidadPagado').html(data.resultado);
			}else if(data.estado=="err"){
				$('.cantidadPagado').html(data.resultado);
			}
		}
	});

}

function actualizar_trabajador(){

	var json={
		'accion':'Update',
		'id':$('#actualizar_trabajador').attr('data_id'),
		'nombres':$('#nuevo_nombre').val(),
		'apellidos':$('#nuevo_apellido').val(),
		'telefono':$('#nuevo_telefono').val(),
		'nombre_usuario':localStorage['usuario'],
		'id_cargo':$('.cargo_trabajador').val()
	};

	$.ajax({
		type:'POST',
		data:json,
		dataType:'Json',
		url:'../controllers/controller_trabajador.php',
		success:function(data){
			alert(data.result);
			show_view_workers();
			$('#exampleModal').modal('hide');
		}
	});  
}

function borrar_trabajador(){
	var json={
		'accion':'Delete',
		'id':$(this).attr('data_id')
	};

	$.ajax({
		type:'POST',
		data:json,
		dataType:'Json',
		url:'../controllers/controller_trabajador.php',
		success:function(data){
			alert(data.result);
			show_view_workers();
		}
	});


}

function show_view_dashboard(){
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.dia').attr('hidden','true');
	$(".caja_mas").attr("hidden","true");
	$(".SearchByNamet").attr("hidden","true");
	$(".tabla").attr("hidden","true");
	$(".show_info").removeAttr("hidden");
	$(".mensaje_trabajador").attr("hidden","true");
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


	$.ajax({
		type:"POST",
		data:json_0,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success:function(data){
			$('.cantidad_trabajadores').html(data);

		}
	})

	
	$.ajax({
		type:"POST",
		data:json_0,
		dataType:"Json",
		url:"../controllers/controller_encargado.php",
		success:function(data){
			$('.cantidad_encargados').html(data);
		}
	})


	//Falta conexion con el controller de empesar dia
}

//Muestra la vista de Terrenos y esconde las demas vistas
function show_view_ground(){
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.dia').attr('hidden','true');
	$("#nivel").html("Terrenos");
	$(".show_info").attr("hidden","true");
	$(".SearchByNamet").attr("hidden","true");
	$(".mensaje_trabajador").attr("hidden","true");
	$(".tabla").attr("hidden","true");
	$(".tabla_terrenos").removeAttr("hidden");

	var Json={
		'accion':'buscar_todos_terrenos',
		'nombre_usuario':localStorage['usuario'],
	};
	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/terreno_controlador.php",
		success:function(data){
			console.log(data); 
			var i = 0;

			var verterrenos ='';

			while(i<data.result.length){
				if(i==0){
					verterrenos +='<tr>';
					verterrenos += '<td class="nombre" id="'+data.result[i]['id']+'">'+data.result[i][1]+'</td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-primary editar_terreno" type="submit" data-toggle="modal" data-target="#ModalEditarTerreno"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-success asignar_trabajadores" type="submit" data-toggle="modal" data-target="#ModalAsignarTrabajadores"><span class="glyphicon glyphicon-check"></span></button></td>';
					verterrenos += '</tr>';
				}else{
					verterrenos +='<tr>';
					verterrenos += '<td class="nombre" id="'+data.result[i]['id']+'">'+data.result[i][1]+'</td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button class="btn btn-danger eliminar_terreno" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button class="btn btn-primary editar_terreno" type="submit" data-toggle="modal" data-target="#ModalEditarTerreno"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button class="btn btn-success asignar_trabajadores" type="submit" data-toggle="modal" data-target="#ModalAsignarTrabajadores"><span class="glyphicon glyphicon-check"></span></button></td>';
					verterrenos += '</tr>';
				}
				i++;
			}
			$(".ver_terrenos").html(verterrenos);
			$(".eliminar_terreno").off('click').on("click",eliminar_terreno);
			$('.editar_terreno').off('click').on('click',editar_terreno);
			$('.asignar_trabajadores').off('click').on('click',asignar_trabajadores_terreno);
		}
	});
}

function asignar_trabajadores_terreno(){
	var id_terreno=$(this).parent().siblings('.nombre').attr('id');
	var Json={
		'accion':'mostrar_trabajadores',
		'user':localStorage['usuario']
	};
	
	$.ajax({
		type:"POST",
		data:Json,
		dataType: "Json",
		url:"../controllers/controller_trabajador.php",
		success:function(data){
			console.log(data);
			if(data.estado=="ok"){
				var html="";
				var i=0;
				while(i<data.resultado.length){
					html+='<tr>';
					html+=' <td id="id_trabajador">'+data.resultado[i]['id']+'</td>';
					html+= '<td>'+data.resultado[i]['nombres']+'</td>';
					html+= '<td>'+data.resultado[i]['apellidos']+'</td>';
					html+= '<td><span class="fa fa-check-square-o asignar_trabajador"></span></td>';
					html+='</tr>';
					i++;
				}

				$('#lista_trabajadores').html(html);
			}else if(data.estado=="err"){
				html+="<tr><td>"+data.resultado+"</td></tr>";
				$('#lista_trabajadores').html(html);
			}

			//Asginarmos ese trabajador al terreno en cuestion
			$('.asignar_trabajador').on('click',function(){
				json={
					'accion':'Insertar',
					'id_trabajador':$(this).parent().siblings('#id_trabajador').html(),
					'id_terreno':id_terreno
				};


				$.ajax({
					type:'POST',
					data:json,
					dataType:'json',
					url:'../controllers/controller_asignar_trabajador_a_terreno.php',
					success:function(data){
						alert(data.result);
					}
				});
			});
		},
		error:function(data){
			alert("Error mira la consola");
			console.log(data);
		}

	});

	/* mostrar lista de Encargados
	$.ajax({

	})*/
}



function registrar_terreno(){
	var nombre_terreno=$('#nombre_terreno').val();
	var json={
		'usuario':localStorage['usuario'],
		'accion':'registrar_terreno',
		'terreno':nombre_terreno
	};

	$.ajax({
		type:'POST',
		data:json,
		dataType:'Json',
		url:'../controllers/terreno_controlador.php',
		success:function(data){
			alert(data.resultado);
			show_view_ground();
		}
	})
}

function eliminar_terreno(){
	var opcion = confirm("¿Estas seguro de Eliminar el Terreno?");

	if(opcion == true){
		var json={
			'accion':'eliminar_terreno',
			'id_terreno':$(this).parent().siblings('.nombre').attr('id')
		};

		$.ajax({
			type:'POST',
			dataType:'json',
			data:json,
			url:'../controllers/terreno_controlador.php',
			success:function(data){
				if(data.status=="ok"){
					alert(data.result);
					show_view_ground();
				}else if(data.status=="err"){
					alert(data.result);
				}
				
			}
		});
		
		
	}
}

function editar_terreno(){
	var nombre_terreno=$(this).parent().siblings('.nombre').html();
	var id=$(this).parent().siblings('.nombre').attr('id');
	
	$('#nombreTerreno').attr('value',nombre_terreno);

	$('.actualizar_terreno').off('click').on('click',function(){
		var nuevo_nombre_terreno=$('#nombreTerreno').val();
		$('#nombreTerreno').val("");
		var json={
			'accion':'actualizar_terreno',
			'nombre_terreno':nuevo_nombre_terreno,
			'id':id
		};

		$.ajax({
			type:'POST',
			dataType:'Json',
			url:'../controllers/terreno_controlador.php',
			data:json,
			success:function(data){
				$('#ModalEditarTerreno').modal('hide');
				alert("Informacion del Terreno Actualizada con Exito");
				show_view_ground();
			}
		})
	})

}




/*Responsable del bug del parpadeo al ir al menu de Trabajadores 

function listaEmpleados(){
	var Json={
		'accion':'mostrar_trabajadores',
		'user':localStorage['usuario']
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {


			var i = 0;
			var tabla1 ='';
			
			if (data.status == "ok") {
			 while(i<data.result.length){
			 	tabla1 +=	'<tr>';
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
}*/

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
	var cargo = $(".cargo").val();

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
				alert(data.result);
				show_view_workers();
		}
	});
}

function SearchByName(e) {
	e.preventDefault();
	var nombres = $(".buscar_trabajadores").val();
	
	
	var Json={
		'accion':'SearchByName',
		'nombre_buscar':nombres,
		'usuario':localStorage['usuario']
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {
				if(data.status=="ok"){
						var html="";
					var i=0;
					while(i<data.result.length){
						html += '<tr>';
						html +=		'<td class="nombre" >'+data.result[i][1]+'</td>';
						html +=		'<td class="apellido">'+data.result[i][2]+'</td>';
						html +=		'<td class="telefono">'+data.result[i][3]+'</td>';

						json={
							'accion':'buscar_cargo_id',
							'id_cargo':data.result[i][5]
						};

						html +=		'<td class="cargo_empleado">'+data.result[i][5]+'</td>';
						html +=		'<td><button data_id='+data.result[i][0]+'  class="btn btn-danger borrar_trabajador" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
						html +=		'<td ><button data_id='+data.result[i][0]+'   class="btn btn-success editar_trabajador" type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
						html +=		'<td ><button   class="btn btn-info ver_informacion_trabajador" type="submit" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>';
						html +=	'</tr>';

						/*
						$.ajax({

							type:'POST',
							dataType:'Json',
							data:json,
							url:'../controllers/cargo_controlador.php',
							success:function(cargo){
								nombre_cargo=cargo.resultado[0]['tipo'];
								$('.cargo_empleado').html(nombre_cargo)
								//alert(nombre_cargo);
							},
							error:function(data){
								console.log(data);
							}
						})*/

						i++;
					}
					$('.contenedor').html(html);
					$('.borrar_trabajador').off('click').on('click',borrar_trabajador);

					$('.editar_trabajador').off('click').on('click',function(){
						buscar_cargos();
						$('#nuevo_nombre').val($(this).parent().siblings('.nombre').html());
						$('#nuevo_apellido').val($(this).parent().siblings('.apellido').html());
						$('#nuevo_telefono').val($(this).parent().siblings('.telefono').html());
						$('#actualizar_trabajador').attr('data_id',$(this).attr('data_id'));
					});
				}else if(data.status=="err"){
					alert(data.result);
				}
				
		}
	});
}

function clean(){
	$("#nombre").val("");
	$("#apellido").val("");
	$("#telefono").val("");
}

function buscar_cargos(){

	var json={
		'accion':'buscar_cargos'
	};
	$.ajax({
		type:"POST",
		data:json,
		url:'../controllers/cargo_controlador.php',
		dataType:"Json",
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

function empezarDia(){
	$('#modal-default').modal('hide');

	localStorage['dia']="ok";
	var f = new Date();
	var fecha=(f.getFullYear()+"-"+(f.getMonth() + 1 )+"-"+f.getDate());
	var json={
		'accion':'nuevoDia',
		'terreno_id':$(this).siblings('#terreno_id').html(),
		'nombre_usuario':localStorage['usuario'],
		'fecha':fecha
	};

	localStorage['fecha']=fecha;


	
	$.ajax({
		type:"POST",
		dataType:'Json',
		url:'../controllers/controlador_registro_dia.php',
		data:json,
		success:function(data){
			alert(data.estado);
		}
	})

}

function buscar_todos_terrenos_lista_option(){
	var json={
		'nombre_usuario':localStorage['usuario'],
		'accion':'buscar_todos_terrenos'
	};

	$.ajax({
		type:"POST",
		dataType:"Json",
		url:'../controllers/terreno_controlador.php',
		data:json,
		success:function(data){
			var html="";
			var i=0;
			if(data.status=="ok"){
				while(i<data.result.length){
					html+="<option value="+data.result[i][0]+">"+data.result[i][1]+"</option>";
					i++;
				}
				$('.terreno_asignado_encargado').html(html);
			}else if(data.status=="err"){
				$('.terreno_asignado_encargado').html(data.result);
			}
		}

	});

}

