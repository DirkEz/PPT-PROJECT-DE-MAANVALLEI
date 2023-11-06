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
