<!DOCTYPE html>
<html>
<head>
    <title>Klacht indienen</title>
</head>
<body>
    <h1>Klacht indienen</h1>
    <form method="post" action="verwerk_klacht.php">
        <label for="klant_id">Klant Naam:</label><br>
        <input type="text" name="klant_naam" id="klant_naam"><br><br>
        <label for="titel_klacht">Titel klacht:</label><br>
        <input type="text" name="titel_klacht" id="titel_klacht"><br><br>
        <label for="bericht">Klacht bericht:</label><br>
        <textarea name="bericht" id="bericht" rows="4" cols="50"></textarea><br><br>
        <input name="klacht_indienen" type="submit" value="Indienen">
    </form>
    <a href="./klachten.php"><button>Klachten Bekijken</button></a>
</body>
</html>
