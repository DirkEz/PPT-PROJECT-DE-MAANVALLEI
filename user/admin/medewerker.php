<?php 

include_once "../../layout/session.php";

if ($_SESSION['positie_id'] != 1) {
    header('../login.php');
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
    Medewerker
    <a href="../logout.php">Uitloggen</a>
</body>
</html>