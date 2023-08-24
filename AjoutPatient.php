<?php
include ("dp.php");
require_once("identifier.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données: " . $conn->connect_error);
}

if (isset($_POST['enregistrer'])) {
    $nouveau_nom = $_POST['nouveau_nom'];
    $nouveau_prenom = $_POST['nouveau_prenom'];
    $age = isset($_POST['age']) ? $_POST['age'] : "";
    $genre = isset($_POST['genre']) ? $_POST['genre'] : "";
    $nouveau_cin = isset($_POST['nouveau_cin']) ? $_POST['nouveau_cin'] : "";
    $nouveau_tel = isset($_POST['nouveau_tel']) ? $_POST['nouveau_tel'] : "";
    $medecin = isset($_POST['medecin']) ? $_POST['medecin'] : "";
    $maladie = isset($_POST['maladie']) ? $_POST['maladie'] : "";
    $Allergies = isset($_POST['Allergies']) ? $_POST['Allergies'] : "";
    $Antecedents = isset($_POST['Antecedents']) ? $_POST['Antecedents'] : "";
    $Medicaments_en_cours = isset($_POST['Medicaments_en_cours']) ? $_POST['Medicaments_en_cours'] : "";
    

    $sql = "INSERT INTO patient (nom, prenom, age, genre, cin, telephone, medecin, maladie, Allergies, Antecedents, Medicaments_en_cours) 
            VALUES ('$nouveau_nom', '$nouveau_prenom', '$age', '$genre', '$nouveau_cin', '$nouveau_tel', '$medecin',  '$maladie', '$Allergies','$Antecedents', '$Medicaments_en_cours')";
    if ($conn->query($sql) === TRUE) {
        echo "Patient enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement du Patient: " . $conn->error;
    }
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
    <h1>Ajouter un Patient</h1>

    <form method="post">
        <input type="text" name="nouveau_nom" placeholder="Taper Nom Patient " required>
        <input type="text" name="nouveau_prenom" placeholder="Taper Prenom Patient " required>
        <input type="text" name="age" placeholder="Taper Son Age" required>
        <div class="form-group">
    <label for="genre"></label>
    <select class="form-control" id="genre" name="genre" required>
        <option value="Femme">Femme</option>
        <option value="Homme">Homme</option>
    </select>
    </div>
        <input type="text" name="nouveau_cin" placeholder="CIN" required>
        <input type="text" name="nouveau_tel" placeholder="Téléphone"required>
        <input type="text" name="medecin" placeholder=" Medecin Affecte "required>
        <input type="text" name="maladie" placeholder="Son Maladie"required>
        <input type="text" name="Allergies" placeholder="Ses Allergies"required>
        <input type="text" name="Antecedents" placeholder="Antecedents"required>
        <input type="text" name="Medicaments_en_cours" placeholder="Medicaments_en_cours"required>
        
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

<?php
$conn->close();
?>
