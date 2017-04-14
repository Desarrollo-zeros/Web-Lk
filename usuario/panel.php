<?php
require 'on.php';
include_once "../DB/database_Auth.php";
include_once "ticket.php";
//include_once "../class/users.php";

$submi = '';

function eliminar($id){
    $conn = Database_Auth::connect();
    $sql = "DELETE FROM ticket WHERE id = :id";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    Database_Auth::disconnect();
    $save = "guardado";
    header("Location:panel.php?save=" . $save . "");
}


    if(!empty($_SESSION['uname'])) {


        $readonly = null;
        $r = null;
        $id = null;
        $editar = null;
        $conn = Database_Auth::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM account WHERE username = :username");
        $stmt->bindParam(":username", $_SESSION['uname']);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        Database_Auth::disconnect();
        date_default_timezone_set('america/bogota');
        $pdo = Database_Characters::connect();
        $sql = "SELECT * FROM characters";
        $reault = $pdo->query($sql, PDO::FETCH_ASSOC);
        Database_Characters::disconnect();
        $aliz = 0;
        $horda = 0;
        foreach ($reault as $row) {
            if ($row['online'] == 1) {
                if ($row['race'] == 1 or $row['race'] == 3 or $row['race'] == 4 or $row['race'] == 7 or $row['race'] == 11) {
                    $aliz += 1;
                } else {
                    if ($row['race'] == 2 or $row['race'] == 5 or $row['race'] == 6 or $row['race'] == 8 or $row['race'] == 10) {
                        $horda += 1;
                    }
                }
            }
         }
        if(!empty($_GET)) {
            if(!empty($_GET['mantenimiento'])){
                if($_GET['mantenimiento']=="mantenimiento")
                echo '<body onload ="return confirm(\'editar en mantenimiento crea nuevo ticket y elimina el antiguo\')"></body>';
                
            }
            if (!empty($_GET['r']) and (!empty($_GET['id']))) {
                $readonly = "";
                $r = $_GET['r'];
                $id = $_GET['id'];
                if ($r == 1) {
                    $conn = Database_Auth::connect();
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM ticket WHERE id = :id");
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    $editar = $stmt->fetch(PDO::FETCH_ASSOC);
                    Database_Auth::disconnect();
                    $readonly = "readonly";
                    $save = "guardado";
                    $submi = 1;
                    echo '<body onload ="document.getElementById(\'id01\').style.display=\'block\'"></body>';
                } else if ($r == 2) {
                    $conn = Database_Auth::connect();
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM ticket WHERE id = :id");
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    $editar = $stmt->fetch(PDO::FETCH_ASSOC);
                    Database_Auth::disconnect();
                    $readonly = "";
                    $save = "guardado";
                    $submi = 2;
                    echo '<body onload ="document.getElementById(\'id01\').style.display=\'block\'"></body>';
                } else if ($r == 3) {
                    eliminar($id);

                }
                else {
                    $readonly = null;
                    $r = null;
                    $id = null;
                }
            }
            if(!empty($_GET['x'])){
             if($_GET['x']=="x"){
                    echo '<body onload ="document.getElementById(\'id01\').style.display=\'block\'"></body>';
                }
            }

        }
            }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Panel WoW Legendary</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/tticket.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
      <script src='../Herramientas/autozise/dist/autosize.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="../css/bootstrap-combobox.css" media="screen" rel="stylesheet" type="text/css">
    <script src="../js/bootstrap-combobox.js" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Herramientas/file/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../Herramientas/file/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../Herramientas/file/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../Herramientas/file/js/fileinput.js" type="text/javascript"></script>
    <script src="Herramientas/file/js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="Herramientas/file/js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="../Herramientas/file/themes/explorer/theme.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/login.js"></script>
