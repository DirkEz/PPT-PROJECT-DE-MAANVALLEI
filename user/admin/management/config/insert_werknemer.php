<?php

include_once "../../../user-creation/config/config.php";
if(isset($_POST['submit_add'])) {
$sql = "INSERT INTO werknemers (username,voornaam,achternaam,account_id)
VALUES (:username,:voornaam,:achternaam, :account_id)";
$stmt = $connect->prepare($sql);
$stmt->bindParam(":username", $_POST['username']);
$stmt->bindParam(":voornaam", $_POST['voornaam']);
$stmt->bindParam(":achternaam", $_POST['achternaam']);
$stmt->bindParam(":account_id", $_POST['account_id']);
$stmt->execute();

header('Location: ../beheer_werknemer.php');
exit();
} else

if(isset($_POST['submit_delete'])) {
    $sql = "DELETE FROM werknemers WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->execute();
    header('Location: ../beheer_werknemer.php');
    exit();
} else {
    header('Location: ../beheer_werknemer.php');
    exit();
}
?>