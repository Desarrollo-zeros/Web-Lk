<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WoW Legendary</title>
    <link rel="stylesheet" href="../css/panel.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<script type="text/javascript">
</script>
<body onload="alert('Que pena me das si estas en la lista, y tu pj cuenta se encuentra aqui y quieres apelar coloca un ticket en la web y pronto veras respuesta')">
<div class="container">
    <div class="row">
        <div class="container-fluid text-center bg-1 ">
            <h2>Jugadores Baneados</h2>
            <h4>WoW-Legendary</h4>
            <img src="../img/Titch-Ix-Game-WoW.ico" class="center-block img-responsive" width="8%" alt="Avatar" onclick="alert('si eres baneado y quieres apelar el baneo o fue injusto deja tu ticket sera respondido y se te dara razon de este')">
            <br>
        </div>
        <table class="table table-bordered ">
            <br>
            <pr>
                <a href="index.php" class="btn btn-success">Inicio</a>
                <a href="../usuario/panel.php" class="btn btn-success">Panel</a>
            </pr>
            <thead>
            <tr class="btn-success">
                <th class="color">id</th>
                <th class="color">usuario</th>
                <th class="color">Tiempo de baneo</th>
                <th class="color">fin del baneo</th>
                <th class="color">razon de baneo</th>
                <th class="color">activo</th>
                <th class="color">Baneados por</th>
            </tr>
            </thead>
            <tbody>

                <?php
                include_once "../DB/database_Auth.php";
                function UnixToDate($t){
                    return date("Y-m-d H:i:s",$t);
                }
                $pdo = Database_Auth::connect();
                $sql = "SELECT account_banned.id, account.username, account_banned.bandate, account_banned.unbandate, account_banned.bannedby, account_banned.banreason, account_banned.active FROM account_banned INNER JOIN account ON account_banned.id = account.id WHERE account_banned.active = 1 ORDER BY account_banned.id";
                $account = $pdo->query($sql,PDO::FETCH_ASSOC);
                Database_Auth::disconnect();
                $filas='';
                $blizz = "<img  class='blizz' src='../img/Blizz.gif'>";
                $blizz1 = "<img  class='blizz1' src='../img/Blizz.gif'>";
                $color ="<i class='bc'>[GM]</i>";
                foreach ($account as $row){
                    $id = $row['id'];
                    $user = $row['username'];
                    $by = $row['bannedby'];

                    $razon = str_replace('"','',$row['banreason']);
                    $razon = str_replace("'","",$razon);
                    $razon = sprintf('El Usuario: %s fue baneado por el '.$blizz.''.$color.'%s, la razon de su baneo fue: %s',$user, $by, $razon);
                    $baneado = UnixToDate($row['bandate']);
                    $baneoFin = UnixToDate($row['unbandate']);
                    if($baneado==$baneoFin){
                        $baneoFin = 'Permanente';
                    }
                    if($row['active']=="1"){
                        $activo = "si";
                    }
                    /*echo '<tr class="ban">
                    <td class="btn-ms btn-warning" onclick="alert(\' %s\')">'.$row['id'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$baneado.'</td>
                    <td>'.$baneoFin.'</td>
                    <td>'.$razon.'</td>
                    <td>'.$activo.'</td>
                    <td>'.$row['bannedby'].'</td>
                    </tr>',$razon;*/
                    $filas .= sprintf('
                    <tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td class="perm">%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                  
                     </tr>',$id,$user,$baneado,$baneoFin,$razon,$activo,$blizz1.$color.$row['bannedby']);
                }
                echo sprintf($filas);



                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
