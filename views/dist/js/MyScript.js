$(document).ready(iniciar);


$('.dial').knob({
	'min':0,
	'max':100,
	readOnly: true,
	fgColor: "#00a65a",
	'width': "140" ,
	'height':"140",});

var f = new Date();
var fecha=(f.getFullYear()+"-"+(f.getMonth() + 1 )+"-"+f.getDate());

//Guardamos la fecha del dia en cuestion en una variable de session
localStorage['fecha']=fecha;
//alert(localStorage['fecha']);



var consultaDia={
	'accion':'consultarDia',
	'fecha':fecha,
	'user':localStorage['usuario']
};



$.ajax({
	type:'POST',
	dataType:'Json',
	data:consultaDia,
	url:'../controllers/controlador_registro_dia.php',
	success:function(data){
		var i=0;
		//console.log(data);
		if( (typeof data.resultado === "object") && (data.resultado !== null) ){
			while(i<data.resultado.length){
				if(data.resultado[i][7].includes("activo")){
					
					
					localStorage['dia']="no";
					$('.menu_dia').removeClass("treeview");
					$('.menu_dia_hover').removeClass("treeview-menu");
					$('.menu_dia_hover').hide();


					var json={
						'accion':'finalizarDia2',
						'id':data.resultado[i][0]
					};

					$.ajax({
						type:'POST',
						dataType:'json',
						data:json,
						url:'../controllers/controlador_registro_dia.php',
						success:function(data){
							//alert(data);
						}
					});

				}else{
					//alert("finalizado");
				}
				i++;
			}
		}
	},
	error:function(data){
		console.log(data);
	}

})



//localStorage['consultarTrabajadoresAsistencia']=true;

function iniciar(){
	
	
	//localStorage['dia']="no";

	$('.treeview-menu').removeClass('treeview-menu ');
	$('.menu_dia_hover').hide();
	//alert(localStorage['dia']+" dia");
	//alert((f.getMonth() + 1 )+" / "+f.getDate()+" / "+f.getFullYear());
	comprobarLogin();
	show_view_dashboard();
	$(".opcion_trabajadores").off("click").on("click",show_view_workers);
	$("#guardar_registro").off("click").on("click",save_worker);
	$("#search-btn").off("click").on("click",SearchByName);
	$('.cerrar_sesion').on('click',cerrar);
	//$('.mas').on('click',buscar_cargos);
	$('.agregar_nuevo').on('click',buscar_cargos);
	$('.inicio').on('click',show_view_dashboard);
	$('.mostrar_terrenos').on('click',show_view_ground);
	$('.empezarDia').on('click',show_view_day);
	$('.registrar_terreno').on('click',registrar_terreno);
	$('.encargados').on('click',show_view_managers);
	$('.agregar_nuevo_encargado').on('click',buscar_todos_terrenos_lista_option);
	$('#actualizar_trabajador').on('click',actualizar_trabajador);
	$('.mostrar_trabajadores_asistencia').off('click').on('click',buscarTrabajadoresAsistencia);
	$('.mostrar_trabajadores_pagos').off('click').on('click',realizarPagosTrabajadores);
	$('.ver_informacion_trabajador_2').off('click').on('click',ver_informacion_trabajador_2);
	$('#hacerPago').off('click').on('click',hacerPago);
	$('.finalizarDia').on('click',finalizarDia);
	$('.cancelarDia').on('click',cancelarDia);
	$('.opcion_cargos').on('click',show_view_cargos);
	$('#actualizar_cargo').off('click').on('click',actualizar_cargo);
	$('.editarPerfil').on('click',editarPerfil);
	$('#guardar_encargado').on('click',guardar_encargado);
	$('.registrar_cargo').off('click').on('click',registrar_cargo);

}

function registrar_cargo(){
	var json={
		'accion':'registrar_cargo',
		'nombre_cargo':$('#cargo').val()
	};

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/cargo_controlador.php',
		success:function(data){
			//swal(data);
			$('#cargo').val('');
			show_view_cargos();
		}
	})
}

function guardar_encargado(){
	var json={
		'nombres':$('#nombre_encargado').val(),
		'apellidos':$('#apellido_encargado').val(),
		'cedula':$('#cedula_encargado').val(),
		'telefono':$('#telefono_encargado').val(),
		'terreno_asignado':$('#terrenos_para_encargado').val(),
		'accion':'registrar_usuario_encargado'

	};

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/persona_controlador.php',
		success:function(data){
			if(data.estado=="ok"){
				//alert(data.id);

				json={
					'usuario':$('#nombre_usuario_encargado').val(),
					'pass':$('#pass_encargado').val(),
					'accion':'registrar_usuario_encargado',
					'id_persona':data.id
				};

				$.ajax({
					type:'POST',
					dataType:'Json',
					data:json,
					url:'../controllers/usuario_controlador.php',
					success:function(data){
						
							//alert(data.resultado);

							json={
								
								'accion':'insertar',
								'usuario':localStorage['usuario'],
								'encargado':data.encargado
							};
							

							$.ajax({
								type:'POST',
								dataType:'Json',
								data:json,
								url:'../controllers/controller_administrador_encargado.php',
								success:function(data){
									if(data.estado=="ok"){
										//alert(data.resultado);

										

										
									}else{
										//alert(data.resultado);
									}
								}
							})



							json={
								'accion':'Insertar',
								'id_terreno':$('#terrenos_para_encargado').val(),
								'encargado':data.encargado
							};
							//console.log(json);
							$.ajax({
								type:'POST',
								dataType:'Json',
								data:json,
								url:'../controllers/controlador_asignar_encargado_a_terreno.php',
								success:function(data){
									if(data.status=="ok"){
										//alert(data.result);
									}else{
										swal(data.result);
									}
								}
							});

							show_view_managers();

							$('#nombre_encargado').val('');
							$('#apellido_encargado').val('');
							$('#cedula_encargado').val('');
							$('#telefono_encargado').val('');
							$('#nombre_usuario_encargado').val('');
							$('#pass_encargado').val('');

						
					}
				})
			}else{
				swal(data.resultado);
			}
		}
	})
}
 

