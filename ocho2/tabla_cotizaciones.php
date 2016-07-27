<?php
  
?>
<!DOCTYPE html>
     
    <html lang="es">
     
    <head>
     <title>Cotizaciones</title>
     
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Menú Principal</title>
   <!-- Latest compiled and minified CSS -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.theme.css">
    <link rel="stylesheet" href="css/bootstrap.theme.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

<body>
  
   
<div id="barra">
 <nav class="navbar navbar-full navbar-light bg-faded">
     <nav class="nav navbar-nav navbar-right">
           
            <li class="dropdown">
              <a style="color:#fff; background-color: #1a1a1a; padding-left:10px; margin-right:10px;" href="#" class="dropdown-toggle" data-toggle="dropdown">Cerrar Sesión <span class="caret"></span></a>
           <ul class="dropdown-menu" role="menu">  
            <li><a href="http://localhost/cotizador/logout.php">Salir</a></li>
        </nav>

        <nav class="nav navbar-nav navbar-left">
          <a href="dashboard.php"><img style="margin-left:10px;" src="http://ocho.studio/logoblanco.png" width="200"></a>
           
      </nav>
  </nav>
</div>  


<nav style="margin-top:-21px;" class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
     <div   class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul style="border-top: 1px #1a1a1a solid;" class="nav navbar-nav">
        <li style="border-top: 1px #1a1a1a solid; border-bottom: 1px #1a1a1a solid;"  class="active"><a href="dashboard.php">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li style="border-bottom: 1px #1a1a1a solid;" ><a href="tabla_cotizaciones.php">Cotizaciones<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-edit"></span></a></li>
         <li style="border-bottom: 1px #1a1a1a solid;" ><a href="ventas.php">Ventas<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></span></a></li>
        <li style="border-bottom: 1px #1a1a1a solid;"><a href="clientes.php">Clientes<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon glyphicon-briefcase"></span></a></li>
         <li style="border-bottom: 1px #1a1a1a solid;"><a href="proveedores.php">Proveedores<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon glyphicon-globe"></span></a></li>
        <li style="border-bottom: 1px #1a1a1a solid;"><a href="usuarios.php">Usuarios</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></a>
         
        </li>
       
      </ul>
    </div>
  </div>
</nav>
<div class="main">
<!-- Content Here -->





<div class="container">
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-3">
                    <h3 class="panel-title"><b>Cotizaciones</b></h3><br>
                     <input type="text" class="form-control" placeholder="Buscar">
                  </div>
                 
                  <div class="col col-xs-8 text-right">
                   <!-- Trigger the modal with a button -->


                  
                 
                  <button style="padding:4px; margin-bottom:-90px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Agregar</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list table-responsive">
                  <thead>
                    <tr>
                        <!--<th>Editar</th>-->
                        <th class="hidden-xs">ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Empresa</th>
                        <th>RFC</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Modificación</th>
                    </tr> 
                  </thead>
                  <tbody>
                          <tr>
                           <!-- <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>-->

                            
<?php 
include('config/conexion.php'); 
    $query = "select * from clientes";     // Esta linea hace la consulta
    $result = mysql_query($query); 

    while ($registro = mysql_fetch_array($result)){ 
echo " 
    <tr> 
     
      <td>".$registro['id_cliente']."</td> 
      <td>".$registro['nombre']."</td> 
      <td>".$registro['apellido']."</td> 
      <td>".$registro['empresa']."</td> 
      <td>".$registro['rfc']."</td> 
      <td>".$registro['telefono']."</td> 
      <td>".$registro['direccion']."</td> 
      <td>".$registro['fecha_creacion']."</td>
      <td>".$registro['fecha_modificacion']."</td>  
    
</tr> 
"; 
} 
?>


                            
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Página 1 de 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</div></div>

</div>






                                  <!-- Modal -->
                                  <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Agregar nueva cotización</h4>
                                        </div>
                                     <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  style="margin-right:30px;" class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label style="margin-right:30px;"  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label style="margin-right:30px;" class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword3" placeholder="Password"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                  </div>
                </form>
                
                
                
                
                
                
            </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>

                                    </div>
                                  </div>




<!-------------------------->


</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/VentanaCentrada.js"></script>
  <script type="text/javascript" src="js/js.js"></script>

  </html>