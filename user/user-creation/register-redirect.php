<?php 
    require_once('./config/config.php');
    
    if (isset($_POST['register'])){
        $wachtwoord = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts (email, wachtwoord, telefoon_nummer, voornaam, achternaam)
        VALUES (:email,:wachtwoord,:telnummer,:voornaam,:achternaam)";
        
        $stmt = $connect->prepare($sql);
    
        $stmt->bindParam(":email", $_POST['email']);
        $stmt->bindParam(":wachtwoord", $wachtwoord);
        $stmt->bindParam(":telnummer", $_POST['telefoon_nummer']);
        $stmt->bindParam(":voornaam", $_POST['voornaam']);
        $stmt->bindParam(":achternaam", $_POST['achternaam']);
        
        $stmt->execute();
        
        $result = $stmt->fetch();
        

        $lastInsertedId = $connect->lastInsertId();

        $stmt3 = $connect->prepare("SELECT id, voornaam, achternaam FROM accounts WHERE id = '$lastInsertedId'");
        $stmt3->execute();
        // $stmt3->store_result();
        $row = $stmt3->fetch();
        $naamcheck = $row["voornaam"] . $row["achternaam"];
        $naamvalidate = $_POST['voornaam'] . $_POST['achternaam'];
        echo $naamcheck; 
        echo $naamvalidate;
        if ($naamcheck == $naamvalidate) {
            echo "Correct";
        } else {
            echo 'else';
        }
        $sql2 = "INSERT INTO klanten (voornaam, achternaam, account_id)
        VALUES (:voornaam,:achternaam, :accountid)";
        $stmt2 = $connect->prepare($sql2);
        $stmt2->bindParam(":voornaam", $_POST['voornaam']);
        $stmt2->bindParam(":achternaam", $_POST['achternaam']);
        $stmt2->bindParam(":accountid", $lastInsertedId);
        $stmt2->execute();
        $result = $stmt2->fetch();
        echo $lastInsertedId;
        header("Location: ../login.php");
    } else {
        header("Location: ../register.php");
    }
?>