function editarPerfil(){
	$('.opciones_perfil').removeAttr('hidden');
	$("#ConfiguracionDatos").removeAttr('hidden');
	
	$('#tabla_cargos').attr('hidden', 'true');
	$('.menu_dia').addClass("treeview");
	$('.mensaje_trabajador').attr('hidden','true');
	$('.show_info').attr('hidden','true');
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.tabla_terrenos').attr('hidden','true');
	$('.tabla').attr('hidden','true');
	$("#EditarPerfil").removeAttr("hidden");
	$('.dia').attr('hidden','true');

	$("#datoscuenta").on("click", datoscuenta);
	$(".eliminarCuenta").on("click", eliminarCuenta);

		
		var json = {'accion':'datosempresa', 'id_persona':localStorage['id_persona']};

		$.ajax({
			type: "POST",
			dataType: "Json",
			data: json,
			url: "../controllers/persona_controlador.php",
			success:function(data){
				var html="";

				html+=	' <div class="tab-content">';
				html+=	        '<div class="tab-pane active" id="tab_a">';
				html+=	            '<form role="form">';
				html+=	              '<div class="box-body">';
				html+=	                '<div class="form-group">';
				html+=	                  '<label for="elnombre">Nombre</label>';
				html+=	                  '<input readonly="true" type="text" class="form-control" id="elnombre" value="'+data.result[0][1]+'">';
				html+=	                '</div>'                              ;
				html+=	                '<div class="form-group">';
				html+=	                  '<label for="elapellido">Apellido</label>';
				html+=	                  '<input readonly="true" type="text" class="form-control" id="elapellido" value="'+data.result[0][2]+'">';
				html+=	                '</div>';
				html+=	                '<div class="form-group">';
				html+=	                  '<label for="eltelefono">Telefono</label>';				
				html+=	                  '<input readonly="true" type="number" class="form-control" id="eltelefono" value="'+data.result[0][3]+'">';
				html+=	                '</div>';	
				html+=	              '</div>';
				html+=	            '</form>';
				html+=	        '</div>';
				html+=	'</div>'; 

				$("#contendorinformacion").html(html);				
			}
		});	

		$("#datosempresa").off("click").on("click", DatosPersonales);	




}


function DatosPersonales(){
	var json = {'accion':'datosempresa', 'id_persona':localStorage['id_persona']};

	$.ajax({
		type: "POST",
		dataType: "Json",
		data: json,
		url: "../controllers/persona_controlador.php",
		success:function(data){

		var html = "";

		html += 	'<form action="#" class="col-xs-4 col-xs-offset-3">';
		html += 	  '<div class="form-group">';
		html += 	    '<label for="nombreusuario">Tu Nombre</label>';
		html += 	    '<input type="text" class="form-control" id="nombreusuario" value="'+data.result[0][1]+'">';
		html += 	  '</div>';
		html += 	  '<div class="form-group">';
		html += 	    '<label for="apelldiousuario">Tu Apellido</label>';
		html += 	    '<input type="text" class="form-control" id="apelldiousuario" value="'+data.result[0][2]+'">';
		html += 	  '</div>';
		html += 	  '<div class="form-group">';
		html += 	    '<label for="telefonousuario">Tu Telefono</label>';
		html += 	    '<input type="number" class="form-control" id="telefonousuario" value="'+data.result[0][3]+'">';
		html += 	  '</div>';
		html += 	  '<div class="form-group">';
		html += 	    '<label for="nombreEmpresa">El nombre de tu empresa</label>';
		html += 	    '<input type="text" class="form-control" id="nombreEmpresa" value="'+data.result[0][4]+'">';
		html += 	  '</div>';
		html += 	  '<button type="submit" class="btn btn-primary" id="actualizarPersona">Actualizar</button>';
		html += 	'</form>';

		$("#ConfiguracionDatos").html(html);

		$("#actualizarPersona").off("click").on("click", actualizarPersona);	
	}
	});	

	
}

function actualizarPersona(){
	var new_nombre = $("#nombreusuario").val();
	var new_apellido = $("#apelldiousuario").val();
	var new_telefono = $("#telefonousuario").val();
	var new_nom_empresa = $("#nombreEmpresa").val();

	var json = {'accion':'actualizarPersona',
				'usuario':localStorage['id_persona'],
				'nombre':new_nombre,
				'apellido':new_apellido,
				'telefono':new_telefono,
				'nombre_empresa':new_nom_empresa
			};

	$.ajax({
		type: "POST",
		dataType: "Json",
		data: json,
		url: "../controllers/persona_controlador.php",
		success:function(data){
			alert(data.result);
		}
	});
}

function datoscuenta(){

	var json = {'accion':'actualizar_datos_cuenta', 'usuario':localStorage['usuario']};
	
	$.ajax({
		type: "POST",
		dataType: "Json",
		data:json,
		url: "../controllers/usuario_controlador.php",
		success:function(data){
			var html="";
			html += 	'<div class="col-xs-4"><img src="files/'+data.result[0]["foto_perfil"]+'" class="user-image" alt="User Image" style="width: 100%; margin: 3em;"></div>'
			html += 	'<form class="col-xs-4 col-xs-offset-2" id="formulario_editar_foto"  enctype="multipart/form-data"  method="POST"  >';
			html += 	  '<h4>Cambia los dato de tu cuenta, tu contraseña y tu imagen de usuario..!</h4>';
			html += 	  '<div class="form-group">';
			html += 	    '<label for="contra1">Contraseña</label>';
			html += 	    '<input name="campo_password" type="password" class="form-control" id="contra1" value="'+data.result[0][1]+'">';
			html += 	  '</div>';	
			html += 	  '<div class="form-group">';
			html += 	    '<label for="contra2">Rescribir contraseña</label>';
			html += 	    '<input name="campo_confirm_password"  type="password" class="form-control" id="contra2" value="'+data.result[0][1]+'">';
			html += 	  '</div>';				
			html += 	  '<div class="form-group">';
			html += 	    '<label for="nombreEmpresa">Imagen de usuario</label>';
			html += 	    '<input type="hidden" class="form-control" name="campo_username" value="'+data.result[0]["nombre_usuario"]+'">';
			html += 	    '<input type="hidden" class="form-control" name="accion" value="editar_perfil_foto">';
			html += 	    '<input type="file" name="foto_usuario" class="form-control" >';
			html += 	  '</div>';
			html += 	  '<input type="submit" class="btn btn-primary" value="Actualizar cuenta">';
			html += 	'</form>';

			$("#ConfiguracionDatos").html(html);
			$("#actualizar_cuenta").off("click").on("click", actualizar_cuenta);
			$("#formulario_editar_foto").submit(editar_perfil_foto);

		}
	});
	
}

function actualizar_cuenta(){
	var con1 = $("#contra1").val();
}

