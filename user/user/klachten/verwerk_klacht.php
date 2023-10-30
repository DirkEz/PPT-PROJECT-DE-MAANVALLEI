<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klant_id = $_POST["klant_id"];
    $titel_klacht = $_POST["titel_klacht"];
    $bericht = $_POST["bericht"];

    // Replace with your actual database credentials
    $host = "localhost";
    $username = "root";  // Replace with your database username
    $password = "";      // Replace with your database password
    $database = "ppt_maasvallei";

    // Create a new MySQLi connection
    $connection = new mysqli($host, $username, $password, $database);

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
