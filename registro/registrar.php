<?php
include_once "class/users.php";
if(!empty($_POST)){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pwd1'];

    if($users->ValidarUsuario($username)){  echo '<body onload ="alert(\'Usuario ya existe\')"></body>';
        header("Location:../index.php?usuario=existe");

    }
    if($users->ValidarCorreo($email)){
       header("Location:../index.php?correo=existe");
    }
    else{
        echo "bien";
        $users->GuardarDB($username,$pass,$email);
        header("Location:../index.php");
    }

}

?>

