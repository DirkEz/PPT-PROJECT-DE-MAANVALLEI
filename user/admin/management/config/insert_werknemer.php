<?php
if(isset($_POST['submit'])) {
$sql = "INSERT INTO medewerker (username,voornaam,achternaam,positie_id,account_id)
VALUES (:username,:voornaam,:achternaam, :positie_id, :account_id)";
$stmt = $connect->prepare($sql);
$stmt->bindParam(":titel", $_POST['titel']);
$stmt->bindParam(":prijs", $_POST['prijs']);
$stmt->bindParam(":beschrijving", $_POST['beschrijving']);
$stmt->bindParam(":afbeelding", $_POST['afbeelding']);
$stmt->bindParam(":categorie", $_POST['categorie']);
$stmt->execute();

header('Location: beveiligdepagina.php');
exit();
} else {
header('Location: beveiligdepagina.php');
exit();
}
?>