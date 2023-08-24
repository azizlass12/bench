<?php 
include 'dp.php';

$idM = isset($_GET['idM']) ? $_GET['idM'] : 0;

$requete = "DELETE FROM medecin WHERE id=?";
$params = array($idM);

$resultat = mysqli_prepare($conx, $requete);

if ($resultat) {
    mysqli_stmt_bind_param($resultat, "i", $idM);
    mysqli_stmt_execute($resultat);
    mysqli_stmt_close($resultat);
    header('location:med.php');
} else {
    echo "Erreur lors de la préparation de la requête.";
}
?>