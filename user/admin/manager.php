<?php 

include_once "../../layout/session.php";

if ($_SESSION['loggedin'] == TRUE) {
    if ($_SESSION['positie_id'] != 2) {
        header('location:../login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Manager
    <a href="rooster\week_select.php">Bekijk het rooster</a>
    <a href="../logout.php">Uitloggen</a>
    <a href="/Maasvallei/PPT-PROJECT-DE-MAANVALLEI/user/admin/management\beheer_werknemer.php">Werknemers beheren</a>
    <a href="kampeerplaatsen_inzien.php">Kampeerplaatsen inzien</a>
</body>
</html>