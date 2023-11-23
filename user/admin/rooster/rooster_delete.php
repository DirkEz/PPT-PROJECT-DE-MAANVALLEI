<?php
session_start();
session_id();
include_once '../../config/config.php';
$week = $_GET['week'];
$sql = "DELETE FROM werknemers_rooster WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();
    header('Location: week.php?week=' . $week);
    exit();