</head>
<body class="img">


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
                <li><a href="online.php">Online</a></li>
                <li><a href="#">Foro</a></li>
                <li><a onclick="document.getElementById('id01').style.display='block'">ticket</a></li>
                <li><a href="https://www.facebook.com/WoWLegendary335a">Facebook</a></li>
                <li><a onclick="alert('pagina en construcion')">Armeria</a></li>
                <li><a onclick="alert('pagina en construcion')">Migraciones</a></li>
                <li><a href="baneados.php">Baneados</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="salir.php"><span class="glyphicon glyphicon-remove"></span> Salir</a></li>
                <li><a onclick="alert('pagina en construcion')"><span class="glyphicon glyphicon-user"></span> Mi cuenta</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-3 well">
            <div class="well">
                <p><a href="#">My Profile</a></p>
                <img src="../img/avatar.gif" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="well">
                <p><a href="#">interes</a></p>
                <p>
                    <span class="label label-default">News</span>
                    <span class="label label-primary">juegos</span>
                    <span class="label label-success">wow</span>
                    <span class="label label-info">LK</span>
                    <span class="label label-warning">Cata</span>
                    <span class="label label-danger">Legion</span>
                </p>
            </div>
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                <p><strong>Ey!</strong></p>
              No te vallas sin Jugar
            </div>
            <p><a href="#"></a></p>
            <p><a href="#"></a></p>
            <p><a href="#"></a></p>
        </div>
        <div class="col-sm-7">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default text-left">
                        <div class="panel-body">
                            <?php

                            if(!empty($_SESSION)) {
                            $online = $chara->Online();
                            if ($online == 0) {
                                $on = 'Offline';
                            } else {
                                $on = 'Online';
                            }

                            echo '<P class="glyphicon glyphicon-envelope txt"><label>Usuario: </label></P> <i class="txt1 btn boton">'.$data['username'].'</i>';echo  '
              <br>  <P class="glyphicon glyphicon-envelope txt"><label>Correo: </label></P>  ';echo '<i class="txt1 btn boton0">'.$data['email'].'</i>'; echo '
              <br>  <P class="glyphicon glyphicon-star-empty txt"><label>Rango-GM/Admin: </label></P> ';echo '<i class="txt1 btn boton1">'.$data['Gm'].'</i>'; echo'
              <br> <P class="glyphicon glyphicon-off txt"><label>Online/Offline: </label></P> ';echo '<i class="txt1 btn boton2">'.$data['online'].'</i>'; echo '
                 <br>  <P class="glyphicon glyphicon-calendar txt"><label>Registrado: </label></P> ';echo '<i class="txt1 btn boton3">'.$data['joindate'].'</i>'; echo '
                 <br>   <P class="glyphicon glyphicon-usd txt"><label>DP-Donacion: </label></P> ';echo '<i class="txt1 btn boton4">'.$data['Dp'].'</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid text-center bg-1 ">
                <h2>Panel De Usuario</h2>
                <h4>WoW-Legendary</h4>
                <br>
                <div class="row tamaño ">
                    <div class="col-sm-4">
                        <span class="btn glyphicon glyphicon-eye-open"></span>
                        <h4>Vote Panel</h4>
                        <p>Panel De Votacion</p>
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <span class="btn glyphicon glyphicon-credit-card"></span>
                        <h4>Donate Panel</h4>
                        <p>Panel De Donacion</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="btn glyphicon glyphicon-shopping-cart"></span>
                        <h4>Items Store</h4>
                        <p>Tienda De Items</p>
                    </div>
                </div>
                <br><br>
                <div class="row tamaño">
                    <div class="col-sm-4">
                        <span class="btn glyphicon glyphicon-wrench"></span>
                        <h4>Account Setting</h4>
                        <p>Herramienta De Cuentas</p>
                    </div>
                    <div class="col-sm-4">
                        <span class="btn glyphicon glyphicon-certificate"></span>
                        <h4>Informacion de Cuenta</h4>
                    </div>
                    <div class="col-sm-4"">
                    <span class="btn glyphicon glyphicon-leaf"></span>
                    <h4>Migracion</h4>
                    <p>Tranfiere tu PJ a Nuestro server</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2  well">
        <div class="thumbnail">
            <p>World Of Warcraft:</p>
            <img src="../img/imgwow.gif" alt="WoW" class ="btn" style="width:500% height:400%">
            <p><strong>Admin Dev Zeros Developers</strong></p>
            <button  class="button btn "><a href="https://www.facebook.com/carlos.castilla.79">Visitar</a></button>
        </div>
        <h5><a href="online.php"><p class="btn glyphicon glyphicon-globe"><p>'.$on.'</p></p></a></h5>
        <div class="progress">
            <div id="demo2" class="progress-bar progress-bar-striped btn-danger active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                <i id="demo1">'.$online.'</i>
            </div>
        </div>
        <div class="aliz">
            <td class="aliz">'.$aliz.'<img src="../img/alliance.png "></td>&nbsp;&nbsp;&nbsp;&nbsp;
            <td><img src="../img/horde.png">'.$horda.'</td>
            <p id="demo"></p>
        </div>
        <div class="well-lg well-lg">
        </div>


    </div>
</div>
</div>';}else{header("location:../index.php"); exit();}?>

<footer class="container-fluid text-center">
    <p>Dev zeros</p>
</footer>






    <div id="id01" class="modal1">
        <?php


        if($submi == 2){
            $btn = "guardar";
            echo ' <form class="modal1-content animate" enctype="multipart/form-data" action="ticketD.php"  method="post">';
        }
        else if($submi ==1){
            $btn ="ver";
            echo ' <form class="modal1-content animate" enctype="multipart/form-data" action="ticket.php"  method="post">';
        }
        else{
            $btn ="enviar";
            echo ' <form class="modal1-content animate" enctype="multipart/form-data" action="ticket.php"  method="post">';
        }
        ?>

            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="../img/ticket.jpg" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <div class="col-sm-10 row">
                    <div class=" form-inline form-group">
                        <select name="ids" class="form-control">
                            <option value="<?php echo $data['id'];?>" selected="selected" requiered><?php echo $data['id'];?></option>
                        </select>
                        <select name="usuario" class="form-control">
                            <option value="<?php echo $data['username'];?>" selected="selected"><?php echo $data['username'];?></option>
                        </select>
                       <br> <label class="textarea">Titulo</label><br>
                        <input  maxlength="16" type="text" placeholder="Problema" name="titulo"  <?php echo $readonly;?> required value="<?php echo ''.$editar['titulo'].'';?>">
                       <br> <label class="textarea">Nombre del pj</label><br>
                        <select name="name" class="form-control">

                            <?php
                            $pdo1 = Database_Characters::connect();
                            $sql1 = "SELECT * FROM characters";
                            $reault1 = $pdo1->query($sql1,PDO::FETCH_ASSOC);
                            foreach ($reault1 as $row) {
                                if ($row['account'] == $data['id']) {
                                    echo '<option selected="selected" value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                }
                            }
                            Database_Characters::disconnect();
                            ?>
                      </select>
                    </div>
                </div>
                <textarea  class="txt3" name="comentario" rows="5" cols="85" placeholder="Comentario del Ticket"  <?php echo $readonly;?> required><?php echo ''.$editar['detalle'].'';?></textarea>
                <br><label class="textarea">Repusta del GM</label><br>
                <?php
                $pdo = Database_Auth::connect();
                $sql = "SELECT * FROM ticket";
                $reault = $pdo->query($sql,PDO::FETCH_ASSOC);
                Database_Auth::disconnect();
                foreach ($reault as $row){
                    if($row['account']==$data['id']){
                        echo '<textarea  class="txt3" name="comentario" rows="5" cols="85" placeholder="Repuesta del ticket" readonly>'.$row['respuesta'].'</textarea>'  ;
                    }
                }
                ?>
                <div class="container kv-main">
                    <div class="form-group">
                        <label class="textColor">Prueba Foto Grafica Nombre del Pj+Titulo ejemplo:</label>
                        <br>
                        <label class="textColor">zeros_Ejemplo.jgp, debes ingresar solo una imagen</label>
                        <input name="imagen" id="imagen" type="file" size="50" multiple >
                    </div>
                    <br>
                </div>
                <?php

                if($btn=="guardar"){
                echo '<button type="submit " name="submit" class="btn  acpetarbtn2">'.$btn.'</button>';
                echo' <a class="btn acpetarbtn2" href="panel.php?x=x">nuevo</a>';
                }
                else if($btn == "ver"){
                   echo' <a class="btn acpetarbtn2" href="panel.php?x=x">nuevo</a>';
                }
                else{
               echo ' <button type="submit " name="submit" class="btn  acpetarbtn2">'.$btn.'</button>';
                }
                ?>

                 <span onclick="document.getElementById('id01').style.display='none'" class="button btn cancelbtn" title="Close">Cancelar</span>
                <script>
                    autosize(document.querySelectorAll('textarea'));
                </script>
                <script>
                    $('#file-es').fileinput({
                        language: 'es',
                        uploadUrl: '#',
                        allowedFileExtensions: ['jpg', 'png', 'gif']
                    });
                    $("#imagen").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-primary btn-lg",
                        fileType: "any",
                        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                        overwriteInitial: false,
                        initialPreviewAsData: true,
                    });
                </script>
                <br>
                <br>
                <table width="50%"">
                    <thead>
                    <tr>
                        <th class="textcolor">ID&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th   class="textcolor">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th class="textcolor">Titulo</th>
                    </tr>
                    </thead>

                    <tbody>

                        <?php
                        $pdo = Database_Auth::connect();
                        $sql = "SELECT * FROM ticket";
                        $reault = $pdo->query($sql,PDO::FETCH_ASSOC);
                        Database_Auth::disconnect();
                        foreach ($reault as $row){
                            if($row['account']==$data['id']){
                                if($row['estado']=="Pendiente"){
                                    $estado= "<i class='Estado2'>".$row["estado"]."</i>";
                                }
                                else{
                                    $estado= "<i class='Estado1'>".$row["estado"]."</i>";
                                }
                                echo '
                                <tr>
                               <td class="textC">'.$row['id'].'</td>
                               <td class="textC">'.$row['username'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                               <td class="textC">'.$row['titulo'].'&nbsp;&nbsp;&nbsp;</td>
                               <td><a class="btn btn-primary btn-sm" href="panel.php?id='.$row['id'].'&r=1">Ver</a>
                               <a class="btn btn-success btn-sm" href="panel.php?id='.$row['id'].'&r=2">actualizar</a>
                               <a onclick="return confirm(\'deseas elimar al ticket del sistema?\')" class="btn btn-danger btn-sm" href="panel.php?id='.$row['id'].'&r=3">Eliminar</a>
                               <a class="Estadox btn-ms">'.$estado.'</a></td>
                               </tr>';
                               }
                        }
                        ?>
                    </div>
                </table>
            </div>
        </form>
    </div>
</body>



</html>