function editar_perfil_foto(event){
	event.preventDefault();
	var datosFormulario = new FormData($("#formulario_editar_foto")[0]);

	$.ajax({
		url: '../controllers/usuario_controlador.php',
		type: 'POST',
		data: datosFormulario,
		contentType: false,
		processData: false,
		success: function(datos){
			var datosRespuesta = String(datos).split("#&#");
			//alert("Pos 0: "+datosRespuesta[0]);

			localStorage['foto_perfil'] = datosRespuesta[2];
			$('.user-image').attr("src","files/"+localStorage['foto_perfil']);
			
			if(datosRespuesta[0].match("Ok")){
				swal("Actualizado correctamente");
				localStorage['foto_perfil'] = datosRespuesta[2];
				$('.user-image').attr("src","files/"+localStorage['foto_perfil']);
			}else{
				alert("Servidor:"+datos);
			}

		},
		error: function(datos){
			console.log(datos);
		}
	});

}

function eliminarCuenta(){	
		
		var html="";

		html += 	'<form class="col-xs-4 col-xs-offset-4">';
		html += 	  '<h4>Una vez elimines la cuneta te olvidaras de todo y te tocara crear una nueva..!</h4>';
		html += 	  '<div class="form-group">';
		html += 	    '<label for="usuario">usuario</label>';
		html += 	    '<input type="text" class="form-control" id="usuario">';
		html += 	  '</div>';	
		html += 	  '<div class="form-group">';
		html += 	    '<label for="contrasena">Contraseña</label>';
		html += 	    '<input type="password" class="form-control" id="contrasena">';
		html += 	  '</div>';					
		html += 	  '<button type="submit" class="btn btn-danger" id="eliminar_cuenta">Eliminar cuenta</button>';
		html += 	'</form>';

		$("#ConfiguracionDatos").html(html);

		$("#eliminar_cuenta").off("click").on("click", eliminar_cuenta);
	}

	function eliminar_cuenta(e){
		e.preventDefault();
		var usuario = $("#usuario").val();
		var contrasena = $("#contrasena").val();

		var json = {'accion':'eliminar_cuenta', 'usuario':usuario, 'contrasena':contrasena, 'id_usuario':localStorage['id_persona']};

		$.ajax({
			type: "POST",
			dataType: "Json",
			data: json,
			url: "../controllers/usuario_controlador.php",
			success:function(data){

				if (data.status == 'ok'){					
					swal('Vuelve pronto');
					cerrar();
				}

			}
		});
	}

function actualizar_cargo(){
	
	var json={
		'accion':'actualizar_cargo',
		'nombre':$('#nuevo_tipo').val(),
		'id':$('#nuevo_tipo').attr('data_id')
	};

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/cargo_controlador.php',
		success:function(data){
			//swal(data);
			$('#exampleModal2').modal('hide');
			show_view_cargos();
		},
		error:function(data){
			console.log(data);
		}
	});
}

function show_view_cargos(){
	
	

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
				$('#vista_sin_Cargos').attr('hidden','true');
				$('#tabla_cargos').removeAttr('hidden');
				$('.menu_dia').addClass("treeview");
				$('.mensaje_trabajador').attr('hidden','true');
				$('.show_info').attr('hidden','true');
				$('#nivel').html("Cargos");
				$('.vista_encargados').attr('hidden','true');
				$('.mensaje_encargados').attr('hidden','true');
				$('.tabla_terrenos').attr('hidden','true');
				$('.tabla').attr('hidden','true');

				$('.opciones_perfil').attr('hidden','true');
				$("#ConfiguracionDatos").attr('hidden','true');
				var i=0;
				var html="";
				
				
				while(i<data.resultado.length){
					html+="<tr>";
					html+="<td value="+data.resultado[i][0]+">"+data.resultado[i][0]+"</td>";
					html+="<td class='nombre_actual' value="+data.resultado[i][0]+">"+data.resultado[i][1]+"</td>";
					html +=	'<td><button data_id='+data.resultado[i][0]+'  class="btn btn-danger borrar_cargo" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
					html +=	'<button data_id='+data.resultado[i][0]+'   class="btn btn-success editar_cargo" type="submit" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
					html+="</tr>";
					i++;
				}

				
				
				$("#ver_cargos").html(html);
				$('.registrar_cargo').off('click').on('click',registrar_cargo);

				$('.editar_cargo').off('click').on('click',function(){
					$('#nuevo_tipo').val($(this).parent().siblings('.nombre_actual').html());
					$('#nuevo_tipo').attr('data_id',$(this).attr('data_id'));

				});

				$('.borrar_cargo').off('click').on('click',function(){
					var opcion=confirm("Estas seguro de eliminar el cargo?");
					if(opcion){
						var json={
							'accion':'eliminar_cargo',
							'id_cargo':$(this).attr('data_id')
						};

						$.ajax({
							type:'POST',
							dataType:'Json',
							data:json,
							url:'../controllers/cargo_controlador.php',
							success:function(data){
								swal(data);
								show_view_cargos();
							}
						})
					}
					
				})

				

				$('#example3').DataTable().ajax.reload();
				$(function(){

				  $('#example3').DataTable(
				  	{
				  				    "language" :{
				  						    "sProcessing":     "Procesando...",
				  						    "sLengthMenu":     "Mostrar _MENU_ registros",
				  						    "sZeroRecords":    "No se encontraron resultados",
				  						    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				  						    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				  						    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				  						    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				  						    "sInfoPostFix":    "",
				  						    "sSearch":         "Buscar:",
				  						    "sUrl":            "",
				  						    "sInfoThousands":  ",",
				  						    "sLoadingRecords": "Cargando...",
				  						    "oPaginate": {
				  						        "sFirst":    "Primero",
				  						        "sLast":     "Último",
				  						        "sNext":     "Siguiente",
				  						        "sPrevious": "Anterior"
				  						    },
				  						    "oAria": {
				  						        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				  						        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				  						    }
				  					}	    		    
				  				});
				});
			}else if(data.estado=="err"){
				//Mostrar si no hay Cargos!

				$('#vista_sin_Cargos').removeAttr('hidden');
				$('.menu_dia').addClass("treeview");
				$('.mensaje_trabajador').attr('hidden','true');
				$('.show_info').attr('hidden','true');
				$('#nivel').html("Cargos");
				$('.vista_encargados').attr('hidden','true');
				$('.mensaje_encargados').attr('hidden','true');
				$('.tabla_terrenos').attr('hidden','true');
				$('.tabla').attr('hidden','true');

				//alert(data.resultado);
			}else{
				//alert("nada");			
			}	
		}
	});


}


