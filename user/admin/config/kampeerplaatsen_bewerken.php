<?php

include_once "../../user-creation/config/config.php";

// Insert werknemer
if(isset($_POST['update'])) {
    if($_POST['klant_id'] == "")
    {
        $sql = "UPDATE kampeerplaatsen SET betaald = :betaald, bezet = :bezet, schoongemaakt = :schoongemaakt WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":id", $_POST['id']);
        $stmt->bindParam(":betaald", $_POST['betaald']);
        $stmt->bindParam(":bezet", $_POST['bezet']);
        $stmt->bindParam(":schoongemaakt", $_POST['schoongemaakt']);
        $stmt->execute();
        header('Location: ../kampeerplaatsen_inzien.php');
    }else
    $sql = "UPDATE kampeerplaatsen SET klant_id = :klant_id, betaald = :betaald, bezet = :bezet, schoongemaakt = :schoongemaakt WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->bindParam(":klant_id", $_POST['klant_id']);
    $stmt->bindParam(":betaald", $_POST['betaald']);
    $stmt->bindParam(":bezet", $_POST['bezet']);
    $stmt->bindParam(":schoongemaakt", $_POST['schoongemaakt']);
    $stmt->execute();
        header('Location: ../kampeerplaatsen_inzien.php');
} else

    //reset table
    if (isset($_POST['reset'])) {
        $sql = "UPDATE kampeerplaatsen SET klant_id = NULL, betaald = 0, bezet = 0, schoongemaakt = 0 WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(":id", $_POST['id'], PDO::PARAM_INT); // Assuming id is an integer
        $stmt->execute();
        header('Location: ../kampeerplaatsen_inzien.php');
    }

// URL security
    else {
        header('Location: ../beheer_werknemer.php');
        exit();
    }
?>