<?php

$host = "localhost"; // Généralement "localhost"
$user = "root";
$pass = "";
$dbname = "test";

// Créez la connexion
$conx = mysqli_connect($host, $user, $pass, $dbname);

// Vérifiez la connexion
if (mysqli_connect_errno()) {
    die("Échec de la connexion à MySQL : " . mysqli_connect_error());
}
?>