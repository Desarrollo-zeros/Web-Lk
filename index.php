<?php
session_start();
include 'class/users.php';
//include_once "news.php";
$r = false;
$unames = null;
$val = false;
if(!empty($_GET)){
    if(!empty($_GET['usuario'])){
        echo '<body onload ="alert(\'El usuario ya existe\')"></body>';
    }
    if(!empty($_GET['correo'])){
        echo '<body onload ="alert(\'El correo ya existe\')"></body>';
    }

}

if(!empty($_POST))
{
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    if($users->loginDB($uname,$psw)){
        $_SESSION['uname'] = $_POST['uname'];
        $_SESSION['psw'] =$_POST['psw'];
        $r=true;
    }
    else{
    if(empty(!$unames))
        $r=false;
    }
}
    if($r){
        $unames = $_SESSION['uname'];
     printf("Logeado -");
        header("location:usuario/panel.php");
    }
    else if(isset($_SESSION['uname'])){
        $unames = $_SESSION['uname'];
    printf("Session save -");

    }
    else{
            printf("No logeado -");
    }

?>


<DOCTYPE HTML>
    <html>
    <head>

        <title>WoW Legendary</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <script src="js/login.js"></script>

        <!-- Search engine related -->
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



    </head>
            <body class="imgs">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">WoW-Legendary</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="usuario/online.php">Online</a></li>
                        <li><a href="#">Foro</a></li>
                        <li><a href="https://www.facebook.com/WoWLegendary335a">Facebook</a></li>
                        <li><a href="#">Armeria</a></li>
                        <li><a href="#">Migraciones</a></li>
                        <li><a href="usuario/baneados.php">Baneados</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <td><?php  if(empty(!$unames)){}else{echo '<li><a onclick="document.getElementById(\'id02\').style.display=\'block\'"><span class="glyphicon glyphicon-user"></span> Registrar</a></li>';}?></td>
                        <td><?php  if(empty(!$unames)){}else{echo '  <li><a onclick="document.getElementById(\'id01\').style.display=\'block\'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';}?></td>
                        <td><?php  if(empty($unames)){}else{echo '  <li><a href="usuario/panel.php"><span class="glyphicon glyphicon-home"></span> Panel De Usuario</a></li>';}?></td>
                        <td><?php  if(empty($unames)){}else{echo '  <li><a href="usuario/salir.php"><span class="glyphicon glyphicon-remove"></span> Salir</a></li>';}?></td>
                        </ul>
                </div>
            </div>
        </nav>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a onclick="document.getElementById('id01').style.display='block'"> <img src="img/migration.png" alt="WoW"></>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item ">
                    <a onclick="document.getElementById('id01').style.display='block'"> <img src="img/migration.png" alt="WoW"></>
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

                <div id="id01" class="modal">
            <form class="modal-content animate" action="index.php"  method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="img/0-0.jpg" alt="Avatar" class="avatar">
                </div>
                <div class="container">
                    <font color="#6b8e23"> <label><b>&nbsp;&nbsp;Username</b></label></font>
                    <input type="text" placeholder="Usuario" name="uname" required value="<?php echo !empty($uname)?$uname:'' ?>">
                    <br>
                    <font color="#6b8e23"> <label><b>Contraseña</b></label></font>
                    <input type="password" placeholder="Contraseña" name="psw" required  value="<?php echo  !empty($psw)?$psw:'' ?>">
                    <br>
                    <br>
                    <button type="submit" class="btn acpetarbtn">Login</button>
                    <span onclick="document.getElementById('id01').style.display='none'" class="button btn cancelbtn" title="Close">Cancelar</span>
                    </div>
            </form>
        </div>
        <div id="id02" class="modal">
            <form class="modal-content animate" action="registro/registrar.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="img/ticket.jpg" alt="Avatar" class="center-block img-circle img-responsive" width="40%">
                </div>
                <div class="container">
                    <font color="#6b8e23"> <label><b>Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></font>
                    <input id="email" name="email"  type="email" placeholder="Correo" name="correo" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    <label id="Info1"></label>
                    <br>
                    <font color="#6b8e23"> <label><b>Usuario&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></font>
                    <input id="username" name="username" type="text" placeholder="Usuario" required pattern="\w+.{4,}">
                    <label id="Info"></label>
                    <br>
                    <font color="#6b8e23"> <label><b>Contraseña</b></label></font>
                    <input  placeholder="Contraseña" title="La contraseña debe contener al menos 6 caracteres, incluyendo números MAYÚSCULAS y minúsculas" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd1" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');if(this.checkValidity()) form.pwd2.pattern = this.value;"> <br>
                    <font color="#6b8e23"> <label><b>Contraseña</b></label></font>
                    <input  placeholder="Repite la Contraseña" title="Por favor ingrese la misma Contraseña que anteriormente" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd2" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"><br>
                    <font color="#ff0017"> <label><b><?php
                                $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) ).chr(rand(65,90)) .chr(rand(65,90)); // random(ish)
                                echo $random_number;
                                ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></font>
                    <input type="text" placeholder="captcha" name="captcha" required pattern="<?php echo $random_number; ?>">
                    <div>
                       <button type="submit" class="btn acpetarbtn btn-ms">Registrar</button>
                        <button onclick="document.getElementById('id02').style.display='none'" class=" btn-ms button btn cancelbtn" title="Close">Cancelar</button>
                    </div>
                   </div>
            </form>
        </div>
        <div class="container-fluid text-center bg-1 ">
            <br>
            <div class="row tamaño ">
                <div class="text-center">
                    <span class="btn glyphicon glyphicon-eye-open"></span>
                    <br>
                    <div class="newscontenido">
                       <h1 class="text-center titulo">Bienvenido a WoW Legendary</h1>
                        <?php $con; echo '<p></p>';?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        </div>
        </div>
            </body>

    </html>

