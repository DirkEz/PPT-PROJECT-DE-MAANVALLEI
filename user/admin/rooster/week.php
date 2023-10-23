<?php 
include_once '../../config/config.php';
$week = $_GET['week'];
$stmt = $connect->prepare("SELECT wr.*, w.voornaam, w.achternaam FROM werknemers_rooster wr JOIN werknemers w ON wr.werknemer_id = w.id WHERE wr.week = '$week'");
$stmt->execute();
$roosterData = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

        <?php 
        $days = ['Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'];
        for ($i = 1; $i <= 7; $i++) {
            $currentDayData = array_filter($roosterData, function($row) use ($i) {
                return $row['dag'] == $i;
            });
        ?>
        <div class="weekdag">
            <div class="container titlebox">
                <div class="d-flex title justify-content-center"><?php echo $days[$i - 1]; ?></div>
            </div>
            <div class="container itemsbox">
                <?php if (!empty($currentDayData)) {
                    foreach ($currentDayData as $row) {
                        ?><div class="item mt-1 w-90 bg-info">
                            
                            <?=  $row['id'] ;?> </div> <?php 
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