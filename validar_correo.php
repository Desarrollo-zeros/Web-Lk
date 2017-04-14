<link rel="stylesheet" href="css/login.css">
<?php
include_once "/DB/database_Auth.php";

    if(!empty($_POST)){
        $email = $_POST['email'];
        $conn = Database_Auth::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT email FROM account WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data['email'] != "") {
            echo '<img src="img/Blizz_vs.gif" width="18%"><label id="Error1" class="danger">Correo ya Existe</label>';
        }
    }

