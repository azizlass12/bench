<?php

include("dp.php");
require_once("identifier.php");

$idM = isset($_GET['idM']) ? $_GET['idM'] : 0;

$sql = "select * from medecin where id=$idM";
$result = mysqli_query($conx, $sql);

if (!$result) {
    // Handle the case where the query fails, e.g., show an error message or redirect
    die("Query failed: " . mysqli_error($conx));
}

if (mysqli_num_rows($result) > 0) {
    $medecin = mysqli_fetch_assoc($result);
    $nom = $medecin['nom'];
    $prenom = $medecin['prenom'];
    $dateN = $medecin['dateN'];
    $cin = $medecin['cin'];
    $tel = $medecin['tel'];
    $genre = $medecin['genre'];
    $specialite = $medecin['specialite'];
    $disponibilite = $medecin['disponibilite'];
    
} else {
    // Handle the case where no patient is found with the given ID
    // You can show an error message or redirect to a different page
    die("Medecin not found");
}


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


    <title>Gestion des Medecins</title>
</head>

    <style>
body {
            font-family: Arial, sans-serif;
        }

 .navbar{
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


        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #024ec9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    </head>
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
        <li><a href="secretaire.php">Accueil</a></li>
        <li><a href="med.php">Médecins</a></li>
        <li><a href="patient.php">Patients</a></li>
        <li><a href="dossier.php">Dossiers médicaux</a></li>
        <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-user"></span> 
    <?php echo $_SESSION['nom']; ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="profile.php">Profile</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Logout</a></li> 
    </ul>
     </li>   
		</ul>
		<!-------navigation menu end---->

</div>
</nav>
<div class="container" style="margin-top: 100px; text-align : center;"> 
        <div class="card border-success mb-3 margetop" style="max-width: 180rem;">
    <h1>Modifier les Informations du Medecin</h1>

    <div class="card border-primary mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t1"></div>
            <div class="card-body text-primary">
                <h4 class="card-title"> Edition d'un Medecin</h4>
                <form method="post" action="updateMed.php"  class="form" enctype="multipart/form-data"
                onsubmit="return validateForm();">
                    <div class="form-group">
                    <label for="idM"> identifiant du Medecin : <?php echo $idM ?></label>   
                    <input type="hidden"  name="idM"  class="form-control" 
                    value="<?php echo $idM ?>"/>
                    </div>  

                    <div class="form-group">
                    <label for="nom">Nom du Medecin</label> &nbsp   
                    <input type="text" id="nom" name="nom" placeholder="Taper Nom du Medecin" 
                    class="form-control" value="<?php echo $nom ?>"/>
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="prenom">Prenom du Medecin</label> &nbsp   
                    <input type="text" name="prenom" class="form-control">
                    </div>  &nbsp
                    <div class="form-group">
                    <label for="dateN">Date Naissance</label> &nbsp   
                    <input type="text" name="dateN" class="form-control">
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="cin">Cin du Medecin</label> &nbsp   
                    <input type="text" id="cin" name="cin" class="form-control" required>
                    
                    </div>  &nbsp

                    <div class="form-group">
                         <label for="genre"></label>
                          <select class="form-control" id="genre" name="genre" required>
                            <option value="Femme">Femme</option>
                           <option value="Homme">Homme</option>
                             </select>
                    </div>

                    <div class="form-group">
                    <label for="tel">Telephone</label> &nbsp    
                    <input type="text" id="tel" name="tel" class="form-control">
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="specialite">La Specialité du Medecin</label> &nbsp   
                    <input type="text" id="specialite" name="specialite" class="form-control">
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="disponibilite">Disponibilité </label> &nbsp   
                    <input type="text" id="disponibilite" name="disponibilite" class="form-control">
                    
                    </div>  &nbsp

        
        <button type="submit" name="enregistrer"> <i class="fa fa-save"></i> &nbsp; Enregistrer</button>
    </form>

    <!-- Afficher la liste des médecins -->
    <table>
        <!-- ... (Le reste du tableau reste inchangé) -->
    </table>
    </div>
    </div>
</body>
</html>

