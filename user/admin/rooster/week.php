<?php 

include_once '../../user-creation/config/config.php';
$stmt = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2'");
$stmt->execute();
// $stmt3->store_result();
$check = $stmt->fetch();

$maandag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '1'");
$maandag->execute();
$dinsdag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '2'");
$dinsdag->execute();
$woensdag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '3'");
$woensdag->execute();
$donderdag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '4'");
$donderdag->execute();
$vrijdag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '5'");
$vrijdag->execute();
$zaterdag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '6'");
$zaterdag->execute();
$zondag = $connect->prepare("SELECT * FROM werknemers_rooster WHERE week = '2' AND dag = '7'");
$zondag->execute();
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooster</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex weekdagen justify-content-center">
            <div class="maandag weekdag">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Maandag</div>
                </div>
                <div class="container itemsbox">
                    <?php if ($check['dag'] === 1) {
                        while ($dag1 = $maandag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag1['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
            </div>
            <div class="dinsdag weekdag">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Dinsdag</div>
                </div>
                <div class="container itemsbox">
                <?php if ($check['dag'] === 2) {
                        while ($dag2 = $dinsdag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag2['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
                
            </div>
            <div class="woensdag weekdag">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Woensdag</div>
                </div>
                <div class="container itemsbox">
                <?php if ($check['dag'] === 3) { 
                        while ($dag3 = $woensdag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag3['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
                
            </div>
            <div class="donderdag weekdag">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Donderdag</div>
                </div>
                <div class="container itemsbox">
                <?php if ($check['dag'] === 4) {
                        while ($dag4 = $donderdag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag4['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
                
            </div>
            <div class="vrijdag weekdag">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Vrijdag</div>
                </div>
                <div class="container itemsbox">
                <?php if ($check['dag'] === 5) {
                        while ($dag5 = $vrijdag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag5['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
                
            </div>
            <div class="zaterdag weekdag">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Zaterdag</div>
                </div>
                <div class="container itemsbox">
                <?php if ($check['dag'] === 6 ) {
                        while ($dag6 = $zaterdag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag6['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
                
            </div>
            <div class="zondag weekdag ">
                <div class="container titlebox">
                    <div class="d-flex title justify-content-center">Zondag</div>
                </div>
                <div class="container itemsbox">
                <?php if ($check['dag'] === 7) {
                        while ($dag7 = $zondag->fetch()) {
                            ?> 
                            <div class="item"><?php echo $dag7['id']?></div>
                            <?php
                        }
                    } else { 
                        echo "Er is geen rooster voor deze dag";    
                    }?>
                </div>
                
                </div>
    </div>
</body>
</html>