function cancelarDia(){
	if (confirm("¿Deseas CANCELAR dia?. Si lo haces se perdera todos los registros referentes al dia de trabajo de hoy!")) {
       var json={
       		'accion':'cancelarDia',
       		'fecha':localStorage['fecha']
       	};

       	$.ajax({
       		type:'POST',
       		dataType:'json',
       		data:json,
       		url:'../controllers/controlador_registro_dia.php',
       		success:function(data){
       			swal(data);
       			show_view_dashboard();
       		}
       	});
       	
       	localStorage['dia']="no";
       	$('.menu_dia').removeClass("treeview");
       	$('.menu_dia_hover').removeClass("treeview-menu");
       	$('.menu_dia_hover').hide();
       	

    } 
        
}


function finalizarDia(){
	localStorage['dia']="no";
	$('.menu_dia').removeClass("treeview");
	$('.menu_dia_hover').removeClass("treeview-menu");
	$('.menu_dia_hover').hide();


	var json={
		'accion':'finalizarDia',
		'fecha':localStorage['fecha'],
		'id_terreno':localStorage['id_terreno']
	};

	$.ajax({
		type:'POST',
		dataType:'json',
		data:json,
		url:'../controllers/controlador_registro_dia.php',
		success:function(data){
			swal("Dia Terminado con Exito");
		}
	});

	show_view_dashboard();

}

function hacerPago(){
	var cantidad=0,id;
	id_trabajador=$('#trabajador').attr("data_id");
	cantidad=$('#cantidad').val();
	
	var json={
		'accion':'insert',
		'id_trabajador':id_trabajador,
		'cantidad_pago':cantidad,
		'fecha':localStorage['fecha'],
		'nombre_usuario':localStorage['usuario']
	};

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_pago_trabajadores.php',
		success:function(data){
			swal(data.result);
			consultarPagosTrabajadores();
		}
	});

}

function realizarPagosTrabajadores(){
	var Json={
			'accion':'mostrar_trabajadores_por_terreno_pagos',
			'id_terreno':localStorage['id_terreno'],
			'fecha':localStorage['fecha']
	};
	$.ajax({
		type:"POST",
		data:Json,
		dataType: "Json",
		url:"../controllers/controller_asignar_trabajador_a_terreno.php",
		success:function(data){
			//console.log(data);
			
			if(data.estado=="ok"){
					var html="";
					//console.log(data);
					var i=0;
					while(i<data.resultado.length){
						html+='<tr>';
						html+=' <td class="id_trabajador_Asistencia">'+data.resultado[i][0]+'</td>';
						html+= '<td class="nombre">'+data.resultado[i]['nombres']+'</td>';
						html+= '<td class="apellido">'+data.resultado[i]['apellidos']+'</td>';
						
						if(data.listaTrabajadoresPagados.includes(data.resultado[i][0])){
							
						}else{
							html+= '<td><button  data_id='+data.resultado[i][0]+' class="btn btn-success realizarPago" data-toggle="modal" data-target="#ModalRealizarPagos" style="Width:15%; padding:initial"><span class="fa fa-usd" aria-hidden="true"></span></button></td>';
						}
						
						


						html+='</tr>';
						i++;
					}

					$('#lista_trabajadores_pagos').html(html);

					$('.realizarPago').off('click').on('click',function(){
						$("#ModalPagoTrabajadores").modal("hide");
						var nombre_trabajador=$(this).parent().siblings('.nombre').html();
							var apellido_trabajador=$(this).parent().siblings('.apellido').html();
							var id_trabajador=$(this).attr('data_id');
							
							$('.nombreTrabajador').html(nombre_trabajador+" "+apellido_trabajador);
							$('.nombreTrabajador').attr('data_id',id_trabajador);

						

					})

					

			}else if(data.estado=="err"){
					html+="<tr><td>"+data.resultado+"</td></tr>";
					$('#lista_trabajadores_asistencia').html(html);
			}
		}	
	});
}

function ver_informacion_trabajador_2(){
	/*
	var nombre_trabajador=$(this).parent().siblings('.nombre').html();
	var apellido_trabajador=$(this).parent().siblings('.apellido').html();*/
	var id_trabajador=$(this).attr('data_id');
	
	//$('.nombreTrabajador').html(nombre_trabajador+" "+apellido_trabajador);
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
					$('#ver_informacion_trabajador_2').html(html);
					$('.consultarPagos').off('click').on('click',consultarPagos);

				}



			});
		}
	})
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
			swal(data);
			
		}

	})
}

