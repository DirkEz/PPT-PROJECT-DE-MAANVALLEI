<?php
    // Controleer of het formulier is ingediend
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verkrijg de waarden van het formulier
        $klant_id = $_POST["klant_id"];
        $titel_klacht = $_POST["titel_klacht"];
        $bericht = $_POST["bericht"];

        // Valideer de invoer
        if (empty($klant_id) || empty($titel_klacht) || empty($bericht)) {
            echo "Vul alstublieft alle velden in.";
        } else {
            $sql = "INSERT INTO klachten (klant_id, titel_klacht, bericht, verwerkt)
            VALUES (:klant_id,:titel_klacht,:bericht,:verwerkt)";

            // Voorbeeld: Toon de ingediende gegevens
            // echo "Klant ID: " . $klant_id . "<br>";
            // echo "Titel Klacht: " . $titel_klacht . "<br>";
            // echo "Klacht: " . $bericht . "<br>";

            // Reset de waarden na het indienen van het formulier
            $klant_id = $titel_klacht = $bericht = "";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Klacht indienen</title>
</head>
<body>
    <h1>Klacht indienen</h1>
    <form method="post" action="verwerk_klacht.php">
        <label for="klant_id">Klant ID:</label><br>
        <input type="text" name="klant_id" id="klant_id"><br><br>
        <label for="titel_klacht">Titel klacht:</label><br>
        <input type="text" name="titel_klacht" id="titel_klacht"><br><br>
        <label for="bericht">Klacht bericht:</label><br>
        <textarea name="bericht" id="bericht" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Indienen">
    </form>
</body>
</html>
