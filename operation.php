<?php
include 'dp.php';

$rq="select count(*) from suivi_des_patients";
$rs=mysqli_query($conx,$rq);
$rw=mysqli_fetch_array($rs);

$rq3="select count(*) from suivi_des_patients_apres_operation";
$rs3=mysqli_query($conx,$rq3);
$rw3=mysqli_fetch_array($rs3);

// Fonction pour mettre à jour l'état de récupération postopératoire
function updateRecoveryStatus($id, $recoveryStatus) {
    global $conx;
    $req = "UPDATE suivi_des_patients_apres_operation SET recuperation_postoperatoire='$recoveryStatus' WHERE id='$id' ";
    $res = mysqli_query($conx, $req);
    if ($res) {
        header("location: operation.php");
        exit(); // Assurez-vous de quitter après avoir envoyé l'en-tête
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . mysqli_error($conx);
    }
}

$sql="select * from suivi_des_patients order by id desc";
$result=mysqli_query($conx,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    h1{
    text-align: center;
    color: #333;
    text-align: center;
    padding: 80px;

}
    .navbar
{
	padding:19px 0px;
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
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}


h2 {
    margin-top: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

</style>
    <link rel="stylesheet" type="text/css" href="operation.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
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
			<li><a href="index.html" class="login">Déconnexion</a></li>
		</ul>
		<!-------navigation menu end---->
		</div>
	</div>
</nav>
    <h1>Suivi des patients</h1>

    <h2>Préopération</h2>
    <table>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Heure d'arrivée</th>
            <th>Préparation préopératoire</th>
            
        </tr>
        <tr>
            <td>Khalifa</td>
            <td>Aymen</td>
            <td>15/05/1980</td>
            <td>08:00</td>
            <td>Oui</td>
        </tr>
        <tr>
            <td>Jazia</td>
            <td>Chaima</td>
            <td>22/09/1975</td>
            <td>07:30</td>
            <td>Non</td>
        </tr>
    </table>

    <h2>Postopération</h2>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Date de l'opération</th>
            <th>Récupération postopératoire</th>
        </tr>
        <tr>
            <td>Ali</td>
            <td>Maissa</td>
            <td>15/05/1980</td>
            <td>10/07/2023</td>
            <td>En cours</td>
        </tr>
        <tr>
            <td>Akrimi</td>
            <td>Ishak</td>
            <td>22/09/1975</td>
            <td>10/07/2023</td>
            <td>Terminée</td>
        </tr>
        
    </table>
</body>
</html>
