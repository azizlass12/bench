<?php 
include 'dp.php';

$idP = isset($_GET['idP']) ? $_GET['idP'] : 0;

$requete = "DELETE FROM patient WHERE id=?";
$params = array($idP);

$resultat = mysqli_prepare($conx, $requete);

if ($resultat) {
    mysqli_stmt_bind_param($resultat, "i", $idP);
    mysqli_stmt_execute($resultat);
    mysqli_stmt_close($resultat);
    header('location:patient.php');
} else {
    echo "Erreur lors de la préparation de la requête.";
}
?>