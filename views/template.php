<!DOCTYPE html>

<html>
<head>

  <!-- Metas y Title -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel De Control</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Todos Los CSS Que Utilizo -->
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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

</head>

<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">

  <!--Modales -->
<!-- Modal para Pago a trabajadores -->
              <div class="modal fade" id="ModalPagoTrabajadores" tabindex="-1" role="dialog" aria-labelledby="modalPagoTrabajador">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="modalPagoTrabajador">Realizar Pagos</h4>
                    </div>
                    <div class="modal-body">
                      
                        
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#home">Trabajadores</a></li>
                          <!--<li><a data-toggle="tab" href="#menu2">Encargados</a></li>-->
                        </ul>

                        <div class="tab-content">
                          <div id="home" class="tab-pane fade in active">
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Accion</th>
                                </tr>
                                <tbody id="lista_trabajadores_pagos">
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div id="menu2" class="tab-pane fade">
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Apellido</th>
                                  <th>Asignar</th>
                                </tr>
                                <tbody id="asignar_encargados">                                                                  
                                
                                </tbody>                                
                              </table>
                            </div>
                          </div>
                          
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Fin Modal pago a trabajadores -->


  <!-- Modal para Asistencia -->
      <div class="modal fade" id="ModalAsistenciaTrabajadores" tabindex="-1" role="dialog" aria-labelledby="modalAsistencia">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="modalAsistencia">Tomar Asistencia</h4>
            </div>
            <div class="modal-body">
              
                
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Trabajadores</a></li>
                  <!--<li><a data-toggle="tab" href="#menu2">Encargados</a></li>-->
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Accion</th>
                        </tr>
                        <tbody id="lista_trabajadores_asistencia">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div id="menu2" class="tab-pane fade">
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
            </div>
          </div>
        </div>
      </div>

  <!-- Fin Modal para Asistencia-->


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
                        <th>Escoger</th>
                      </tr>
                      <tbody id="lista_terrenos">
                        
                      </tbody>
                      
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
    </div>
  <!-- /.modal -->  

    <!--Modal Para Realizar Pagos a Trabajadores -->
      <div class="modal fade" id="ModalRealizarPagos" tabindex="-1" role="dialog" aria-labelledby="ModalRealizarPagosLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Realizar Pago a: <a id="trabajador" class="nombreTrabajador ver_informacion_trabajador_2" data-toggle="modal" data-target="#bs-example-modal-lg_2"  style="cursor: pointer;"></a></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3>Realizar Pago</h3>
                    </div>

                    <form class="form">
                      <div class="form-group">
                       <label for="cantidad">Cantidad a Pagar: </label>
                       <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input class="form-control" type="number" id="cantidad" name="cantidad" placeholder="Cantidad a Pagar">
                          <span class="input-group-addon">.00</span>
                        </div>
                       </div>
                    </form>

                  </div>
                  <!-- /.box -->
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <input type="submit" name="hacerPago" class="btn btn-success" id="hacerPago" value="Pagar">
            </div>
          </div>
        </div>
      </div>

    <!-- Fin Modal para realizar pagos a Trabajadores -->

  <!--  Fin Modales -->


  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo inicio">
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
         
          <li class="dropdown user user-menu inicio">
           <a href="#" class="dropdown-toggle">  
            <i class="fa fa-home" aria-hidden="true"></i> 
            Inicio
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
                  <a href="#" class="btn btn-default btn-flat editarPerfil">Editar Perfil</a>
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
        
        <li class="inicio">
          <a href="#" class="text-center ">
            <i class="fa fa-home icono" aria-hidden="true"></i>
             <br><span class="icono "> Inicio </span>
          </a>
        </li>

        <li class="opcion_cargos" >
          <a href="#" class="text-center">
            <i class="fa fa-wrench icono" aria-hidden="true"></i>
            <br>
            <span  class="icono"> Cargos </span>
          </a>
        </li>

        <li>
          <a href="#" class="text-center mostrar_terrenos" >
            <i class="fa fa-map-marker icono" aria-hidden="true"></i>
             <br><span class="icono "> Terrenos </span>
          </a>
        </li>
        
        <li>
          <a href="#" class="text-center encargados"> 
            <i class="fa fa-users icono" aria-hidden="true"></i>
            <br><span class="icono "> Encargados </span>
          </a>
        </li>
        
        <li class="opcion_trabajadores" >
          <a href="#" class="text-center">
            <i class="fa fa-users icono" aria-hidden="true"></i>
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
          <ul class="treeview-menu menu_dia_hover">
            <li><a href="#"  data-toggle="modal" data-target="#ModalAsistenciaTrabajadores" class="mostrar_trabajadores_asistencia"><i class="fa fa-check-square-o"></i> Asistencia</a></li>
            <li><a href="#" class=" mostrar_trabajadores_pagos" data-toggle="modal" data-target="#ModalPagoTrabajadores"><i class="fa fa-usd"></i> Pago a Trabajadores</a></li>
            <li><a href="#" class="cancelarDia"><i class="fa fa-times "></i> Cancelar Dia</a></li>
            <li><a href="#" class="finalizarDia"><i class="fa fa-check"></i> Finalizar Dia</a></li>
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

  


    <br/>
    <!-- ***********************Inicio Vista Trabajadores***************-->
      
      <section class="container mensaje_trabajador mensaje" hidden="true">
          <div>
            <p>No hay trabajadores, que tal si empezamos a registrar algunos</p>
          </div>
          <button class="btn-lg btn-success agregar_nuevo" data-toggle="modal" data-target="#myModal">Continuar</button>
        </section>
        <!--
      <section class="tabla_trabajadores">
        Muestra La tabla con la lista de Trabajadores que hay 
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
      </section> -->

      <section class="content tabla"  hidden="true" >
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Mis Trabajadores</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped " >
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody class= "contenedor">
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="caja_mas" hidden="true">
                  <button class="btn btn-primary mas agregar_nuevo" type="submit" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      
      

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
                    <input type="text" class="form-control" name="nombre" id="nombre_trabajador" placeholder="Ingrese su nombre">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Apellido</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="apellido" id="apellido_trabajador" placeholder="Ingrese su apellido">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Telefono o Celular</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="telefono" id="telefono_trabajador" placeholder="Ingrese su telefono o celular">
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
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button id="guardar_registro" type="button" class="btn btn-success">Enviar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="ModalPagos" tabindex="-1" role="dialog" aria-labelledby="ModalPagosLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Pagos Realizados a: <span class="nombreTrabajador"></span></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h5>Cantidad Pagada Hasta la Fecha: $<span class="cantidadPagado"></span></h5>

                      <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          
                          <div class='input-group date' style="margin-top: 10px;" >
                            <input type='date' class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tr>
                          <th>ID</th>
                          <th>Responsable</th>
                          <th>Fecha</th>
                          <th>Cantidad Pagada</th>
                          <!--<th>Comprobante</th>-->
                        </tr>
                        <tbody id="mostrarInformacionPagos">
                          
                        </tbody>
                        
                        
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                  <div class="info-box encargados"> 
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text text-center"> Encargados </span>
                      <span class="info-box-number cantidad_encargados">0</span>
                    </div><!-- /.info-box-content -->
                  </div><!-- /.info-box -->
            </div>
          </div>
        
          <!-- Muestra La cantidad De Terrenos que hay -->
          <div class="col-md-5 col-md-offset-1">
            <div class="col-md-12">  
              <div  class="info-box mostrar_terrenos">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span style="background: #4a2111;color:white;" class="info-box-icon "><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <div  class="info-box-content">
                  <span class="info-box-text text-center " >Terrenos</span>
                  <span class="info-box-number cantidad_terrenos"></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>
          </div>
          
          <!-- Muestra La cantidad De Trabajadores que hay -->
          <div class="col-md-5 col-md-offset-1">
            <div class="col-md-12">  
              <div class="info-box opcion_trabajadores">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-yellow opcion_trabajadores"><i class="fa fa-wrench" aria-hidden="true"></i></span>
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
                <div class="info-box empezarDia">
                  <!-- Apply any bg-* class to to the icocolorn to  it -->
                  <span class="info-box-icon bg-green "><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> </span>
                  <div class="info-box-content">
                    <span class="info-box-text text-center"> Dias De Trabajo</span>
                    <span class="info-box-number cantidad_dias"></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>     
          </div>
      </section>
    <!-- *****************Fin inicio vista Panel de control ****************-->

    <!-- *****************Inicio Vista Terrenos **********************-->

      <!-- *******Vista Cuando  halla Terrenos**********-->
     

      <section class="content tabla_terrenos" hidden="true">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Mis Terrenos</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre Del Terreno</th>
                    <th>Eliminar Terreno</th>
                    <th>Editar Terreno</th> 
                    <th>Asignar Trabajadores al Terreno</th>
                  </tr>
                  </thead>
                  <tbody class= "ver_terrenos">
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre Del Terreno</th>
                    <th>Eliminar Terreno</th>
                    <th>Editar Terreno</th> 
                    <th>Asignar Trabajadores al Terreno</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div>
              <button class="btn btn-primary mas" data-toggle="modal" data-target="#myModal2" type="submit" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      
      <!-- *******modal para ingreso nuevos de terenos****** -->
        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Registrar nuevo de Terreno</h4>
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
                            <tbody id="lista_trabajadores">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div id="menu1" class="tab-pane fade">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            
                            </tbody>                            
                          </table>
                        </div>
                      </div>                      
                    </div>                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>                  
                </div>
              </div>
            </div>
          </div>

        <!-- Fin Modal -->


        
      <!-- ****** Fin Modal para editar Terreno *******-->


        <!-- *******Fin vista cuando  halla Terrenos******-->
    <!-- **************** Fin vista Terrenos **************************-->

    <!-- ****************Inicio vista Empezar Dia ********************-->
      <section class="dia" hidden="true">
        <!-- Apply any bg-* class to to the info-box to color it -->

          
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">¿Que ha pasado hoy?</h3>

                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                          <i class="fa fa-minus"></i>
                        </button>

                        <button  class="btn btn-box-tool" type="button" data-widget="remove">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="container-fluid" >
                        <div class="row">
                          <div class="col-md-3 col-md-offset-4 " >
                            <input type="text" class="dial" id="pagos_realizados" value="0" data-min="0" data-max="100" name=""   >
                            
                          </div>
                          <div class="col-md-3">
                            <input type="text" class="dial" id="asistencia_trabajadores" value="0" data-min="0" data-max="100" name=""  >
                            
                          </div>
                          <div class="row">
                            <h5 class="col-md-2 col-md-offset-4 " style="margin-right: 4em; margin-left: 28em;" >Pagos Realizados </h5>
                            <h5 class="col-md-3">Asistencia de Trabajadores</h5>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    
                  </div>
                </div>
                
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">¿Que vamos a hacer hoy?</h3>

                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse">
                          <i class="fa fa-minus"></i>
                        </button>

                        <button  class="btn btn-box-tool" type="button" data-widget="remove">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="container-fluid" >
                        <div class="row">
                          <div class="col-xs-3">
                            <div class="small-box bg-aqua">
                              <div class="inner">
                                
                                <h4>Asistencia</h4>
                                <p>Tomar Asistencia</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-check-square-o"></i>
                              </div>
                              <a href="#" class="small-box-footer mostrar_trabajadores_asistencia" data-toggle="modal" data-target="#ModalAsistenciaTrabajadores" >
                                Registrar Ahora <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                          </div>

                          <div class="col-xs-3">
                            <div class="small-box bg-green">
                              <div class="inner">
                                
                                <h4>Pagos </h4>
                                <p>Realizar Pagos</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-usd"></i>
                              </div>
                              <a href="#" class="small-box-footer mostrar_trabajadores_pagos" data-toggle="modal" data-target="#ModalPagoTrabajadores">
                                Realizar Ahora <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                          </div>


                          <div class="col-xs-3">
                            <div class="small-box bg-yellow">
                              <div class="inner">
                                
                                <h4>Finalizar Dia</h4>
                                <p>Finalinar Trabajo</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-check"></i>
                              </div>
                              <a href="#" class="small-box-footer finalizarDia">
                                Finalizar Ahora <i class="fa fa-arrow-circle-right "></i>
                              </a>
                            </div>
                          </div>

                          <div class="col-xs-3">
                            <div class="small-box bg-red">
                              <div class="inner">
                                
                                <h4>Cancelar Dia</h4>
                                <p>Cancelar Dia de Trabajo</p>
                              </div>
                              <div class="icon">
                                <i class="fa fa-close"></i>
                              </div>
                              <a href="#" class="small-box-footer cancelarDia">
                                Cancelar Ahora <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                          </div>


                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
             
              
            </section>
            

            <!-- Modales -->

           
          



        

      </section>
    <!-- ****************Fin vista Empezar Dia ********************-->

    <!-- **************** Inicio vista Encargados *****************-->

      
              <div class="modal fade" id="modalAsignarEncargado" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAsignarEncargado">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabelAsignarEncargado">Asignar Encargado a Terreno</h4>
                   </div>
                   <div class="modal-body">
                     <table class="table table-hover">
                       <tr>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Escoger</th>
                       </tr>
                       <tbody class ="terrenos">
                         
                       </tbody>
                       
                     </table>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                   </div>
                 </div>
              </div>
            </div>


      <section class="container vista_encargados" hidden="true">
         <div class="col-md-3 col-md-offset-9">


           <form method="get" class="SearchByNameEncargados" hidden="true">
             <div class="input-group">
               <input type="text" class="form-control SearchByNameEncargados" placeholder="Que Deseas Buscar...">
               <span class="input-group-btn">
                   <button type="submit" name="search_encargados" id="search_encargados" class="btn btn-flat"><i class="fa fa-search"></i>
                   </button>
                 </span>
             </div>
           </form>
           <div class="col-md-1"></div>   
         </div>
         <!-- *********** Muestra si no hay encargados registrados aun **************-->
           <section class="mensaje_encargados mensaje" hidden="true">
               <div>
                 <p>No hay Encargados, que tal si empezamos a registrar algunos</p>
               </div>
               <button class="btn-lg btn-success agregar_nuevo_encargado" data-toggle="modal" data-target="#myModalAgregarEncargados">Continuar</button>

           </section>
         <!-- *********** Muestra si no hay encargados registrados aun **************-->
         <section class="mostrar"></section>
         
         <!-- Muestra La tabla con la lista de Trabajadores que hay -->
         <!--
         <div class="col-md-12 ">
           <div class="col-md-11 ">
             <table class="table table-condensed table-hover responsive tablaEncargados" hidden="true">
               <thead>
                 <tr>
                   <th>Nombre</th>
                   <th>Apellido</th>
                   <th>Telefono</th>
                   <th>Usuario Asignado</th>
                   <th>Contraseña Asignada</th>
                   <th>Acciones</th>
                 </tr>
                 </thead>
                 <tbody class= "contenedor">                
                  
                 </tbody>
             </table>
             <div class="caja_mas" hidden="true">
                   <button class="btn btn-primary agregar_nuevo_encargado" type="submit" data-toggle="modal" data-target="#myModalAgregarEncargados"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
             </div>
           </div>
         </div> -->


         <div class="content" id="tabla_encargados" hidden="true">
           <div class="col-xs-12">
             <div class="box box-success">
               <div class="box-header">
                 <h3 class="box-title">
                  Encargados</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <table id="example4" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>Cedula</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Telefono</th>
                     <th>Nombre de Usuario</th>
                     <th>Asignar como Encragado</th>
                   </tr>
                   </thead>
                   <tbody id= "ver_encargados">
                     
                   </tbody>
                   <tfoot>
                   <tr>
                     <th>Cedula</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Telefono</th>
                     <th>Nombre de Usuario</th>
                     <th>Asignar como Encragado</th>
                   </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <div>
               <button class="btn btn-primary mas agregar_nuevo_encargado" data-toggle="modal" data-target="#myModalAgregarEncargados" type="submit"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
             </div>
           </div>
         </div>

         <!-- ******************** Modal Para Registrar Encargado **********************-->

          <div class="modal fade" id="myModalAgregarEncargados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Registro Encargados</h4>
               </div>
               <div class="modal-body">
                 <!--FORMULARIO INGRESO TRABAJADORES-->
                 <form class="form-horizontal">
                   <div class="form-group">
                     <label for="nombre_encargado" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" name="nombre" id="nombre_encargado" placeholder="Ingrese su nombre">
                     </div>
                   </div>
                   
                   <div class="form-group">
                     <label for="apellido_encargado" class="col-sm-2 control-label">Apellido</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" name="apellido" id="apellido_encargado" placeholder="Ingrese su apellido">
                     </div>
                   </div>

                   <div class="form-group">
                     <label for="cedula_encargado" class="col-sm-2 control-label">Cedula</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" name="cedula_encargado" id="cedula_encargado" placeholder="Ingrese la cedula del encargado">
                     </div>
                   </div>
                   
                   <div class="form-group">
                     <label for="telefono_encargado" class="col-sm-2 control-label">Telefono o Celular</label>
                     <div class="col-sm-10">
                       <input type="number" class="form-control" name="telefono" id="telefono_encargado" placeholder="Ingrese su telefono o celular">
                     </div>
                   </div>
                    
                                
                     <div class="form-group">
                       <label for="terrenos_para_encargado" class="col-sm-2 control-label">Asignar un terreno</label>
                       <div class="col-sm-10">
                         <select class="col-sm-12 form-control terreno_asignado_encargado" id="terrenos_para_encargado" >
                              
                         </select>
                       </div>
                     </div>

                     <div class="form-group">
                       <label for="nombre_usuario_encargado" class="col-sm-2 control-label">Nombre de Usuario</label>
                       <div class="col-sm-10">
                         <input type="text" class="form-control" name="nombre" id="nombre_usuario_encargado" placeholder="Ingrese su nombre">
                       </div>
                     </div>

                     <div class="form-group">
                       <label for="pass_encargado" class="col-sm-2 control-label">Contraseña</label>
                       <div class="col-sm-10">
                         <input type="password" class="form-control" name="nombre" id="pass_encargado" placeholder="Ingrese su nombre">
                       </div>
                     </div>

                 </form>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                 <button id="guardar_encargado" type="button" class="btn btn-success">Guardar</button>
               </div>
             </div>
          </div>
         <!-- ********************* fin Modal para Registrar Encargado ****************-->  
        </div>
      </section>
    <!-- **************** Fin vista Encargados *********************-->
    <!-- **************** Inicio vista  Asistencia ******************-->
    <!-- **************** Fin vista Asistencia **********************-->

    <!-- **************** Inicio Vista Cargos *********************** -->
        <!-- *********** Vista si no hay Cargos ********************* -->
           <section class="content mensaje" id="vista_sin_Cargos" hidden="true">
             <div class="row">
               <div class="col-xs-12">
                 <section>
                     <div>
                       <p>No hay Cargos, que tal si empezamos a registrar algunos</p>
                     </div>
                     <button class="btn-lg btn-success " data-toggle="modal" data-target="#myModal3">Continuar</button>
                 </section>

               </div>
             </div>
           </section>   

        <!-- *********** Fin vista si no hay cargos ****************** -->
      <section class="content " id="tabla_cargos" hidden="true">

        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Mis Cargos</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody id= "ver_cargos">
                    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div>
              <button class="btn btn-primary mas agregar_cargo" data-toggle="modal" data-target="#myModal3" type="submit" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>


      <!-- *******modal para ingreso nuevos de CARGOS****** -->
        <!-- Modal -->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Registra un Cargo Nuevo</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <div class="form-group">
                <label for="nombre_cargo" class="col-sm-2 control-label">Nombre del Cargo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Ingrese el Nombre Del Cargo">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary registrar_cargo">Registrar</button>
            </div>
          </div>
          </div>
        </div>
      <!-- ******* fin del modal de ingreso de terrenos **** -->

      <!-- ***** Modal actualizar Cargos **** -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Actualizacion de Cargos</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="nuevo_tipo" class="control-label">Nombre</label>
                    <input type="text" class="form-control" id="nuevo_tipo" data_id="" placeholder="Nombre">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No Guardar</button>
                <button id="actualizar_cargo" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div>
          </div>
        </div>

      <!-- ****** fin Modal actualizar Cargos **** -->
    <!-- **************** Fin vista Cargos ************************** -->

    <!-- ************** Inicio Vista editarPerfil ****************** -->
      <div class="content center" id="EditarPerfil" hidden="true">
      <!--   <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Editar Perfil</h3>
              </div>
             /.box-header -->
              <!-- form start>
             <! <ul class="nav nav-tabs">
                <li id="datospersona" class="active"><a href="#tab_a" data-toggle="tab">Datos Personales</a></li>
                <li id="datoscuenta"><a href="#tab_c" data-toggle="tab">Datos de la Cuenta</a></li>
                <li id="eliminarCuenta"><a href="#tab_d" data-toggle="tab">Eliminar Cuenta</a></li>
              </ul>
               

            </div>
          </div>
        </div> --> 
        <div class="row opciones_perfil"  style="text-align: center;">
          <button id="datosempresa" type="button" class="btn btn-dark" style="font-size:1.5em; margin-right: 2em;">Editar informacion personal</button>
          <button id="datoscuenta" type="button" class="btn btn-dark" style="font-size:1.5em; margin-right: 2em;">Editar cuenta</button>
          <button type="button" class="btn btn-dark eliminarCuenta" style="font-size:1.5em;">Eliminar cuenta</button>
        </div>

        <div id="ConfiguracionDatos" class="row" style="margin-top: 2em;">
        <div class="col-xs-12">
          <div class="col-xs-4">
            <img src="dist/img/logo_1.png" class="user-image" alt="User Image" style="width: 100%; margin: 3em;">              
          </div> 
          <div id="contendorinformacion" class="col-xs-6" style="margin-left: 5em; margin-top: 4em;">
              
          </div>
        </div>          
        </div>      
      </div>
      
    <!-- ************** Fin vista editarPerfil ********************* -->
  </div>
  <!-- Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      SOFTCACOL 
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="http://oferta.senasofiaplus.edu.co">SENA</a>.</strong> Todos Los Derechos Reservados.
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
                <label for="nuevo_nombre" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="nuevo_nombre" placeholder="Nombre">
              </div>
              <div class="form-group">
                <label for="nuevo_apellido" class="control-label">Apellido</label>
                <input type="text" class="form-control" id="nuevo_apellido" placeholder="Apellido">
              </div>
              <div class="form-group">
                <label for="nuevo_apellido" class="control-label">Telefono</label>
                <input type="text" class="form-control" id="nuevo_telefono" placeholder="Telefono">
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Cargo</label>
                      <select class="form-control cargo cargo_trabajador"  name="cargo">
                        
                      </select>
                    </div>
                    <!--
                    <div class="form-group">
                      <label>Terreno</label>
                      <select class="form-control terreno_asignado_encargado" name="asignar_terreno_empleado">
                        
                      </select>
                    </div>-->
                  </div>
                </div>
              </div> 
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No Guardar</button>
            <button id="actualizar_trabajador" type="button" class="btn btn-success">Guardar</button>
          </div>
        </div>
      </div>
    </div>

     <!-- VER INFORMACION -->
        <!-- Modal -->
        <div class="modal fade " id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informacion acerca de: <span class="nombreTrabajador"></span></h4>
              </div>
              <div class="modal-body">
                <!--
                <section class="calend row">
                  
                  <div class="calends1">
                   <input type="date" name="fecha">
                 </div>
                </section>-->

                <table class="table table-condensed tabla">
                  <thead>
                    <tr>
                      <th>Terrenos Asignado</th>
                      <th>Cargo</th>
                      <th>Ver Informacion Sobre Pagos</th>
                      <!--<th>Constancia de Pago</th>-->
                    </tr>
                  </thead>
                  <tbody id= "ver_informacion_trabajador">

                  </tbody>
                </table>
              </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
          </div>
        </div>
      <!-- FIN DE LA VER INFORMACION-->

      <!-- VER INFORMACION 2-->
         <!-- Modal -->
         <div class="modal fade " id="bs-example-modal-lg_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Informacion acerca de: <span class="nombreTrabajador"></span></h4>
               </div>
               <div class="modal-body">
                 <!--
                 <section class="calend row">
                   
                   <div class="calends1">
                    <input type="date" name="fecha">
                  </div>
                 </section>-->
                 <table class="table table-condensed ">
                   <thead>
                     <tr>
                       <th>Terrenos Asignado</th>
                       <th>Cargo</th>
                       <th>Ver Informacion Sobre Pagos</th>
                       <!--<th>Constancia de Pago</th>-->
                     </tr>
                   </thead>
                   <tbody id= "ver_informacion_trabajador_2">

                   </tbody>
                 </table>
               </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
             </div>
           </div>
         </div>
       <!-- FIN DE LA VER INFORMACION 2-->

</div>

<!-- Script Que Utilizo en la web -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!--jQuery Knob-->
  <script type="text/javascript" src="bower_components/jquery-knob/js/jquery.knob.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- My Script -->
  <script src="dist/js/MyScript.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>
</html>