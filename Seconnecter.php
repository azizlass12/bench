<?php 
session_start();
require_once("dp.php");

$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$requete = "select id,email,role from inscription
          where email='$email' and password=MD5('$password')";
$resultat = mysqli_query($conx, $requete);
echo "$email";
echo "$password";

if ($user = mysqli_fetch_assoc($resultat)) {
    if ($user['role'] == "medecin") {
        $_SESSION['user'] = $user; 
        header('location: doctor.php'); 
    } elseif ($user['role'] == "secretaire") {
        $_SESSION['user'] = $user; 
        header('location: secretaire.php'); 
    } 
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Login ou Mot de passe est incorrect. <br> Veuillez contacter l'administrateur";
    header('location: login.php');
}
?>