function show_view_managers(){
	$('#nivel').html("Encargados");
	$('#vista_sin_Cargos').attr('hidden','true');
	var json={
		'accion':'buscarEncargados'
	};

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_encargado.php',
		success:function(data){
			//console.log(data);
			if(data.estado=="ok"){
				$('#tabla_cargos').removeAttr('hidden');
				$('.mensaje_encargados').attr('hidden','true');
				$('.dia').attr('hidden','true');
				$(".tabla_terrenos").attr("hidden","true");
				$(".show_info").attr("hidden","true");
				$('.mensaje_trabajador').attr('hidden','true');
				$('.caja_mas').attr('hidden','true');
				$('.SearchByNamet').attr('hidden','true');
				$('.tabla').attr('hidden','true');
				$('.vista_encargados').removeAttr('hidden');
				$('#tabla_cargos').attr('hidden','true');
				$('#tabla_encargados').removeAttr("hidden");
				$('.opciones_perfil').attr('hidden','true');
				$("#ConfiguracionDatos").attr('hidden','true');

				var i=0;
				var html="";

				while(i<data.resultado.length){
					html+="<tr>";
					html+="<td class='"+data.resultado[i]['id_persona']+"'>"+data.resultado[i]['id_persona']+"</td>";
					html+="<td class='"+data.resultado[i]['nombres']+"'>"+data.resultado[i]['nombres']+"</td>";
					html+="<td class='"+data.resultado[i]['apellidos']+"'>"+data.resultado[i]['apellidos']+"</td>";
					html+="<td class='"+data.resultado[i]['telefono']+"'>"+data.resultado[i]['telefono']+"</td>";
					html+="<td class='"+data.resultado[i]['nombre_usuario']+"'>"+data.resultado[i]['nombre_usuario']+"</td>";
					html+="<td class='"+data.resultado[i]['nombre_usuario']+"'><button data_id="+data.resultado[i]['nombre_usuario']+"   class='btn btn-success asignar_encargado' type='submit' data-toggle='modal' data-target='#modalAsignarEncargado' data-whatever='@mdo'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></td>";
					i++;

					
				}

				$('#ver_encargados').html(html);

				$('.asignar_encargado').off('click').on('click',function(){
					var encargado=$(this).attr('data_id');
					var json={
						'nombre_usuario':localStorage['usuario'],
						'accion':'buscar_todos_terrenos_2',
						'encargado':encargado
					};
					$.ajax({
						type:"POST",
						dataType:"Json",
						url:'../controllers/terreno_controlador.php',
						data:json,
						success:function(data){
							var html="";
							var i=0;
							//Muestra la lista de terrenos en los que puede empezar dia
							if(data.status=="ok"){
								//console.log(data);
								while(i<data.result.length){
									html+="<tr>";
									html+='<td>'+data.result[i]['id']+'</td>';
									html+='<td>'+data.result[i]['nombre']+'</td>';
									if(data.listaTerrenosAsignados.includes(data.result[i][0])){
										html+='<td><input type="checkbox" data-id="'+data.result[i][0]+'" class="check_add_terreno asignarEncargado" checked></td>';
									}else{
										html+='<td><input type="checkbox" data-id="'+data.result[i][0]+'" class="check_add_terreno asignarEncargado"></td>';
									}
															
									i++;
								}
								$('.terrenos').html(html);



								$('.asignarEncargado').off('click').on('click',function(){
									if ($(this).is(':checked')) {
										//alert("Asignar");
										json={
											'accion':'Insertar',
											'id_terreno':$(this).attr('data-id'),
											'encargado':encargado
										};
										//console.log(json);
										$.ajax({
											type:'POST',
											dataType:'Json',
											data:json,
											url:'../controllers/controlador_asignar_encargado_a_terreno.php',
											success:function(data){
												if(data.status=="ok"){
													swal(data.result);
												}else{
													swal(data.result);
												}
											}
										});

									}else{
										//alert("Quitar del terreno");

										json={
											'accion':'Eliminar',
											'id_terreno':$(this).attr('data-id'),
											'encargado':encargado
									
										};

										$.ajax({
											type:'POST',
											dataType:'Json',
											data:json,
											url:'../controllers/controlador_asignar_encargado_a_terreno.php',
											success:function(data){
												if(data.status=="ok"){
													swal(data.result);
												}else{
													swal(data.result);
												}
											}
										});
										
									}
								})

							}else if(data.status=="err"){
								$('#lista_terrenos').html(data.result);
							}
							
						}


					});
				})

				$('#example4').DataTable().ajax.reload();
				$(function () {
				  $('#example4').DataTable({
			    "language" :{
					    "sProcessing":     "Procesando...",
					    "sLengthMenu":     "Mostrar _MENU_ registros",
					    "sZeroRecords":    "No se encontraron resultados",
					    "sEmptyTable":     "Ningún dato disponible en esta tabla",
					    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					    "sInfoPostFix":    "",
					    "sSearch":         "Buscar:",
					    "sUrl":            "",
					    "sInfoThousands":  ",",
					    "sLoadingRecords": "Cargando...",
					    "oPaginate": {
					        "sFirst":    "Primero",
					        "sLast":     "Último",
					        "sNext":     "Siguiente",
					        "sPrevious": "Anterior"
					    },
					    "oAria": {
					        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					    }
				}	    		    
			});
				  
				});



			}else if(data.estado=="No"){
				$('#tabla_encargados').attr('hidden','true');
				$('#tabla_cargos').attr('hidden','true');
				$('.dia').attr('hidden','true');
				$(".tabla_terrenos").attr("hidden","true");
				$(".show_info").attr("hidden","true");
				$('.mensaje_trabajador').attr('hidden','true');
				$('.caja_mas').attr('hidden','true');
				$('.SearchByNamet').attr('hidden','true');
				$('.tabla').attr('hidden','true');
				$('.vista_encargados').removeAttr('hidden');
				$('.mensaje_encargados').removeAttr('hidden');
			}else if(data.estado="err"){
				swal(data.resultado);
			}
		}
	});




	
	
}

function show_view_day(){
	$('#vista_sin_Cargos').attr('hidden','true');
	
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
				//Muestra la lista de terrenos en los que puede empezar dia
				if(data.status=="ok"){
					while(i<data.result.length){
						html+="<tr>";
						html+='<td id="terreno_id">'+data.result[i]['id']+'</td>';
						html+='<td>'+data.result[i]['nombre']+'</td>';
						html+='<td><input type="checkbox" data-id="'+data.result[i][0]+'" class="check_add_terreno escoger_terreno_dia"></td>';						
						i++;
					}
					$('#lista_terrenos').html(html);




				}else if(data.status=="err"){
					$('#lista_terrenos').html(data.result);
				}
				//Cuando le den asignar a cualquiera de los terrenos de la lista
				$('.escoger_terreno_dia').on('click',empezarDia);
			}


		})
	}else{
		if(localStorage['dia']=="ok"){
			//var opcion=confirm("Estas seguro de empezar un nuevo dia de trabajo?");
			//if(opcion==true){

				$('.menu_dia').addClass("treeview");
				$('.menu_dia_hover').addClass('treeview-menu');
				$('.mensaje_trabajador').attr('hidden','true');
				$('.show_info').attr('hidden','true');
				$('.dia').removeAttr('hidden');
				$('#nivel').html("Empezar Dia");
				$('.vista_encargados').attr('hidden','true');
				$('.mensaje_encargados').attr('hidden','true');
				$('.tabla_terrenos').attr('hidden','true');
				$('.tabla').attr('hidden','true');
				$('.mas').attr('hidden','true');
				$('#tabla_cargos').attr('hidden','true');

				$('.opciones_perfil').attr('hidden','true');
				$("#ConfiguracionDatos").attr('hidden','true');


				
				consultarPagosTrabajadores();
				consultarAsistenciasTrabajadores();

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
		$('.opciones_perfil').attr('hidden','true');
		$("#ConfiguracionDatos").attr('hidden','true');
		}
	}
}

