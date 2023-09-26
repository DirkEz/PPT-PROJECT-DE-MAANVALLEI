<?php
session_start();
session_destroy();
$_SESSION['loggedin'] = FALSE; 
// Redirect to the login page:
header('Location: ../index.php');
?>