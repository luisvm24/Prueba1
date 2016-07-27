<?php 

session_start(); //session_start() crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie 
include_once "config/conexion.php"; //es la sentencia q usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
/*Función verificar_login() --> Vamos a crear una función llamada verificar_login, esta se encargara de hacer una consulta a la base de datos para saber si el usuario ingresado es correcto o no.*/


function verificar_login($user,$password,&$result) 
    { 
        $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and '$password' = '$password'";
        $rec = mysql_query($sql); 
        $count = 0; 
        while($row = mysql_fetch_object($rec)) 
        { 
            $count++; 
            $result = $row; 
        } 
        if($count == 1) 
        { 
            return 1; 
        } 
        else 
        { 
            return 0; 
        } 
    } 

/*Luego haremos una serie de condicionales que identificaran el momento en el boton de login es presionado y cuando este sea presionado llamaremos a la función verificar_login() pasandole los parámetros ingresados:*/

if(!isset($_SESSION['userid'])) //para saber si existe o no ya la variable de sesión que se va a crear cuando el usuario se logee
{ 
    if(isset($_POST['login'])) //Si la primera condición no pasa, haremos otra preguntando si el boton de login fue presionado
    { 
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1) //Si el boton fue presionado llamamos a la función verificar_login() dentro de otra condición preguntando si resulta verdadero y le pasamos los valores ingresados como parámetros.
        { 
            /*Si el login fue correcto, registramos la variable de sesión y al mismo tiempo refrescamos la pagina index.php.*/
            $_SESSION['userid'] = $result->idusuario; 
            header("location:index.php"); 
        } 
        else 
        { 
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; //Si la función verificar_login() no pasa, que se muestre un mensaje de error.
        } 
    } 
?> 



<!DOCTYPE html>
     
    <html lang="es">
     
    <head>
     
     
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ocho Studio</title>
   <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <!-- Optional theme -->

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">-->
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



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <!--<div class="pass-reset">
                    <label>Nombre Usuario:</label><br>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>-->
            </div>
            <div class="wrap">
            <br>
            <br>
                <p class="form-title">
                <img class="animated infinite bounce" src="http://ocho.studio/logoocho.png" width="300"></p>
                <form  action="" method="post" class="login">
                <input name="user" type="text" placeholder="Usuario" />
                <input name="password" type="password" placeholder="Contraseña" />
                <input name="login" type="submit" value="Iniciar Sesión" class="btn btn-success btn-sm" />

                <!--<div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Recordar usuario
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascript:void(0)" class="forgot-pass">Recuperar contraseña</a>
                        </div>
                    </div>
                </div>-->
                </form>
            </div>
        </div>
    </div>
   
</div>



                <?php 
} else { 
    // Si la variable de sesión ‘userid’ ya existe, que muestre el mensaje de saludo. 
    header("Location: dashboard.php");  
    echo '<a href="logout.php">Logout</a>'; 
} 
?>
     
    <!--<h1>Login de Usuarios</h1>
    <hr />
     
    <form action="checklogin.php" method="post" >
     
    <label>Nombre Usuario:</label><br>
    <input name="username" type="text" id="username" required>
    <br><br>
     
    <label>Password:</label><br>
    <input name="password" type="password" id="password" required>
    <br><br>
     
    <input type="submit" name="Submit" value="LOGIN">
     
    </form>
        <hr />
     
    <footer>
     
</footer>-->
 
 </body>
    </html>







<!--    <link rel="stylesheet" href="estilos.css">
<form action="" method="post" class="login"> 
    <div><label>Username</label><input name="user" type="text" ></div> 
    <div><label>Password</label><input name="password" type="password"></div> 
    <div><input name="login" type="submit" value="login"></div> 
</form>  -->
 


 