function consultarAsistenciasTrabajadores(){
	var json={
		'accion':'consultarCantidadAsistenciaByFecha',
		'fecha':localStorage['fecha']
	};
	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_registro_asistencia.php',
		success:function(data){
			//Hacer Otro ajax para saber la cantidad de trabajadores en ese terreno y hacer el %
			json={
				'accion':'consultarCantidadTrabajadores',
				'id_terreno':localStorage['id_terreno']
			};

			$.ajax({
				type:'POST',
				dataType:'json',
				data:json,
				url:'../controllers/controller_asignar_trabajador_a_terreno.php',
				success:function(data_2){
					if(data_2.status=="ok"){
						var porcentaje=(data*100)/data_2.result;

						$('#asistencia_trabajadores').val(porcentaje);
						$("#asistencia_trabajadores").trigger('change');
					}else if(data_2.status=="err"){
						swal("El Terreno no tiene trabajadores, NO deberia empezar ningun dia sin almenos 1 trabajador");
					}
				}
			})
			

		}
	});
}

function consultarPagosTrabajadores(){

	var json={
		'accion':'consultarPagosByFecha',
		'fecha':localStorage['fecha']
	};
	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_pago_trabajadores.php',
		success:function(data){
			
			json={
				'accion':'consultarCantidadTrabajadores',
				'id_terreno':localStorage['id_terreno']
			};

			$.ajax({
				type:'POST',
				dataType:'json',
				data:json,
				url:'../controllers/controller_asignar_trabajador_a_terreno.php',
				success:function(data_2){
					if(data_2.status=="ok"){
						var porcentaje=(data*100)/data_2.result;

						$('#pagos_realizados').val(porcentaje);
						$("#pagos_realizados").trigger('change');
					}else if(data_2.status=="err"){
						swal("El Terreno no tiene trabajadores, NO deberia empezar ningun dia sin almenos 1 trabajador");
					}
				}
			})

			

		}
	});
}

function cerrar(){
	localStorage['usuario']="nada";
	localStorage['pass']="";
	localStorage['tipo_usuario']="";
	localStorage['id_persona']="";
	localStorage['foto_perfil']="";
	localStorage['dia']="no";
	localStorage['fecha']="";
	localStorage['consultarTrabajadoresAsistencia'] = true;

	location.href="http://localhost/Proyecto%20Final/";
}

function comprobarLogin(){
	
	if(localStorage['usuario']=="nada" || localStorage['usuario']==undefined){
		localStorage['usuario']="nada";
		location.href="http://localhost/Proyecto%20Final/";
	}else{
		$('.user-image').attr("src","files/"+localStorage['foto_perfil']);
		$('.nombre_usuario').html(localStorage['usuario']);
		$('.tipo_usuario').html(localStorage['tipo_usuario']);
		

	}
}

//Muestra La vista de Trabajadores y esconde las demas vistas 
function show_view_workers() {

	$('#vista_sin_Cargos').attr('hidden','true');
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.dia').attr('hidden','true');
	$(".tabla_terrenos").attr("hidden","true");
	$('.ver_informacion_trabajador').off('click').on('click',ver_informacion_trabajador);
	$('#tabla_cargos').attr('hidden','true');

	$('.opciones_perfil').attr('hidden','true');
	$("#ConfiguracionDatos").attr('hidden','true');
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
				//console.log(data);
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
						html +=		'<td class="cargo_empleado" data_id='+data.resultado[i][5]+'>'+data.resultado[i][7]+'</td>';
						html +=		'<td><button data_id='+data.resultado[i][0]+'  class="btn btn-danger borrar_trabajador" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
						html +=		'<button data_id='+data.resultado[i][0]+'   class="btn btn-success editar_trabajador" type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
						html +=		'<button  data_id='+data.resultado[i][0]+' class="btn btn-info ver_informacion_trabajador" type="submit" data-toggle="modal" data-target="#bs-example-modal-lg"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>';
						html +=	'</tr>';

						
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

					$('.ver_informacion_trabajador').off('click').on('click',ver_informacion_trabajador);
					$('#example2').DataTable().ajax.reload();
					$(function(){
					  $('#example2').DataTable({
			    		
			    			"language" :{
					    "sProcessing":     "Procesando...",
					    "sLengthMenu":     "Mostrar _MENU_ registros",
					    "sZeroRecords":    "No se encontraron resultados",
					    "sEmptyTable":     "Ningún dato disponible en esta tabla",
					    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					    "sInfoPostFix":    "",
					    "sSearch":         "Buscar:",
					    "sUrl":            "",
					    "sInfoThousands":  ",",
					    "sLoadingRecords": "Cargando...",
					    "oPaginate": {
					        "sFirst":    "Primero",
					        "sLast":     "Último",
					        "sNext":     "Siguiente",
					        "sPrevious": "Anterior"
					    },
					    "oAria": {
					        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					    	}
						}	    		    
					});
					  
					});
					
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
			//console.log(terrenos_asginados);
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
	$('#bs-example-modal-lg_2').modal('hide');
	
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
			swal("El trabajador fue actualizado");
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
			show_view_workers();
			swal("El trabajador fue eliminado");			
		}
	});


}

function show_view_dashboard(){

	$("#nivel").html("Inicio");
	$('#vista_sin_Cargos').attr('hidden','true');
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.dia').attr('hidden','true');
	$(".caja_mas").attr("hidden","true");
	$(".SearchByNamet").attr("hidden","true");
	$(".tabla").attr("hidden","true");
	$(".show_info").removeAttr("hidden");
	$(".mensaje_trabajador").attr("hidden","true");
	$(".tabla_terrenos").attr("hidden","true");
	$('#tabla_cargos').attr('hidden',"true");
	$('#EditarPerfil').attr('hidden','true');
	$('.opciones_perfil').attr('hidden','true');
	$("#ConfiguracionDatos").attr('hidden','true');

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
		url:"../controllers/controller_administrador_encargado.php",
		success:function(data){
			$('.cantidad_encargados').html(data);
		}
	})


	$.ajax({
		type:"POST",
		data:json_0,
		dataType:"Json",
		url:"../controllers/controlador_registro_dia.php",
		success:function(data){
			$('.cantidad_dias').html(data);
		}
	})
}

