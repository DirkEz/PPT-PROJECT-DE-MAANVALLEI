<?php 
session_start();
session_id();
include_once '../../config/config.php';
$week = $_GET['week'];
// $_GET['terug'] = $_GET['week'];
$stmt = $connect->prepare("SELECT wr.*, w.voornaam, w.achternaam FROM werknemers_rooster wr JOIN werknemers w ON wr.werknemer_id = w.id WHERE wr.week = '$week'");
$stmt->execute();
$roosterData = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/b72f5a32f8.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooster</title>
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
<body>
    <a class="back_button" href="./week_select.php">Terug</a>
    <?php if ($_SESSION['admin_id'] == 2) { ?> <a href="rooster_add.php"><Button id="toevoegen">rooster toevoegen</Button></a><?php }?>   
    <div class="d-flex weekdagen justify-content-center">

    
        <?php 
        $days = ['Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'];
        for ($i = 1; $i <= 7; $i++) {
            $currentDayData = array_filter($roosterData, function($row) use ($i) {
                return $row['dag'] == $i;
            });
        ?>
        <div class="weekdag">
 
            <div class="container titlebox">
           
                <div class="d-flex title justify-content-center">
               
                <?php echo $days[$i - 1]; ?></div>
            </div>
            <div class="container itemsbox">
                
                
                <?php if (!empty($currentDayData)) {
                    foreach ($currentDayData as $row) { 

                        $begin_tijd = substr($row['begin_tijd'], 0, -3); // Remove last 3 characters ":00"
                        $eind_tijd = substr($row['eind_tijd'], 0, -3); // Remove last 3 characters ":00"

                        ?><div class="item mt-1 w-90 bg-info">
                            <div class="naam"> <?=  $row['voornaam'] ?> </div>
                            <div class="tijd"><?= "\n" . $begin_tijd . " - " . $eind_tijd;?></div> 
                            </div> <?php 
                    }
                } else { 

                    echo " Er is geen rooster voor deze dag";    
                }?>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html> 