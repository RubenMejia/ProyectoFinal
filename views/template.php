<!DOCTYPE html>

<html>
<head>

  <!-- Metas y Title -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel De Control</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Todos Los Link Que Utilizo -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Link Del Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Link Del Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Estilos Del Tema -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- Color Del Skin De La Aplicacion -->
  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
  <!-- Mis Estilo -->
  <link rel="stylesheet" href="dist/css/Styles.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SOFT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b >SOFT</b>CACOL</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle">  
            <i class="fa fa-address-card" aria-hidden="true"></i> 
            Acerca De Nosotros
           </a>
          </li>
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/logo_1.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs nombre_usuario">Nombre de usuario</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/logo_1.png" class="img-circle user-image" alt="User Image">
                <p class="nombre_usuario" style="margin-bottom: -1px;">
                  Nombre de usuario 
                </p>
                <small style="color: #D8D8D8;" class="tipo_usuario">Perfil De Usuario</small>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Editar Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat cerrar_sesion">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Menu Lateral -->
  <aside class="main-sidebar" >

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/logo_1.png" class="img-circle user-image" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="nombre_usuario">Nombre de usuario</p>
          <!-- Status 

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li>
          <a href="#" class="text-center mostrar_terrenos" >
            <i class="fa fa-map-marker icono" aria-hidden="true"></i>
             <br><span class="icono "> Terrenos </span>
          </a>
        </li>
        
        <li>
          <a href="#" class="text-center"> 
            <i class="fa fa-users icono" aria-hidden="true"></i>
            <br><span class="icono"> Encargados </span>
          </a>
        </li>
        
        <li class="opcion_trabajadores" >
          <a href="#" class="text-center">
            <i class="fa fa-wrench icono" aria-hidden="true"></i>
            <br>
            <span  class="icono"> Trabajadores </span>
          </a>
        </li>

        <li class="treeview menu_dia">
          <a href="#" class="text-center empezarDia">
            <i class="fa fa-pie-chart"></i>
            <span>Empezar Dia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-check-square-o"></i> Asistencia</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-usd"></i> Pago a Trabajadores</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-times"></i> Cancelar Dia</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-check"></i> Finalizar Dia</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

  <!-- Caja Que Contiene Todo Lo de Nuestro codigo-->
  
  <div class="content-wrapper">
    <!-- Mantener !-->
      <section class="content-header">
        <h1>
          Panel De Control
          <small>Tu Informacion General Aparecera aqui</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#" class="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active" id="nivel" >Panel de Control</li>
        </ol>
      </section>
    <!-- Fin Mantener !-->

    <!-- Modals -->

      <div class="modal fade " id="modal-default" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">x</span></button>
                    <h4 class="modal-title">Mis Terrenos</h4><span>Escoge el terreno en el que quieres empezar dia</span>
                  </div>
                  <div class="modal-body ">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Asignar</th>
                        </tr>
                        <tr>
                          <td>183</td>
                          <td>John Doe</td>
                          <th><span class="fa fa-check-square-o"></span></th>
                        </tr>
                        <tr>
                          <td>219</td>
                          <td>Alexander Pierce</td>
                          <th><span class="fa fa-check-square-o"></span></th>
                        </tr>
                        <tr>
                          <td>657</td>
                          <td>Bob Doe</td>
                          <th><span class="fa fa-check-square-o"></span></th>
                        </tr>
                        <tr>
                          <td>175</td>
                          <td>Mike Doe</td>
                          <th><span class="fa fa-check-square-o"></span></th>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Escoger</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
      </div>
    <!-- /.modal -->  


    <br/>
    <!-- ***********************Inicio Vista Trabajadores***************-->
      <div class="col-md-3 col-md-offset-9">
        <form method="get" class="SearchByNamet" hidden="true">
          <div class="input-group">
            <input type="text" class="form-control SearchByName" placeholder="Que Deseas Buscar...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
        <div class="col-md-1"></div>
        
      </div>
      <section class="container mensaje" hidden="true">
          <div>
            <p>No hay trabajadores, que tal si empezamos a registrar algunos</p>
          </div>
          <button class="btn-lg btn-success agregar_nuevo" data-toggle="modal" data-target="#myModal">Continuar</button>
        </section>
      <section class="mostrar"></section>
      
      <!-- Muestra La tabla con la lista de Trabajadores que hay -->
      <div class="col-md-12 ">
        <div class="col-md-11 ">
          <table class="table table-condensed table-hover responsive tabla" hidden="true">
            <thead>
              <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELEFONO</th>
                <th>CARGO</th>
                <th>ACCIONES</th>
              </tr>
              </thead>
              <tbody class= "contenedor">
              </tbody>
          </table>
          <div class="caja_mas" hidden="true">
                <button class="btn btn-primary mas agregar_nuevo" type="submit" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Registro trabajadores</h4>
            </div>
            <div class="modal-body">
              <!--FORMULARIO INGRESO TRABAJADORES-->
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Apellido</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefono o Celular</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su telefono o celular">
                  </div>
                </div>
                             
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Cargo</label>
                    <div class="col-sm-10">
                      <select class="col-sm-12 form-control cargo">
                           
                      </select>
                    </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button id="guardar_registro" type="button" class="btn btn-success">Enviar</button>
            </div>
          </div>
        </div>
     </div>
    <!-- ***********************Fin vista Trabajadores ************** -->

    <!-- *****************Inicio vista Panel de control*******************-->
      <section class="col-md-12 container-fluid show_info ">
        
          <!-- Muestra La cantidad De Encargados que hay -->
          <div class="col-md-5 col-md-offset-1" >
            <div class="col-md-12"> 
                  <div class="info-box "> 
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text text-center"> Encargados </span>
                      <span class="info-box-number cantidad_encargados"></span>
                    </div><!-- /.info-box-content -->
                  </div><!-- /.info-box -->
            </div>
          </div>
        
          <!-- Muestra La cantidad De Terrenos que hay -->
          <div class="col-md-5 col-md-offset-1">
            <div class="col-md-12">  
              <div  class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span style="background: #4a2111;color:white;" class="info-box-icon "><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <div  class="info-box-content">
                  <span class="info-box-text text-center" >Terrenos</span>
                  <span class="info-box-number cantidad_terrenos"></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>
          </div>
          
          <!-- Muestra La cantidad De Trabajadores que hay -->
          <div class="col-md-5 col-md-offset-1">
            <div class="col-md-12">  
              <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-yellow"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text text-center ">Trabajadores</span>
                  <span class="info-box-number cantidad_trabajadores"></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>
          </div>

          <!-- Muestra La cantidad De Dias De Trabajo que hay -->
          <div class="col-md-5 col-md-offset-1" >
            <div class="col-md-12">    
                <div class="info-box">
                  <!-- Apply any bg-* class to to the icocolorn to  it -->
                  <span class="info-box-icon bg-green"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> </span>
                  <div class="info-box-content">
                    <span class="info-box-text text-center"> Dias De Trabajo</span>
                    <span class="info-box-number">  </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>     
          </div>
      </section>
    <!-- *****************Fin inicio vista Panel de control ****************-->

    <!-- *****************Inicio Vista Terrenos **********************-->

      <!-- *******Vista Cuando  halla Terrenos**********-->
      <section class="tabla_terrenos" hidden="true">
        <table class="table table-condensed terrenos">
          <thead>
            <tr>
              <th>TERRENOS</th>
                <th>ACCIONES</th>
                
              </tr>
          </thead>
          <tbody class= "ver_terrenos">
          </tbody> 
        </table>
        <div>
          <button class="btn btn-primary mas" data-toggle="modal" data-target="#myModal2" type="submit" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
         </div>
      </section>
      
      <!-- *******modal para ingreso nuevos de terenos****** -->
        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Ingereso nuevo de terrenos</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <div class="form-group">
                <label for="nombre_terreno" class="col-sm-2 control-label">Ingrese el nombre del terreno</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="terreno" id="nombre_terreno" placeholder="Ingrese su terreno">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary registrar_terreno">Registrar</button>
            </div>
          </div>
        </div>
        </div>
      <!-- ******* fin del modal de ingreso de terrenos **** -->
      <!-- ******* Modal para Editar Terreno ********-->
        <!-- Modal -->
        <div class="modal fade" id="ModalEditarTerreno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Terreno</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="inputNombreTerreno">Nuevo Nombre:</label>
                    <input type="text" class="form-control" name="nombreTerreno" id="nombreTerreno"/>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary actualizar_terreno">Actualizar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal para Asignar trabajadores y encragados -->
          <!-- Modal -->
          <div class="modal fade" id="ModalAsignarTrabajadores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Asignar Empleados</h4>
                </div>
                <div class="modal-body">
                  
                    <h2>Asignar Empleados</h2>
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Trabajadores</a></li>
                      <li><a data-toggle="tab" href="#menu1">Encargados</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Asignar</th>
                            </tr>
                            <tbody id="asignar_trabajadores">
                              <tr>
                                <td>183</td>
                                <td>John Doe</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                              <tr>
                                <td>219</td>
                                <td>Alexander Pierce</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                              <tr>
                                <td>657</td>
                                <td>Bob Doe</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                              <tr>
                                <td>175</td>
                                <td>Mike Doe</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Asignar</th>
                            </tr>
                            <tbody id="asignar_encargados">
                              <tr>
                                <td>183</td>
                                <td>John Doe</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                              <tr>
                                <td>219</td>
                                <td>Alexander Pierce</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                              <tr>
                                <td>657</td>
                                <td>Bob Doe</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                              <tr>
                                <td>175</td>
                                <td>Mike Doe</td>
                                <th><span class="fa fa-check-square-o"></span></th>
                              </tr>
                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                      
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary actualizar_terreno">Actualizar</button>
                </div>
              </div>
            </div>
          </div>

        <!-- Fin Modal -->


        
      <!-- ****** Fin Modal para editar Terreno *******-->


        <!-- *******Fin vista cuando  halla Terrenos******-->
    <!-- **************** Fin vista Terrenos **************************-->

    <!-- ****************Inicio vista Empezar Dia ********************-->
      <section class="container dia" hidden="true">
        <!-- Apply any bg-* class to to the info-box to color it -->
          <div class="container" >
            
            <div class="row" style="margin-top: 2em;">
              <div class="col-md-3 col-md-offset-2" >
                <input type="text" class="dial " value="75" data-min="0" data-max="100" name="" readOnly  >
                <h5 class="text-center">Pagos Realizados Hoy</h5>
              </div>
              <div class="col-md-3">
                <input type="text" class="dial" value="3" data-min="0" data-max="100" name="" readOnly >
                <h5 class="text-center">Asistencia de Trabajadores Hoy</h5>
              </div>
            </div>
            
            <!--
            <div class="row" style="margin-top: 2em;">
              <div class="col-md-3 col-md-offset-2">
                <input type="text" class="dial" value="45" data-min="0" data-max="100" name="" readOnly >
              </div>
              <div class="col-md-3">
                <input type="text" class="dial" value="100" data-min="0" data-max="100" name="" readOnly >
              </div>
            </div>-->
            
            
          </div>
        


        

      </section>
    <!-- ****************Fin vista Empezar Dia ********************-->
  </div>
  <!-- Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      SOFTCACOL 
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="senasofiaplus.edu.co">SENA</a>.</strong> Todos Los Derechos Reservados.
  </footer>

  <!-- - - - - - - - - - - MODALES - - - - - - - -  -->

    <!-- Modal Para Insertar Trabajadores -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Registro trabajadores</h4>
          </div>
          <div class="modal-body">
            <!--FORMULARIO INGRESO TRABAJADORES-->
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Apellido</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Telefono o Celular</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su telefono o celular">
                </div>
              </div>
                           
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cargo</label>
                  <div class="col-sm-10">
                    <select class="col-sm-12 form-control cargo">
                         
                    </select>
                  </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button id="guardar_registro" type="button" class="btn btn-success">Enviar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL EDITAR -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Actualizacion empleados</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="nuevo_nombre" class="control-label">NOMBRE</label>
                <input type="text" class="form-control" id="nuevo_nombre" placeholder="NOMBRE">
              </div>
              <div class="form-group">
                <label for="nuevo_apellido" class="control-label">APELLIDO</label>
                <input type="text" class="form-control" id="nuevo_apellido" placeholder="APELLIDO">
              </div>
              <div class="form-group">
                <label for="nuevo_apellido" class="control-label">TELEFONO</label>
                <input type="text" class="form-control" id="nuevo_telefono" placeholder="TELEFONO">
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>CARGO</label>
                      <select class="form-control select2 cargo" style="width: 100%;" name="cargo">
                      
                      </select>
                    </div>
                    <div class="form-group">
                      <label>TERRENO</label>
                      <select class="form-control select2" style="width: 100%;" name="terreno" id="terreno">
                        <option selected="selected">Seleccione el terreno</option>
                       <option type="radio" name="terreno" id="hectaria1" value="0">Hectaria 1</option>
                       <option type="radio" name="terreno" id="hectaria2" value="1">Hectaria 2</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div> 
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">NO GUARDAR</button>
            <button id="guardar_nuevo" type="button" class="btn btn-primary">GUARDAR</button>
          </div>
        </div>
      </div>
    </div>

     <!-- VER INFORMACION -->
        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Informacion del empleado</h4>
              </div>
              <div class="modal-body">
                
                <section class="calend row">
                  <div class="calends ">
                    <h4 class="modal-title" id="exampleModalLabel">Empleado:</h4>
                  </div>
                  <div class="calends1">
                   <input type="date" name="fecha">
                 </div>
                </section>

                <table class="table table-condensed tabla">
                  <thead>
                    <tr>
                      <th>PAGOS REALIZADOS</th>
                      <th>FECHA</th>
                      <th>KILOS DE CAFE</th>
                      <th>CARGO</th>
                      <th>CONSTANCIA DE PAGO</th>
                    </tr>
                  </thead>
                  <tbody class= "ver-informacion">
                  </tbody>
                </table>
              </div>
               <div class="modal-footer">
               </div>
            </div>
          </div>
        </div>
        <!-- FIN DE LA VER INFORMACION-->

</div>

<!-- Script Que Utilizo en la web -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!--jQuery Knob-->
  <script type="text/javascript" src="bower_components/jquery-knob/js/jquery.knob.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- My Script -->
  <script src="dist/js/MyScript.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>