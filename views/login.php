<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Softcacol | Ingresar</title>
	
	<link rel="stylesheet" href="views/dist/css/bootstrap.min.css">
	<!-- Link Del Font Awesome -->
	<link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
	
	<!-- Mis Estilo -->
	<link rel="stylesheet" href="views/dist/css/Styles.css">
	
	<!-- Google Font -->
	<link rel="stylesheet"
	      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	
</head>
<body class="body_login">
	
	<!-- Menu de logo y nombre de la web -->
	<div class="container" style="margin-bottom: 3%; margin-top: 2%;">
		<div class="col-md-5">
			<a href="#" style="text-decoration: none;"><h2 style="color: white;">Bienvenido a Softcacol</h2></a>
		</div>
		
	</div>
	
	<!--Formulario de ingreso y registro-->

	<div class="container " style="margin-top: -5px;">

		<div class="col-md-5 registros">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="color: white;">Ingresar</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: white;">Registrarse</a>
			  </li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
			  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			  	<!--.............................................................. Login .....................................................................-->
			  	<form class="form">
			  	  <div class="form-group">
			  	    <label for="exampleInputEmail1">Nombre de Usuario</label>
			  	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre de Usuario">
			  	  </div>
			  	  <div class="form-group">
			  	    <label for="exampleInputPassword1">Contraseña</label>
			  	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
			  	  </div>
			  	  <div class="form-group form-check">
			  	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			  	    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
			  	  </div>
			  	  <button type="submit" class="btn btn-success" id="entrar">Entrar</button>
			  	</form>
			  </div>
			  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			  	<!--.............................................................. Registro ..................................................................-->
			  	<form class="form">
			  	  <div class="form-row">
			  	    <div class="form-group col-md-6">
			  	      <label for="inputNombre">Nombres</label>
			  	      <input type="text" class="form-control" id="inputNombre" placeholder="Nombres">
			  	    </div>
			  	    <div class="form-group col-md-6">
			  	      <label for="inputApellidos">Apellidos</label>
			  	      <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos">
			  	    </div>
			  	  </div>
			  	  <div class="form-group">
			  	    <label for="inputUsuario">Nombre de Usuario</label>
			  	    <input type="text" class="form-control" id="inputUsuario" placeholder="Nombre de Usuario"/>
			  	  </div>
			  	  <div class="form-group">
			  	    <label for="inputPass">Contraseña</label>
			  	    <input type="password" class="form-control" id="inputPass" placeholder="*****">
			  	  </div>
			  	  <div class="form-row">
			  	    <div class="form-group col-md-6">
			  	      <label for="inputTelefono">Telefono</label>
			  	      <input type="text" class="form-control" id="inputTelefono" placeholder="Su numero de Telefono">
			  	    </div>
			  	    <div class="form-group col-md-6">
			  	      <label for="inputTerreno">Nombre del Terreno</label>
			  	      <input type="text" name="terreno" id="inputTerreno" class="form-control " placeholder="Asigna un nombre"> 
			  	
			  	    </div>
			  	  </div>
			  	  <!--
			  	  <div class="form-group">
			  	    <div class="form-check">
			  	      <input class="form-check-input" type="checkbox" id="gridCheck">
			  	      <label class="form-check-label" for="gridCheck">
			  	       	<span class="terminos">Acepto Terminos y condiciones</span>
			  	      </label>
			  	    </div>
			  	  </div>-->
			  	  <button type="button" class="btn btn-success" id="registrarse">Registrarse</button>
			  	</form>

			  </div>
			</div>
		</div>
	</div>

	<div class="footer-bottom pie_pagina col-md-12">
        <div class="container col-md-12"">
            <p class="pull-left col-md-10" style="display: inline-block;"> Copyright © 2018. All right reserved. adsi2018@misena.edu.co </p> 
            <img src="views/dist/img/logo_1.png" class="col-md-1"> 
            <img src="views/dist/img/logo_sena.png" class="col-md-1" style="width: auto; height: 50px;">         
        </div>
    </div>
      <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/dist/js/bootstrap.min.js"></script>

  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- My Script -->
  <script src="views/dist/js/LoginScript.js"></script>


</body>
</html>		