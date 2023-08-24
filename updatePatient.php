<?php
include("dp.php");
require_once("identifier.php");

$idP = isset($_POST['idP']) ? $_POST['idP'] : 0;
$nom = isset($_POST['nom']) ? $_POST['nom'] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : ""; 
$age = isset($_POST['age']) ? $_POST['age'] : "";
$genre = isset($_POST['genre']) ? $_POST['genre'] : "";
$cin = isset($_POST['cin']) ? $_POST['cin'] : "";
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
$Medecin = isset($_POST['Medecin']) ? $_POST['Medecin'] : "";
$maladie = isset($_POST['maladie']) ? $_POST['maladie'] : "";
$Antecedents = isset($_POST['Antecedents']) ? $_POST['Antecedents'] : "";
$Allergies = isset($_POST['Allergies']) ? $_POST['Allergies'] : "";
$Medicaments_en_cours = isset($_POST['Medicaments_en_cours']) ? $_POST['Medicaments_en_cours'] : "";

$requete = "UPDATE patient SET nom=?, prenom=?, age=?, cin=?, genre=?, telephone=?, Medecin=?, maladie=?, Antecedents=?, Allergies=?, Medicaments_en_cours=? WHERE id=?";
$params = array($nom, $prenom, $age, $cin, $genre, $telephone, $Medecin, $maladie, $Antecedents, $Allergies, $Medicaments_en_cours, $idP);

$resultat = mysqli_prepare($conx, $requete);

if ($resultat) {
    mysqli_stmt_bind_param($resultat, "ssissssssssi", $nom, $prenom, $age, $cin, $genre, $telephone, $Medecin, $maladie, $Antecedents, $Allergies, $Medicaments_en_cours, $idP);
    mysqli_stmt_execute($resultat);
    mysqli_stmt_close($resultat);
    header('location:patient.php');
} else {
    // Handle the case where the query fails
    die("Query failed: " . mysqli_error($conx));
}
?>
