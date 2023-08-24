<?php
include("dp.php");
require_once("identifier.php");

$idM = isset($_POST['idM']) ? $_POST['idM'] : 0;
$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : ""; 
$dateN = isset($_POST['dateN']) ? $_POST['dateN'] : "";
$genre = isset($_POST['genre']) ? $_POST['genre'] : "";
$cin = isset($_POST['cin']) ? $_POST['cin'] : "";
$tel = isset($_POST['tel']) ? $_POST['tel'] : "";
$specialite = isset($_POST['specialite']) ? $_POST['specialite'] : "";
$disponibilite = isset($_POST['disponibilite']) ? $_POST['disponibilite'] : "";


$requete = "UPDATE medecin SET nom=?, prenom=?, dateN=?, cin=?, genre=?, tel=?, specialite=?, disponibilite=? WHERE id=?";
$params = array($nom, $prenom, $dateN, $cin, $genre, $tel, $specialite, $disponibilite, $idM);

$resultat = mysqli_prepare($conx, $requete);

if ($resultat) {
    mysqli_stmt_bind_param($resultat, "ssisssssi", $nom, $prenom, $dateN, $cin, $genre, $tel, $specialite, $disponibilite,  $idM);
    mysqli_stmt_execute($resultat);
    mysqli_stmt_close($resultat);
    header('location:med.php');
} else {
    // Handle the case where the query fails
    die("Query failed: " . mysqli_error($conx));
}
?>
