<?php 

include_once "../../layout/session.php";

if (!isset($_SESSION['loggedin'])) {
    if ($_SESSION['positie_id'] != 2) {
        header('../login.php');
        exit;
    } else {
        echo "hoi!";
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
    <a href="../logout.php">Uitloggen</a>
    <a href="/Maasvallei/PPT-PROJECT-DE-MAANVALLEI/user/admin/management\beheer_werknemer.php">Werknemers beheren</a>
</body>
</html>