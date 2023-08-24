<?php

include("dp.php");
require_once("identifier.php");

$idP = isset($_GET['idP']) ? $_GET['idP'] : 0;

$sql = "select * from patient where id=$idP";
$result = mysqli_query($conx, $sql);

if (!$result) {
    // Handle the case where the query fails, e.g., show an error message or redirect
    die("Query failed: " . mysqli_error($conx));
}

if (mysqli_num_rows($result) > 0) {
    $patient = mysqli_fetch_assoc($result);
    $nom = $patient['nom'];
    $prenom = $patient['prenom'];
    $age = $patient['age'];
    $cin = $patient['cin'];
    $telephone = $patient['telephone'];
    $genre = $patient['genre'];
    $Medecin = $patient['Medecin'];
    $maladie = $patient['maladie'];
    $Allergies = $patient['Allergies'];
    $Antecedents = $patient['Antecedents'];
    $Medicaments_en_cours = $patient['Medicaments_en_cours'];
} else {
    // Handle the case where no patient is found with the given ID
    // You can show an error message or redirect to a different page
    die("Patient not found");
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


    <title>Gestion des Patients</title>
</head>
<title>Gestion des Patients</title>
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
    <h1>Modifier les Informations de  Patient</h1>

    <div class="card border-primary mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t1"></div>
            <div class="card-body text-primary">
                <h4 class="card-title"> Edition d'un patient</h4>
                <form method="post" action="updatePatient.php"  class="form" enctype="multipart/form-data"
                onsubmit="return validateForm();">
                    <div class="form-group">
                    <label for="idP"> identifiant du Patient : <?php echo $idP ?></label>   
                    <input type="hidden"  name="idP"  class="form-control" 
                    value="<?php echo $idP ?>"/>
                    </div>  

                    <div class="form-group">
                    <label for="nom">Nom du Patient:</label> &nbsp   
                    <input type="text" id="nom" name="nom" placeholder="Taper Nom du Patient" 
                    class="form-control" value="<?php echo $nom ?>"/>
                    <span id="nomCoursError" class="text-danger"></span> <!-- Error message -->
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="prenom">Prenom Patient:</label> &nbsp   
                    <input type="text" name="prenom" class="form-control">
                    </div>  &nbsp
                    <div class="form-group">
                    <label for="age">Age:</label> &nbsp   
                    <input type="text" name="age" class="form-control">
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="cin">Cin Patient</label> &nbsp   
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
                    <label for="telephone">Telephone</label> &nbsp    
                    <input type="text" id="telephone" name="telephone" class="form-control">
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="Medecin">Nom de son  Medecin</label> &nbsp   
                    <input type="text" id="Medecin" name="Medecin" class="form-control">
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="maladie">Maladie </label> &nbsp   
                    <input type="text" id="maladie" name="maladie" class="form-control">
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="Allergies">Allergies</label> &nbsp   
                    <input type="text" id="Allergies" name="Allergies" class="form-control">
                   
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="Antecedents">Antecedents</label> &nbsp   
                    <input type="text" id="Antecedents" name="Antecedents" class="form-control">
                    
                    </div>  &nbsp

                    <div class="form-group">
                    <label for="Medicaments_en_cours">Medicaments_en_cours</label> &nbsp   
                    <input type="text" id="Medicaments_en_cours" name="Medicaments_en_cours" class="form-control">
                    
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

