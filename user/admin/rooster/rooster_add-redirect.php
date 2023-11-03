<?php 
include_once '../../config/config.php';
    
    if (isset($_POST['add_rooster'])){
        $sql = "INSERT INTO werknemers_rooster (werknemer_id, begin_tijd, eind_tijd, dag, week)
        VALUES (:id,:begin_tijd,:eind_tijd,:dag,:week)";
        
        $stmt = $connect->prepare($sql);
    
        $stmt->bindParam(":id", $_POST['werknemer']);
        $stmt->bindParam(":week", $_POST['week']);
        $stmt->bindParam(":dag", $_POST['dag']);
        $stmt->bindParam(":begin_tijd", $_POST['begin_tijd']);
        $stmt->bindParam(":eind_tijd", $_POST['eind_tijd']);
        
        $stmt->execute();

        header("Location: week.php?week=" . $_POST['week']);
    } else {
        header("Location: week.php?week=" . $_POST['week']);
    }
?>