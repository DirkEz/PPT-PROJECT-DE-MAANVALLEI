<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klant_id = $_POST["klant_id"];
    $titel_klacht = $_POST["titel_klacht"];
    $klacht = $_POST["klacht"];

    // Maak een databaseverbinding
    $connection = new mysqli("localhost", "gebruikersnaam", "wachtwoord", "databasenaam");

    if ($connection->connect_error) {
        die("Verbindingsfout: " . $connection->connect_error);
    }

    // Voer de klacht in de database in
    $query = "INSERT INTO klachten (klant_id, titel_klacht, klacht) VALUES ('$klant_id', '$titel_klacht', '$klacht')";

    if ($connection->query($query) === TRUE) {
        echo "Klacht is succesvol ingediend.";
    } else {
        echo "Fout bij het indienen van de klacht: " . $connection->error;
    }

    $connection->close();
}
?>
