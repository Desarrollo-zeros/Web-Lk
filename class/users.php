<?php
require "../WoW/DB/database_Auth.php";
    class user
    {
        function PassGenerar($rut, $pass)
        {
            $spass = sha1(sprintf('%s:%s', strtoupper($rut), strtoupper($pass)));
            $spass = strtoupper($spass);
            return $spass;
        }

        public function ValidarUsuario($uname)
        {
            $conn = Database_Auth::connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM account WHERE username = :username");
            $stmt->bindParam(":username", $uname);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data['username']!=""){
                return true;
            }
            Database_Auth::disconnect();
        }

        public function ValidarCorreo($email)
        {
            $conn = Database_Auth::connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM account WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data['email']!=""){
                return true;
            }
            Database_Auth::disconnect();
        }


        public function loginDB($uname,$psw)
        {
            $valid = true;
            $spass = $this->PassGenerar($uname, $psw);
            try {
                if($valid){
                    $conn = Database_Auth::connect();
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt =  $conn->prepare("select *from account where username = :usuario and  sha_pass_hash = :password"); //Preparamos la SELECT, de ésta manera evitamos SQL Injection
                    $stmt-> bindParam(':usuario', $uname); //Substituimos las variables de la SELECT
                    $stmt-> bindParam(':password', $spass); //Substituimos las variables de la SELECT
                    $stmt-> execute(); //Ejecutamos la consulta
                    $contador = $stmt -> rowCount(); //Esta función devuelve el número de resultados que ha devuelto la SELECT
                    //si obtenemos los datos del usuario...
                    if($contador==1){
                        if($this->PassGenerar($uname,$psw)){
                            return true;
                        }
                    }
                    else{
                        return false;
                    }
                }
            } catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GuardarDB($name,$pass,$email){
            try{
                $sha_pass_hash = $this->PassGenerar($name,$pass);
                $conn = Database_Auth::connect();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO account (username,sha_pass_hash,email,reg_mail) VALUES (:username,:sha_pass_hash,:email,:reg_mail)");
                $stmt->bindParam(":username", $name);
                $stmt->bindParam(":sha_pass_hash", $sha_pass_hash);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":reg_mail",$email);
                $stmt->execute();
                Database_Auth::disconnect();
               echo 'existo';
            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }

};
$users = new user();

