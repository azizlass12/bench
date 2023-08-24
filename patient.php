
<?php
include ("dp.php");
require_once("identifier.php");
include 'layout.php'; 
session_start();
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
$size=6;
      $page=2 ;
   $offset=($page-1)*$size;


   $nom=isset($_GET['nom'])?$_GET['nom']:"";
   $cin=isset($_GET['cin'])?$_GET['cin']:"";
   $medecin = isset($_GET['medecin']) ? $_GET['medecin'] : "";

   $size=isset($_GET['size'])?$_GET['size']:3;
      $page=isset($_GET['page'])?$_GET['page']:1;
   $offset=($page-1)*$size;

   $conditions = array();
   if (!empty($nom)) {
       $conditions[] = "nom LIKE '%$nom%'";
   }
   if (!empty($cin)) {
       $conditions[] = "cin LIKE '%$cin%'";
   }
   if (!empty($medecin)) {
       $conditions[] = "medecin LIKE '%$medecin%'";
   }
   
   $whereClause = "";
   if (!empty($conditions)) {
       $whereClause = "WHERE " . implode(" OR ", $conditions);
   }
   
   $requetePatient = "SELECT * FROM patient $whereClause LIMIT $size OFFSET $offset";
   $requeteCount = "SELECT COUNT(*) AS CountU FROM patient $whereClause";
   
   $resultatPatient = $conx->query($requetePatient);
   $resultatCount = $conx->query($requeteCount);
   $tabCount = mysqli_fetch_assoc($resultatCount);
   $nbrPatient = $tabCount['CountU'];
   $reste = $nbrPatient % $size;
   if ($reste === 0) {
       $nbrpage = $nbrPatient / $size;
   } else {
       $nbrpage = floor($nbrPatient / $size) + 1;
   }
    

                  
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
	
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand"><img src=""></a>
    </div>
    <div class="collapse navbar-collapse" id="navi">
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

</div>
</nav> -->

