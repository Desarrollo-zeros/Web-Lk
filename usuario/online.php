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
<body class="xx">
<div class="container">
<div class="row">
    <div class="container-fluid text-center bg-1 ">
        <h2>Jugadores en Linea</h2>
        <h4>WoW-Legendary</h4>
        <img src="../img/Character_banner.jpg" class="img-circle" alt="Avatar">
        <br>
    </div>
    <table class="table table-bordered ">
        <br>
        <pr>
        <a href="index.php" class="btn btn-success">Inicio</a>
        <a href="panel.php" class="btn btn-success">Panel</a>
        </pr>
        <thead>
        <tr class="btn-success">
            <th class="color">Nombre Del Pj</th>
            <th class="color">Level</th>
            <th class="color">Raza</th>
            <th class="color">Clase</th>
            <th class="color">Total Muerte</th>
            <th class="color">Zona</th>
            <!-- <th class="color">Money</th> -->
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        include_once "../DB/database_Characters.php";
        include_once "../class/zone.php";
        $pdo = Database_Characters::connect();
        $sql = "SELECT * FROM characters";

        $reault = $pdo->query($sql,PDO::FETCH_ASSOC);
        foreach ($reault as $row) {
            if($row['online']==1){
                echo '<div class="online">';
                echo '<td class="online"><a href="#">'.$row['name'].'</a></td>';
                echo '<td class="online">'.$row['level'].'</td>';
                if($row['race']==1){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_human-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_human-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                      }
                else if($row['race']==2) {
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_orc-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_orc-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==3){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_dwarf-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_dwarf-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==4) {
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_nightelf-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_nightelf-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==5){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_undead-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_Undead-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==6){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_tauren-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_tauren-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==7){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_gnome-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_gnome-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==8){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_troll-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_troll-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==9){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_goblin-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_goblin-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==10){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_bloodelf-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_bloodelf-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==11){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_draenei-male.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_draenei-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }
                else if($row['race']==22){
                    if($row['gender']==0){
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_worgen-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }else{
                        echo '<td class="online"><img src="../img/race/Ui-charactercreate-races_worgen-female.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                    }
                }


                if($row['class']==1){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_warrior.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==2){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_paladin.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==3){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_hunter.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==4){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_rogue.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==5){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_priest.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==6){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_deathknight.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==7){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_shaman.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==8){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_mage.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==9){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_mage.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                else if($row['class']==11){
                    echo '<td class="online"><img src="../img/clases/Ui-charactercreate-classes_druid.png" class="img-circle center-block" alt="Avatar"  height="35" width="30"></td>';
                }
                echo '<td class="online">'.$row['totalKills'].'</td>';
                //echo '<td class="online"><img src="../img/inv_misc_coin_02.jpg" class="img-circle" alt="Avatar"  height="35" width="30">'.$row['money'].'</td>';
               $zona= $Zona->zona;
                asort($zona);

                foreach($zona as $x => $x_value) {
                    if($row['zone']==$x){
                        echo '<td class="online">'.$x_value.'</td>';
                    }

                }
                echo '</tr>';

            }
        }

        Database_Characters::disconnect();
        ?>
        </tbody>
    </table>
</div>
</div>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
