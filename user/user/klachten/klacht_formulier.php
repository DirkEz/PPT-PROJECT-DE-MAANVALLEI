<?php
    // Controleer of het formulier is ingediend
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verkrijg de waarden van het formulier
        $klant_id = $_POST["klant_id"];
        $titel_klacht = $_POST["titel_klacht"];
        $klacht = $_POST["klacht"];

        // Valideer de invoer
        if (empty($klant_id) || empty($titel_klacht) || empty($klacht)) {
            echo "Vul alstublieft alle velden in.";
        } else {
            // Hier zou je verdere acties kunnen ondernemen, zoals het opslaan van de klacht in een database of het verzenden van een e-mail.

            // Voorbeeld: Toon de ingediende gegevens
            echo "Klant ID: " . $klant_id . "<br>";
            echo "Titel Klacht: " . $titel_klacht . "<br>";
            echo "Klacht: " . $klacht . "<br>";

            // Reset de waarden na het indienen van het formulier
            $klant_id = $titel_klacht = $klacht = "";
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
        <label for="klacht">Klacht bericht:</label><br>
        <textarea name="klacht" id="klacht" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Indienen">
    </form>
</body>
</html>
