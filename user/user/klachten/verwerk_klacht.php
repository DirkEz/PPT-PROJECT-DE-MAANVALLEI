<?php 
    require_once('../../config/config.php');
    
    if (isset($_POST['klacht_indienen'])){
        $sql = "INSERT INTO klachten (klant_naam, titel_klacht, bericht)
        VALUES (:klant_naam,:titel_klacht,:bericht)";
        
        $stmt = $con->prepare($sql);

        $stmt->bindParam(":klant_naam", $_POST['klant_naam']);
        $stmt->bindParam(":titel_klacht", $_POST['titel_klacht']);
        $stmt->bindParam(":bericht", $_POST['bericht']);
        $stmt->execute();

        header("Location: ../klachten.php");
    } else {
        header("Location: ../klacht_formulier.php");
    }
?>