//Muestra la vista de Terrenos y esconde las demas vistas
function show_view_ground(){
	$('#vista_sin_Cargos').attr('hidden','true');
	$('.vista_encargados').attr('hidden','true');
	$('.mensaje_encargados').attr('hidden','true');
	$('.dia').attr('hidden','true');
	$("#nivel").html("Terrenos");
	$(".show_info").attr("hidden","true");
	$(".SearchByNamet").attr("hidden","true");
	$(".mensaje_trabajador").attr("hidden","true");
	$(".tabla").attr("hidden","true");
	$(".tabla_terrenos").removeAttr("hidden");
	$('#tabla_cargos').attr('hidden','true');

	$('.opciones_perfil').attr('hidden','true');
	$("#ConfiguracionDatos").attr('hidden','true');

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
			//console.log(data); 
			var i = 0;

			var verterrenos ='';

			while(i<data.result.length){
				if(data.result.length>1){
					verterrenos +='<tr>';
					verterrenos += '<td class="nombre" id="'+data.result[i]['id']+'">'+data.result[i][1]+'</td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-danger eliminar_terreno" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-primary editar_terreno" type="submit" data-toggle="modal" data-target="#ModalEditarTerreno"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
					verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-success asignar_trabajadores" type="submit" data-toggle="modal" data-target="#ModalAsignarTrabajadores"><span class="glyphicon glyphicon-check"></span></button></td>';
					verterrenos += '</tr>';
				}else{
					if(data.result.length==1){
						verterrenos +='<tr>';
						verterrenos += '<td class="nombre" id="'+data.result[i]['id']+'">'+data.result[i][1]+'</td>';
						verterrenos += '<td  id="'+data.result[i]['id']+'"><button  disabled class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';
						verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-primary editar_terreno" type="submit" data-toggle="modal" data-target="#ModalEditarTerreno"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>';
						verterrenos += '<td  id="'+data.result[i]['id']+'"><button  class="btn btn-success asignar_trabajadores" type="submit" data-toggle="modal" data-target="#ModalAsignarTrabajadores"><span class="glyphicon glyphicon-check"></span></button></td>';
						verterrenos += '</tr>';
					}					
				}
				i++;
			}
			$(".ver_terrenos").html(verterrenos);
			$(".eliminar_terreno").off('click').on("click",eliminar_terreno);
			$('.editar_terreno').off('click').on('click',editar_terreno);
			$('.asignar_trabajadores').off('click').on('click',asignar_trabajadores_terreno);

			$('#example1').DataTable().ajax.reload();
			$(function () {
			  $('#example1').DataTable({
			    "language" :{
					    "sProcessing":     "Procesando...",
					    "sLengthMenu":     "Mostrar _MENU_ registros",
					    "sZeroRecords":    "No se encontraron resultados",
					    "sEmptyTable":     "Ningún dato disponible en esta tabla",
					    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					    "sInfoPostFix":    "",
					    "sSearch":         "Buscar:",
					    "sUrl":            "",
					    "sInfoThousands":  ",",
					    "sLoadingRecords": "Cargando...",
					    "oPaginate": {
					        "sFirst":    "Primero",
					        "sLast":     "Último",
					        "sNext":     "Siguiente",
					        "sPrevious": "Anterior"
					    },
					    "oAria": {
					        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					    }
				}	    		    
			});
			});



		

		}
	});
}

function buscarTrabajadoresAsistencia(){
	//alert(localStorage['id_asistencia']);
	var json={
		'accion':'insertar_asistencia',
		'nombre_usuario':localStorage['usuario'],
		'fecha':localStorage['fecha']
	};
	//console.log(json);

	$.ajax({
		type:'POST',
		dataType:'Json',
		data:json,
		url:'../controllers/controller_asistencia.php',
		success:function(data){
			if(data.status=="ok"){
				localStorage['id_asistencia']=data.result;
				//alert(localStorage['id_asistencia']);
			}else if(data.status=="err"){
				//alert(data.result_2);
			}
		}
	})

	
	
	var Json={
			'accion':'mostrar_trabajadores_por_terreno_asistencia',
			'id_terreno':localStorage['id_terreno'],
			'id_asistencia':localStorage['id_asistencia']
	};
	//console.log(Json);

	$.ajax({
			type:"POST",
			data:Json,
			dataType: "Json",
			url:"../controllers/controller_asignar_trabajador_a_terreno.php",
			success:function(data){
				//console.log(data);
				
				if(data.estado=="ok"){
					var html="";
					//console.log(data);
					var i=0;
					while(i<data.resultado.length){
						html+='<tr>';
						html+=' <td class="id_trabajador_Asistencia">'+data.resultado[i][0]+'</td>';
						html+= '<td>'+data.resultado[i]['nombres']+'</td>';
						html+= '<td>'+data.resultado[i]['apellidos']+'</td>';
						if(data.listaTrabajadoresAsistieron.includes(data.resultado[i][0])){
							html+= '<td><input type="checkbox" data-id="'+data.resultado[i][0]+'" class="check_add_asistencia" checked></td>';
						}else{
							html+= '<td><input type="checkbox" data-id="'+data.resultado[i][0]+'" class="check_add_asistencia"></td>';
						}
						html+='</tr>';
						i++;
					}

					$('#lista_trabajadores_asistencia').html(html);


					$('.check_add_asistencia').off('click').on('click',function(){
						
						//var id_trabajador=$(this).siblings('.id_trabajador_Asistencia').html();
						//alert(localStorage['id_asistencia']);

						if ($(this).is(':checked')) {
							json={
								'accion':'Insertar',
								'fecha':localStorage['fecha'],
								'id_trabajador':$(this).attr('data-id'),
								'id_asistencia':localStorage['id_asistencia']
							};

						$.ajax({
							type:'POST',
							dataType:'Json',
							data:json,
							url:'../controllers/controller_registro_asistencia.php',
							success:function(data){
								//alert(data.result);

								consultarAsistenciasTrabajadores();

							}
						});

						}else{
							//alert("El trabajador no ha asistido");

							json={
								'accion':'Eliminar',
								'fecha':localStorage['fecha'],
								'id_trabajador':$(this).attr('data-id'),
								'id_asistencia':localStorage['id_asistencia']
							};

							$.ajax({
								type:'POST',
								dataType:'Json',
								data:json,
								url:'../controllers/controller_registro_asistencia.php',
								success:function(data){
									//alert(data.result);
									consultarAsistenciasTrabajadores();
								}
							});


						}
						


					});

					

				}else if(data.estado=="err"){
					html+="<tr><td>"+data.resultado+"</td></tr>";
					$('#lista_trabajadores_asistencia').html(html);
				}
			}

			
	});

}





