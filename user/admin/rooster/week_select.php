<?php 
include_once '../../config/config.php';
$stmt = $connect->prepare("SELECT * FROM weken");
$stmt->execute();
$weekData = $stmt->fetchAll(PDO::FETCH_ASSOC);
$desiredId = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-center">
    <div class="select">
            <form method="GET" action="week.php?week=<?= $desiredId; ?>">
                <label for=""> Week: </label>
                <select name="week" id="week">
                    <?php foreach ($weekData as $row) {
                        $selected = ($row['id'] == $desiredId) ? 'selected' : '';
                        ?>
                        <option value="<?= $row['id'] ?>" <?= $selected ?>>
                            <?= $row['week'] . " " . $row['jaar']; ?>
                        </option>
                    <?php } ?>
                </select>
                <input type="submit" value="sd">



            </form>
        </div>
    </div>
</body>
</html>