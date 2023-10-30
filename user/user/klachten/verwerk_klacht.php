<?php
include('config.php'); // Include your database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klant_id = $_POST["klant_id"];
    $titel_klacht = $_POST["titel_klacht"];
    $klacht = $_POST["klacht"];

    // Create a new MySQLi connection using the included database configuration
    $connection = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if ($connection->connect_error) {
        die("Verbindingsfout: " . $connection->connect_error);
    }

    // Use prepared statements to insert data
    $query = $connection->prepare("INSERT INTO klachten (klant_id, titel_klacht, klacht) VALUES (?, ?, ?");
    
    // Bind parameters
    $query->bind_param("iss", $klant_id, $titel_klacht, $klacht);

    if ($query->execute()) {
        echo "Klacht is succesvol ingediend.";
    } else {
        echo "Fout bij het indienen van de klacht: " . $connection->error;
    }

    // Close the prepared statement and the connection
    $query->close();
    $connection->close();
}
?>
