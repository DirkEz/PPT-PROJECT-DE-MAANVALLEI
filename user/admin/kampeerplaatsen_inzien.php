<?php
include_once "../user-creation/config/config.php";
include_once "../../layout/session.php";

if ($_SESSION['loggedin'] == TRUE) {
    if ($_SESSION['positie_id'] != 1 && $_SESSION['positie_id'] != 2) {
        header('location:../login.php');
    }
} else header('location:../login.php');

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
    <title>Kampeerplaatsen List</title>
    <!-- Add Bootstrap CSS Link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="manager.php">Go back</a>

<div class="container">
    <h2 class="mt-4">Kampeerplaatsen</h2>
    <ul class="list-group mt-3">
        <?php foreach ($kampeerplaats_result as $kampeerplaats): ?>
            <li class="list-group-item">
                <form action="config/kampeerplaatsen_bewerken.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <input name="id" value="<?= $kampeerplaats['id'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <input name="kampeernummer" value="<?= $kampeerplaats['kampeerplek_nummer']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="klant_id" class="form-control">
                                <option value="">-- Selecteer een account --</option>
                                <?php foreach ($accounts as $account): ?>
                                    <option value="<?= $account['id'] ?>" <?= ($kampeerplaats['klant_id'] == $account['id']) ? 'selected' : '' ?>>
                                        <?= $account['voornaam'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <input name="betaald" value="<?= $kampeerplaats['betaald']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <input name="bezet" value="<?= $kampeerplaats['bezet']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <input name="schoongemaakt" value="<?= $kampeerplaats['schoongemaakt']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <button name="update" type="submit" class="btn btn-primary">Update</button>
                            <button name="reset" type="submit" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Add Bootstrap JS Link -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
