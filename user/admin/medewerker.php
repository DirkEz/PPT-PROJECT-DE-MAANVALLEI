<?php 

include_once "../../layout/session.php";
if ($_SESSION['loggedin'] == TRUE) {
    if ($_SESSION['positie_id'] != 1) {
        header('location:../login.php');
    }
}else header('location:../login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Medewerker
    kindje
    <a href="rooster\week_select.php">Bekijk het rooster</a>

    <a href="../logout.php">Uitloggen</a>
</body>
</html>