<?php


include_once "../user-creation/config/config.php";
include_once "../../layout/session.php";

if ($_SESSION['loggedin'] == TRUE) {
    if ($_SESSION['positie_id'] != 2) {
        header('location:../login.php');
    }
}else header('location:../login.php');

$sql = "SELECT * FROM kampeerplaatsen";
$stmt = $connect->prepare($sql);
$stmt->execute();
$kampeerplaats_result = $stmt->fetchAll();

$sql = "SELECT * FROM accounts";
$stmt = $connect->prepare($sql);
$stmt->execute();
$accounts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="manager.php">Go back</a>

<h2>kampeerplaatsen</h2>
<?php foreach ($kampeerplaats_result as $kampeerplaats): ?>
    <form action="config/kampeerplaatsen_bewerken.php" method="post">
        <p>
            <input name="id" value="<?= $kampeerplaats['id'] ?>" readonly>
            <input name="kampeernummer" value="<?= $kampeerplaats['kampeerplek_nummer']; ?>" readonly>
            <select name="klant_id">
                <option value="">-- Selecteer een account --</option> <!-- Default empty option -->
                <?php foreach ($accounts as $account): ?>
                    <option value="<?= $account['id'] ?>" <?= ($kampeerplaats['klant_id'] == $account['id']) ? 'selected' : '' ?>>
                        <?= $account['voornaam'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            </select>
            <input name="betaald" value="<?= $kampeerplaats['betaald']; ?>">
            <input name="bezet" value="<?= $kampeerplaats['bezet']; ?>">
            <input name="schoongemaakt" value="<?= $kampeerplaats['schoongemaakt']; ?>">
            <button name="update" type="submit">update</button>
            <button name="reset" type="submit">reset</button>
        </p>
    </form>
<?php endforeach; ?>


</body>
</html>