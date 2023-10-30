<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $emailadres = $_POST['emailadres'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $aantalPersonen = $_POST['aantalPersonen'];
    $aankomstdatum = $_POST['aankomstdatum'];
    $vertrekdatum = $_POST['vertrekdatum'];
    
    // Maximaal aantal personen op een kampeerplek
    $maxAantalPersonen = 6;
    
    if ($aantalPersonen > 0 && $aantalPersonen <= $maxAantalPersonen) {
        // Bestand waarin reserveringen worden opgeslagen
        $bestandsnaam = 'reserveringen.txt';
        
        // Data voor de reservering
        $reservering = "Naam: $naam, Telefoon: $telefoonnummer, Aantal personen: $aantalPersonen, Aankomstdatum: $aankomstdatum, Vertrekdatum: $vertrekdatum\n";
        
        // Reservering opslaan in het tekstbestand
        file_put_contents($bestandsnaam, $reservering, FILE_APPEND | LOCK_EX);
        
        echo "Bedankt, uw reservering is geplaatst!";
    } else {
        echo "Het aantal personen moet tussen 1 en $maxAantalPersonen liggen.";
    }
}

?>

<!-- HTML Formulier -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Voornaam: <input type="text" name="voornaam"><br>
    Achternaam: <input type="text" name="achternaam"><br>
    E-mailadres: <input type="text" name="emailadres"><br>
    Telefoonnummer: <input type="text" name="telefoonnummer"><br>
    Aantal personen: <input type="number" name="aantalPersonen" min="1" max="6"><br>
    Aankomstdatum: <input type="date" name="aankomstdatum"><br>
    Vertrekdatum: <input type="date" name="vertrekdatum"><br>
    <input type="submit" value="Reserveer">
</form>