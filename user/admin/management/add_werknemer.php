<?php 


include_once "../../user-creation/config/config.php";
include_once "../../../layout/session.php";

if (!isset($_SESSION['loggedin'])) {
        if ($_SESSION['positie_id'] != 2) {
        header('../login.php');
        exit;
    } else {
        echo "hoi!";
    }
}

$sql = "SELECT * FROM accounts";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

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
<a href="../manager.php">Go back</a>

<h2>Medewerker toevoegen</h2>

    <?php foreach($result as $account): {?>
        <form action="config/insert_werknemer.php">
            <p>
            <input type=""placeholder="<?= $account['id'] ?>" readonly hidden>
            <?=  $account['voornaam']." ".$account['achternaam']; ?>
            <button type="submit"> Werknemer toevoegen</button>
            </p>
        </form>
   <?php }endforeach; ?>

</body>
</html>