
<?php
include("dp.php"); // Assurez-vous que votre connexion à la base de données est configurée ici.
require_once("identifier.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Page des patients</title>
    <link rel="stylesheet" type="text/css" href="patient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<body>
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
			<li><a href="doctor.php">Accueil</a></li>
			<li><a href="liste-pat.php">patients</a></li>
            <li><a href="operation.php">opérations</a></li>
			<li><a href="dossier-med.php">Dossiers médicaux</a></li>
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
</div>
</nav>
    <h1>Liste des patients</h1>
  

    <table>
        <tr>
            <th> Id Patient </th>
            <th>Nom</th>
            <th>Âge</th>
            <th>Genre</th>
            <th>Téléphone</th>
            <th> Actions </th>
        
        </tr>
       <tr> 
    <?php
          session_reset();
       // Assurez-vous que l'utilisateur est connecté et que son rôle est médecin.
          if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'medecin') {
            $idUser = $_SESSION['user_id'];

    // Requête SQL pour récupérer les patients du médecin connecté.
    $sql = "SELECT * FROM patient WHERE medecin_id = $idUser";

    // Exécutez la requête SQL.
    $result = mysqli_query($conx, $sql);

    // Vérifiez s'il y a des résultats.
    if ($result) {
        // Affichez les patients.
        while ($row = mysqli_fetch_assoc($result)) {
            // Affichez les détails du patient selon vos besoins.
            echo "Nom du patient : " . $row['nom'] . "<br>";
            echo "Prénom du patient : " . $row['prenom'] . "<br>";
            // Affichez d'autres détails du patient selon vos besoins.
        }
    } else {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conx);
    }
} else {
    echo "Aucun médecin connecté ou vous n'avez pas les autorisations nécessaires.";
}
  ?>
        </tr>
    </table>
   
    <style>

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
    padding-left: 0;
}

.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

body {
    font-family: Arial, sans-serif;
}

h1{
    text-align: center;
    padding: 25px;
    margin-top: 90px;
    margin-bottom: 10px;
}

table {
   
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

       
button {
    padding: 8px 12px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}


button:hover {
    background-color: #c82333;
    animation: pulse 0.5s infinite;
}

button:active {
    transform: scale(0.98);
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</body>
</html>