function asignar_trabajadores_terreno(){
	var id_terreno=$(this).parent().siblings('.nombre').attr('id');
	var Json={
		'accion':'mostrar_trabajadores_para_asignar',
		'user':localStorage['usuario'],
		'id_terreno' : id_terreno
	};
	
	$.ajax({
		type:"POST",
		data:Json,
		dataType: "Json",
		url:"../controllers/controller_trabajador.php",
		success:function(data){
			//console.log(data.listaTrabajadoresAsignados);
			if(data.estado=="ok"){
				var html="";
				var i=0;
				while(i<data.resultado.length){
					html+='<tr>';
					html+=' <td>'+data.resultado[i]['id']+'</td>';
					html+= '<td>'+data.resultado[i]['nombres']+'</td>';
					html+= '<td>'+data.resultado[i]['apellidos']+'</td>';
					if(data.listaTrabajadoresAsignados.includes(data.resultado[i]['id'])){
						html+= '<td><input type="checkbox" data-id="'+data.resultado[i]['id']+'" class="check_add_trabajador" checked></td>';
					}else{
						html+= '<td><input type="checkbox" data-id="'+data.resultado[i]['id']+'" class="check_add_trabajador"></td>';
					}
					//html+= '<td><span class="fa fa-check-square-o asignar_trabajador"></span></td>';					
					
					html+='</tr>';
					i++;
				}

				$('#lista_trabajadores').html(html);
			}else if(data.estado=="err"){
				html+="<tr><td>"+data.resultado+"</td></tr>";
				$('#lista_trabajadores').html(html);
			}

			//Asginarmos ese trabajador al terreno en cuestion
			$('.check_add_trabajador').on('click',function(){

				if ($(this).is(':checked')) {
					json={
						'accion':'Insertar',
						'id_trabajador':$(this).attr("data-id"),
						'id_terreno':id_terreno
					};
					$.ajax({
						type:'POST',
						data:json,
						dataType:'json',
						url:'../controllers/controller_asignar_trabajador_a_terreno.php',
						success:function(data){
							//alert(data.result);
						}
					}); 

				}else{

					//alert("Se debe eliminar del terreno el trabajador");

					json={
						'accion':'Eliminar',
						'id_trabajador':$(this).attr('data-id'),
						'id_terreno':id_terreno
					};

					$.ajax({
						type:'POST',
						data:json,
						dataType:'json',
						url:'../controllers/controller_asignar_trabajador_a_terreno.php',
						success:function(data){
							//alert(data.result);
						}
					});


				}

				

			});
		},
		error:function(data){
			swal("Error mira la consola");
			//console.log(data);
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
			swal("Terreno Registrado correctamente.");
			show_view_ground();
			$('#nombre_terreno').val("");			
		}
	})
}

function eliminar_terreno(){

	swal({
	  title: "Quieres eliminar este terreno?",
	  text: "Una vez eliminado no podras recuperarlo!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {

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
	  					show_view_ground();
	  					swal("El terreno fue eliminado con exito !", {
	     				icon: "success",
	   					});	 

	  				}else if(data.status=="err"){
	  					swal("No se pudo eliminar el terreno");	  					  			
	  				}
	  				
	  			}
	  		});				
	  
	  } else {	    
	    swal("El terreno no ha sido eliminado!");	
	  }
	});


	
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
				show_view_ground();
				swal("Nombre del terreno actualizado con exito!");				
			}
		})
	})

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

	var nombre = $("#nombre_trabajador").val();
	var apellido = $("#apellido_trabajador").val();
	var telefono = $("#telefono_trabajador").val();
	
	var cargo = $(".cargo").val();

	var Json={
		'accion':'insert',
		'nombres':nombre,
		'apellidos':apellido,
		'telefono':telefono,
		'nombre_usuario':localStorage['usuario'],
		'id_cargo':cargo
	};

	$.ajax({
		type:"POST",
		data:Json,
		dataType:"Json",
		url:"../controllers/controller_trabajador.php",
		success: function (data) {
				$("#nombre_trabajador").val("");
				$("#apellido_trabajador").val("");
				$("#telefono_trabajador").val("");
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
					swal(data.result);
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
				swal(data.resultado);
			}else{
				swal("nada");			
			}	
		}
	});
}

function empezarDia(){

	if($(this).is(':checked')){

		var id_terreno=$(this).attr('data-id');
		localStorage['id_terreno']=id_terreno;
		

		var json={
			'accion':'consultarEstadoDia',
			'fecha':localStorage['fecha'],
			'id_terreno':localStorage['id_terreno']
		}

		$.ajax({
			type:'POST',
			dataType:'Json',
			data:json,
			url:'../controllers/controlador_registro_dia.php',
			success:function(data){
				if(data.resultado=="finalizado"){
					swal("ya se ha realizado un dia de trabajo ");
					localStorage['dia']="no";
				}else{
					localStorage['consultarTrabajadoresAsistencia'] = false;

					//Ocultamos el modal donde esta la lista 

					$('#modal-default').modal('hide');

					localStorage['dia']="ok";

					var f = new Date();
					var fecha=(f.getFullYear()+"-"+(f.getMonth() + 1 )+"-"+f.getDate());

					

					//Guardamos la fecha del dia en cuestion en una variable de session
					localStorage['fecha']=fecha;

					
					json={
						'accion':'comprobarDia',
						'fecha':fecha,
						'id_terreno':id_terreno
					};


					$.ajax({
						type:'POST',
						dataType:'Json',
						url:'../controllers/controlador_registro_dia.php',
						data:json,
						success:function(data){
							if(data.estado=="disponible"){
								json={
									'accion':'nuevoDia',
									'terreno_id':id_terreno,
									'nombre_usuario':localStorage['usuario'],
									'fecha':fecha
								};
								$.ajax({
									type:"POST",
									dataType:'Json',
									url:'../controllers/controlador_registro_dia.php',
									data:json,
									success:function(data){
										if(data.estado=="ok"){
											swal(data.resultado);
											$('.menu_dia').addClass("treeview");
											$('.menu_dia_hover').addClass('treeview-menu');
											$('.mensaje_trabajador').attr('hidden','true');
											$('.show_info').attr('hidden','true');
											$('.dia').removeAttr('hidden');
											$('#nivel').html("Empezar Dia");
											$('.vista_encargados').attr('hidden','true');
											$('.mensaje_encargados').attr('hidden','true');
											$('.tabla_terrenos').attr('hidden','true');
											$('.tabla').attr('hidden','true');
											$('.SearchByNamet').attr('hidden','true');
											$('.opciones_perfil').attr('hidden','true');
											$("#ConfiguracionDatos").attr('hidden','true');

											consultarPagosTrabajadores();
											consultarAsistenciasTrabajadores();
										}else
										swal(data.estado);
									}
								})
							}else{
								swal("Ya empezaron dia en este terreno");
								localStorage['dia']="no";
							}
						}

					});
				}
			}
		});
	}
	
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

