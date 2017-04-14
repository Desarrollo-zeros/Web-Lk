<?php
session_start();
require "../DB/database_Characters.php";
$data = null;
if(!$_SESSION['uname']){
    header("location:index.php");
}
class online{
    function Online(){
        $onli = 1;
        $conn = Database_Characters::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select *from characters where online= :online");
        $stmt-> bindParam(':online', $onli);
        $stmt->execute();
        $contador = $stmt->rowCount();
        return $contador;
    }
};
$chara = new online();

