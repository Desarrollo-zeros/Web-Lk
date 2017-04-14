<?php
include_once "../DB/database_Auth.php";
$save ="no";

if(!empty($_GET['save'])){
    echo '<body onload ="document.getElementById(\'id01\').style.display=\'block\'"></body>';
}

if(!empty($_POST)){
    $val = false;
    $id = $_POST['ids'];
    $username = $_POST['usuario'];
    $name = $_POST['name'];
    $titulo = $_POST['titulo'];
    $text = $_POST['comentario'];

    if(!empty(basename($_FILES["imagen"]["name"]))){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["imagen"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {

                $val = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    if($val){

        Guadar_ticket($id,$username,$name,$titulo,$text,$target_file);
         $save="guardado";
        header("Location:panel.php?save=".$save."");
        die();
    }else{
        $ruta = 'no';
        Guadar_ticket($id,$username,$name,$titulo,$text,$ruta);
         $save="guardado";
        header("Location:panel.php?save=".$save."");
        die();
    }
}


function Guadar_ticket($a,$u,$n,$t,$d,$r){
    try{
        $p = "pendiente";
    $conn = Database_Auth::connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO ticket (account, username,name,titulo,detalle,ruta_img,estado) VALUES (:account, :username,:name,:titulo,:detalle,:ruta_img,:estado)");
    $stmt->bindParam(":account", $a);
    $stmt->bindParam(":username", $u);
        $stmt->bindParam(":name", $n);
        $stmt->bindParam(":titulo", $t);
    $stmt->bindParam(":detalle", $d);
    $stmt->bindParam(":ruta_img", $r);
        $stmt->bindParam(":estado", $p);

    $stmt->execute();
    Database_Auth::disconnect();
} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
}
}
?>