<div class="container" style="margin-top: 100px; text-align : center;"> 
        <div class="card border-success mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t2"> </div>
            <div class="card-body text-success">
                <h5 class="card-title"></h5>
                
                  <form method="get" action="patient.php"  class="form-inline">
                    <div class="form-group">
                    <input type="text" name="nom" placeholder="Taper Nom Patient" 
                    class="form-control" 
                    value="<?php echo $nom ?>"/>
                    
                    </div>  &nbsp
                    <div class="form-group">
                    <input type="text" name="cin" placeholder="Taper CIN Patient" 
                    class="form-control" 
                    value="<?php echo $cin ?>"/>
                    
                    </div> &nbsp
                    <div class="form-group">
                    <input type="text" name="medecin" placeholder="Taper Nom Medecin" 
                    class="form-control" 
                    value="<?php echo $medecin ?>"/>
                    
                    </div>
                          
                    &nbsp 
                    
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i>

                      Rechercher...</button> &nbsp &nbsp
                    
                       <a data-toggle="modal" data-target="#changeCity" ><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#11c1e4}</style><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                       <strong> Ajouter un Patient</strong> </a>



                        
                      <!-- <a href="AdUserAdmin.php"> <i class="bi bi-file-earmark-plus-fill"> </i> Ajouter Admin </a> -->
                            
                       </form>
                  
        </div>
          </div>
    <div class="card border-primary mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header"></div>
            <div class="card-body text-primary">
                <h5 class="card-title"> </h5>
                <div class="title">
                        <h2 style="text-align: center;">Liste Des Patients</h2>
                        <h3>  Total Liste  (<?php echo $nbrPatient ?> Patients) </h3>
                       
                    </div>
                  <table class="table table-striped  table-bordered">
                    <thead>
                        
    <tr>
            <th>ID Patient</th>
            <th>Nom</th>
            <th> Carte d'identité Nationale </th>
            <th>Âge</th>
            <th>Genre</th>
            <th>Téléphone</th>
            <th>Maladie</th>
            <th>Medecin</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="medecins-table">
        <?php while ($patient = mysqli_fetch_assoc($resultatPatient)) {?>

            <tr>
                                <td> <?php echo $patient['id'] ?></td>
                                <td> <?php echo $patient['nom'] ?></td>
                                <td> <?php echo $patient['cin'] ?></td>
                                <td><?php echo $patient['age'] ?></td>
                                <td> <?php echo $patient['genre'] ?></td>
                                <td> <?php echo $patient['telephone'] ?></td>
                                <td> <?php echo $patient['maladie'] ?></td>
                                <td> <?php echo $patient['Medecin'] ?></td>
                                
                                <td>

                                <a  href="EditerPatient.php?idP=<?php echo $patient['id'] ?>"> 
                      <i class="fa fa-pencil-square green"></i></a> &nbsp &nbsp 
                              <a onclick="return confirm('Etes vous sur vouloir supprimer le patient  ?')"
                      href="deletePatient.php?idP=<?php echo $patient['id'] ?>"> 
                      <i class="fa fa-trash red"></i></a>
                             <!-- <a class="text-light" href="deletePatient.php?id='.$id.'">
                                     <i class="fa fa-trash"></i> Supprimer
                                </a> -->
                             
                                </td>
                           
                     
                                  
                              </tr>
        
            <?php } ?>
        <!-- <tr>
            <td>Youssef Khnissi</td>
            <td>31</td>
            <td>Homme</td>
            <td>+216 22 401 555</td>
            <th>Médecin</th>
            <td><button onclick="supprimerPatient(<?php echo $row['id']; ?>, this)">Supprimer</button></td>

            
        </tr> -->
        <!-- <?php
        // $host = "localhost"; // Remplacez par l'hôte de votre base de données
        // $user = "root"; // Remplacez par votre nom d'utilisateur
        // $password = ""; // Remplacez par votre mot de passe
        // $database = "test"; // Remplacez par le nom de votre base de données
        
        // $conx = mysqli_connect($host, $user, $password, $database);
        // if (!$conx) {
        //     die("Connexion échouée : " . mysqli_connect_error());
        // }
        // $conx = mysqli_connect("localhost", "root", "", "test");
        // if (!$conx) {
        //     die("Connexion échouée : " . mysqli_connect_error());
        // }

        // if (isset($_GET['id'])) {
        //     $id = $_GET['id'];
        //     $sql = "DELETE FROM patients WHERE id = $id";
        //     if (mysqli_query($conx, $sql)) {
        //         echo "Patient supprimé avec succès";
        //     } else {
        //         echo "Erreur lors de la suppression du patient : " . mysqli_error($conx);
        //     }
        // }

        // $sql = "SELECT * FROM patients";
        // $result = mysqli_query($conx, $sql);

        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo '<tr>';
        //     echo '<td>'.$row['nom'].'</td>';
        //     echo '<td>'.$row['age'].'</td>';
        //     echo '<td>'.$row['genre'].'</td>';
        //     echo '<td>'.$row['telephone'].'</td>';
        //     echo '<td><button onclick="supprimerPatient('.$row['id'].', this)">Supprimer</button></td>';
        //     echo '</tr>';
        //     echo "Patient ID: " . $row['id'] . "<br>";
        // }
        // ?>
    </table> -->
    </tbody>
                  </table>
        </div>
        
        <div>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-md">
                    <?php for($i=1;$i<=$nbrpage;$i++) {  ?>
                       <li class="page-item  <?php if($i==$page) echo 'active' ?>"  > 
                        <a  class="page-link" href="patient.php?page=<?php echo $i;?>&nom=<?php echo $nom ?>&cin=<?php echo $cin ?>">  
                          <?php     echo $i;   ?> </a> </li>   
                      <?php  } ?>
                      </ul> 
                  </nav>
                 </div>
                </div>
                
            </div>
        </div>
    </div>
    <div id="search-results"></div>
        <style>

    /* Style for the green class (edit icon) */
    .green {
        color: green;
    }

    /* Style for the red class (delete icon) */
    .red {
        color: red;
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
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            const searchForm = document.getElementById("search-form");
            const searchInput = document.getElementById("search-input");
            const searchButton = document.getElementById("search-button");
            const searchResults = document.getElementById("search-results");

    });

    function supprimerPatient(id, button) {
        if (confirm("Êtes-vous sûr de vouloir supprimer ce patient ?")) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Patient supprimé de la base de données.");
                }
            };
            xhttp.open("GET", "patient.php?id=" + id, true);
            xhttp.send();
        }
    }
</script>






<!-- modal -->



<div class="container">

       
   
      <div class="modal fade" id="changeCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Ajouter un Patient</h4>
            </div>
            <div class="modal-body">

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
    <div class="modal-footer">
                
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
</form>
            </div>
            
          </div>
        </div>
      </div>

    </div><!-- /.container .home-section nav -->
<style>
    $color-primary: teal;
$color-secondary: orange;
$color-light: #f3f3f3;

body {
   background-color: $color-primary;
   color: $color-secondary;
   text-align: center;
}

.container {
   margin-top: 15%;
}

.btn {
   background-color: $color-primary;
   border: solid 2px $color-secondary;
   color: $color-secondary;
   
   &:hover, &:focus {
      background-color: $color-secondary;
      color: $color-primary;
      border: none;
   }  
}

.location {
   font-size: 2em;
   margin-top: 10%;
}


</style>
<script>
    $(document).ready (function() {
  
  $('#cityName').click(function() {
     var usersCity = $('input:text').val();
     $('.location').html("I'm in " + usersCity + "!");
  
  });
});
</script>
</body>
</html>

