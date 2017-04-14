<link rel="stylesheet" href="css/login.css">

<?php
include_once "/DB/database_Auth.php";
$usuario = '';
if(!empty($_POST)) {
    $usuario = $_POST['username'];
    $conn = Database_Auth::connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT username FROM account WHERE username = :username");
    $stmt->bindParam(":username", $usuario);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data['username'] != "") {
        echo '<img src="img/Blizz_vs.gif" width="18%"><label id="Error" class="danger">Usuario ya Existe</label>';
    }

}
?>