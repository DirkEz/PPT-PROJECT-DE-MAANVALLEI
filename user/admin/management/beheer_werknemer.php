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
$accounts_result = $stmt->fetchAll();

$sql = "SELECT * FROM werknemers";
$stmt = $connect->prepare($sql);
$stmt->execute();
$werknemers_result = $stmt->fetchAll();

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
    <?php foreach($accounts_result as $account): {?>
        <form action="config/insert_werknemer.php" method="post">
            <p>
                <input name="account_id" value="<?= $account['id'] ?>" readonly hidden>
                <?=  $account['voornaam']." ".$account['achternaam']; ?>
                <input name="username" readonly hidden value="<?= $account['voornaam']; ?>">
                <input name="voornaam" readonly hidden value="<?= $account['voornaam']; ?>">
                <input name="achternaam" readonly hidden value="<?= $account['achternaam']; ?>">
            <button name="submit_add" type="submit"> Werknemer toevoegen</button>
            </p>
        </form>
   <?php }endforeach; ?>


<h2>Medewerker verwijderen</h2>
<?php foreach($werknemers_result as $werknemers): {?>
    <form action="config/insert_werknemer.php" method="post">
        <p>
            <input name="id" value="<?= $werknemers['id'] ?>" readonly hidden>
            <?=  $werknemers['username']." ".$werknemers['voornaam']." ".$werknemers['achternaam']; ?>
            <button name="submit_delete" type="submit"> Werknemer verwijderen</button>
        </p>
    </form>
<?php }endforeach; ?>
</body>
</html>