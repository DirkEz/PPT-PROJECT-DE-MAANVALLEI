<?php
include_once('../../config/config.php');

$sql = "SELECT * FROM klachten";
$stmt = $con->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();
$klachten_result = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Klachten</title>
</head>
<body>

<table>

<?php 


foreach($klachten_result as $klachten): 
    if ($klachten['verwerkt'] == 0) {?>
<tr>
    <td><?= $klachten['klant_naam']?></td>
    <td><?= $klachten['titel_klacht']?></td>
    <td><?= $klachten['bericht']?></td>
</tr>
<?php } endforeach; ?>
</table>


</body>
</html>
