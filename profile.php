<?php
include("dp.php");
require_once("identifier.php");

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Continue with the rest of your code

$user_id = $_SESSION["user_id"];

$sql = "SELECT nom, prenom, email, role FROM inscription WHERE id = $user_id";
$result = mysqli_query($conx, $sql); // Use mysqli_query() for executing the query

if ($result !== false && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Handle the case where user data is not found
}

// Rest of your code
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestion des Cours </title>
     
     <!-- style css -->  
     <link rel="stylesheet" href="style.css">
   <!-- style css -->

   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 

  
  <style>
    

body {
    font-family: 'Nunito', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    font-family: Arial, sans-serif;
   
}
.navbar
{
	padding:19px 80px;
	border-bottom: none !important;
	transition: all 0.5s ease-in-out;
	background-color: #024ec9 !important;
}

.navbar ul li a
{
	color:white !important;
	text-transform: uppercase; 
	font-weight: 600;
	letter-spacing: 1px; 
    font-size: 14px;
	transition: all 0.5s ease-in;
	

}

.navbar ul li a:hover 
{
	color: deepskyblue !important;
	background: none !important; 
}

.navbar-toggle
{
	border: 1px solid white !important;

	transition: all 0.5s ease-in; 
}

.navbar-toggle:hover
{
	background-color:  deepskyblue !important;
}

.navbar-inverse .navbar-collapse
{
	border-color: transparent !important;
}

.login
{
	border: 1px solid white;
	border-radius: 50px;
}

.navbar-collapse, .navbar-static-top .navbar-collapse {
    /* padding-right: 0; */
    padding-left: 0;
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.content-2 {
    padding: 80px;
}

.title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding: 50px 10px;
}

.title h2 {
    color: #333;
}

.btn {
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-success {
    background-color: #024ec9;
    color: #fff;
}

.btn-success:hover {
    background-color: #218838;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:hover {
    background-color: #f5f5f5;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 5px 10px;
    transition: background-color 0.3s;
}

.btn-danger:hover {
    background-color: #c82333;
}

.fa-trash {
    margin-right: 5px;
}

/* Loader */
.loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
.secondary
{
    background-color:#34495e;
}

    

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    
}

h1 {
    text-align: center;
}

.profile-info {
    margin-top: 20px;
    border-top: 1px solid #ccc;
    padding-top: 20px;
}

.profile-info p {
    margin: 5px 0;
    /* Modifiez la couleur du texte et la marge entre les éléments */
    color: #333;
    margin: 10px 0;
}

.container {
    /* Ajoutez une couleur de fond et un espacement autour du profil */
    background-color: #f9f9f9;
    padding: 20px;
    /* Ajoutez une bordure avec des coins arrondis */
    border: 1px solid #ddd;
    border-radius: 5px;
}

a {
    /* Modifiez la couleur et la taille du texte des liens */
    color: #007bff;
    font-size: 16px;
}

a:hover {
    /* Ajoutez un effet de survol lorsque l'utilisateur passe la souris sur les liens */
    text-decoration: underline;
}

.command-button {
    background-color: #33a8df !important; /* Couleur de fond */
    color: white !important; /* Couleur du texte */
    padding: 10px 20px !important; /* Espace intérieur (haut/bas gauche/droite) */
    border: none !important; /* Supprimer la bordure */
    text-align: center !important; /* Centrer le texte */
    text-decoration: none !important; /* Supprimer la décoration de lien si utilisé avec la balise <a> */
    display: inline-block !important; /* Permettre d'ajuster la largeur en fonction du texte */
    font-size: 16px !important; /* Taille de la police */
    border-radius: 5px !important; /* Coins arrondis */
  }
  
  /* Ajouter un effet de survol pour améliorer l'expérience utilisateur */
  .command-button:hover {
    background-color: #33a8df !important; /* Nouvelle couleur de fond au survol */
  }
  

  </style>
</head>
<body>
  <!-- ======= Header ======= -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
        <!-------responsive button---->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand"><img src=""></a>
    </div>
    <div class="collapse navbar-collapse" id="navi">
        <!-------navigation menus---->
        <ul class="nav navbar-nav navbar-right">
			<!-------navigation menus---->
		
			<li><a href="secretaire.php">Accueil</a></li>
			<li><a href="med.php">Médecins</a></li>
            <li><a href="patient.php">Patients</a></li>
			<li><a href="dossier.php">Dossiers médicaux</a></li>
            <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nom']; ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="profile.php">Profile</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Logout</a></li> <!-- Create a separate logout.php file to handle the logout process -->
    </ul>
</li>   
		</ul>
		<!-------navigation menu end---->
		</div>
	
</nav>

    </div>
    <div class="container" style="margin-top: 100px;">
        <h1> Mon Profil</h1>
        <div class="profile-info">
            
            <p> <strong> Nom:</strong> <?php echo $user['nom']; ?></p>
            <p><strong> Prenom: </strong> <?php echo $user['prenom']; ?></p>
            <p> <strong> Email: </strong> <?php echo $user['email']; ?></p>
            <p> <strong> Role: </strong> <?php echo $user['role']; ?></p>
            <!-- Autres informations du profil utilisateur -->
        </div>
        <!-- Boutons pour changer le mot de passe et se déconnecter -->
        <a href="logout.php" class="command-button"> Se Deconnecter </a> 
        
    </div>



    </body>
</html>