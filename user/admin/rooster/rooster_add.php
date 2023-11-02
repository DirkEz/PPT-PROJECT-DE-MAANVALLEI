<?php 

include_once '../../config/config.php';
session_start();
$stmt = $connect->prepare("SELECT * FROM werknemers");
$stmt->execute();
$userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $connect->prepare("SELECT * FROM weken");
$stmt2->execute();
$weekData = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$stmt3 = $connect->prepare("SELECT * FROM dagen");
$stmt3->execute();
$dagData = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// $week = $_GET['week'];
// echo $terug;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooster Toevoegen</title>
</head>
<body>
    <a href="./week_select.php">Terug</a>
    <form method="POST" action="rooster_add-redirect.php">
        <label for="werknemer">Werknemer</label> 
        <select name="werknemer" id="werknemer">
        <?php foreach ($userData as $user) {
            ?>
            <option value="<?= $user['id'] ?>">
                <?= $user['voornaam'] . " " . $user['achternaam']?>
            </option>
            <?php } ?>
        </select> <br>
        <label for="week">Week</label>
        <select name="week" id="week">
            <?php foreach ($weekData as $week) {?>
                <option value="<?= $week['id'] ?>">
                    <?= $week['week'] . " " . $week['jaar']; ?>
                </option>
            <?php } ?>
        </select> <br>
        <label for="dag">Dag</label>
        <select name="dag" id="dag">
            <?php foreach ($dagData as $dag) {?>
                <option value="<?= $dag['id'] ?>">
                    <?= $dag['dag']; ?>
                </option>
            <?php } ?>
        </select> <br>
        <label for="begin_tijd">Begin Tijd</label>
        <select name="begin_tijd" id="begin_tijd">
            <?php
            // Loop through hours from 0 to 23 (for 24-hour format)
            for ($hour = 0; $hour < 24; $hour++) {
                // Loop through minutes (increments of 15 minutes)
                for ($minute = 0; $minute < 60; $minute += 15) {
                    // Format the time as HH:MM
                    $time = sprintf("%02d:%02d", $hour, $minute);
                    // Print the option tag with the formatted time value
                    echo '<option value="' . $time . '">' . $time . '</option>';
                }
            }
            ?>
        </select> <br>
        <label for="eind_tijd">Eind Tijd</label>
        <select name="eind_tijd" id="eind_tijd">
            <?php
            // Loop through hours from 0 to 23 (for 24-hour format)
            for ($hour = 0; $hour < 24; $hour++) {
                // Loop through minutes (increments of 15 minutes)
                for ($minute = 0; $minute < 60; $minute += 15) {
                    // Format the time as HH:MM
                    $time = sprintf("%02d:%02d", $hour, $minute);
                    // Print the option tag with the formatted time value
                    echo '<option value="' . $time . '">' . $time . '</option>';
                }
            }
            ?>
        </select> <br>
        <input type="submit" value="Invoeren" name="add_rooster">
    </form>
</body>
</html>