<?php


include_once "../../user-creation/config/config.php";
include_once "../../../layout/session.php";

if ($_SESSION['loggedin'] == TRUE) {
    if ($_SESSION['positie_id'] != 2) {
        header('location:../login.php');
    }
}else header('location:../login.php');

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
    <title>Employee Management</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Employee Management</h1>
    <a href="../manager.php" class="btn btn-primary mb-4">Go back</a>

    <section>
        <h2>Add Employee</h2>
        <ul class="list-group">
            <?php foreach($accounts_result as $account): ?>
                <li class="list-group-item">
                    <form action="config/insert_werknemer.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="account_id" value="<?= $account['id'] ?>" type="hidden">
                                <?= $account['voornaam']." ".$account['achternaam']; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <button name="submit_add" type="submit" class="btn btn-success">Add Employee</button>
                            </div>
                        </div>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="mt-4">
        <h2>Remove Employee</h2>
        <ul class="list-group">
            <?php foreach($werknemers_result as $werknemers): ?>
                <li class="list-group-item">
                    <form action="config/insert_werknemer.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="id" value="<?= $werknemers['id'] ?>" type="hidden">
                                <?= $werknemers['username']." ".$werknemers['voornaam']." ".$werknemers['achternaam']; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <button name="submit_delete" type="submit" class="btn btn-danger">Remove Employee</button>
                            </div>
                        </div>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

