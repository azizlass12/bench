

<?php
include 'layout.php'; 

include ("../dp.php");
session_start();
require_once("../identifier.php");

// // Fonction pour afficher les médecins en fonction des filtres
// function displayMedecins($conx, $specialiteFilter, $disponibiliteFilter) {
//     $sql = "SELECT * FROM medecin WHERE specialite LIKE '%$specialiteFilter%' AND disponibilite LIKE '%$disponibiliteFilter%'";
//     $result = mysqli_query($conx, $sql);

//     if ($result) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             echo '<tr>
//                     <td>' . $row["id"] . '</td>
//                     <td>' . $row["nom"] . '</td>
//                     <td>' . $row["prenom"] . '</td>
//                     <td>' . $row["dateN"] . '</td>
//                     <td>' . $row["tel"] . '</td>
//                     <td>' . $row["specialite"] . '</td>
//                     <td>' . $row["disponibilite"] . '</td>
//                     <td>
//                         <a class="text-light" href="delete.php?id=' . $row["id"] . '">
//                             <i class="fa fa-trash"></i> Supprimer
//                         </a>
//                     </td>
//                 </tr>';
//         }
//     } else {
//         echo '<tr><td colspan="8">Aucun résultat trouvé.</td></tr>';
//     }
// }

// // Initialisation des filtres
// $specialiteFilter = isset($_GET['specialite']) ? $_GET['specialite'] : '';
// $disponibiliteFilter = isset($_GET['disponibilite']) ? $_GET['disponibilite'] : '';


// $rq="select count(*) from medecin";
// $rs=mysqli_query($conx,$rq);
// $rw=mysqli_fetch_array($rs);



// $rq3="select count(*) from specialite";
// $rs3=mysqli_query($conx,$rq3);
// $rw3=mysqli_fetch_array($rs3);

$size=6;
      $page=2 ;
   $offset=($page-1)*$size;


   $nom=isset($_GET['nom'])?$_GET['nom']:"";
   $specialite=isset($_GET['specialite'])?$_GET['specialite']:"all";

   $size=isset($_GET['size'])?$_GET['size']:3;
      $page=isset($_GET['page'])?$_GET['page']:1;
   $offset=($page-1)*$size;
    
   if($specialite=="all") {

   $requete="select * from medecin where nom like '%$nom%' limit $size offset $offset";
   $requeteCount="select count(*) CountF from medecin where nom like '%$nom%'";
  } else { 
    $requete="select * from medecin where nom like '%$nom%' and specialite='$specialite' limit $size offset $offset"; 
    $requeteCount="select count(*) CountF from medecin where nom like '%$nom%' and specialite='$specialite'";
  }
             $resultatF=$conx->query($requete);
             $resultatCount=$conx->query($requeteCount);
             $tabCount = mysqli_fetch_assoc($resultatCount);
               $nbrMed = $tabCount['CountF'];
            //  $tabCount=$resultatCount->fetch();
            //  $nbrMed=$tabCount['CountF'];
             $reste=$nbrMed % $size;  //* % operateur modulo pour la division eucludienne */
             if ($reste===0)
              $nbrpage=$nbrMed/$size;
                  else 
                  $nbrpage=floor($nbrMed/$size)+1;  

?>
<!DOCTYPE html>
<html lang="en">

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

        /* Style for the green class (edit icon) */
.green {
    color: green;
}

/* Style for the red class (delete icon) */
.red {
    color: red;
}

body {
    font-family: 'Nunito', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
   
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

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">
        <!-- Bootstrap CSS -->
     
     <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="../medecin/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestion des médecins</title>
    <style>
        
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
<div class="container"  style="margin-top: 100px; margin-right : 100px; text-align:center;"> 
        <div class="card border-success mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t2"> </div>
            <div class="card-body text-success">
                <h5 class="card-title"></h5>
                  <form method="get" action="med.php"  class="form-inline">
                    <div class="form-group">
                    <input type="text" name="nom" placeholder="Taper Nom de medecin" class="form-control" 
                    value="<?php echo $nom ?>"/>
                    </div>  &nbsp
                          <label for="specialite" style="color: #024ec9;"> specialité :</label> &nbsp
                           
                    <select name="specialite" class="form-control" id="specialite" onchange="this.form.submit()">
                      <option value="all" <?php if($specialite==="all" ) echo "selected" ?>>Tous les spacialites</option>
                      <option value="pediatrie" <?php if($specialite==="pediatrie") echo "selected" ?>>Pediatrie</option>
                      <option value="cardiologie" <?php if($specialite==="cardiologie" ) echo "selected"  ?>> Cardiologie</option>
                      <option value="generaliste" <?php if($specialite==="generaliste") echo "selected" ?>> Generaliste</option>
                      <option value="gynecologue" <?php if($specialite==="gynecologue"  ) echo "selected" ?>>Gynécologue</option>
                      <option value="dermatologue" <?php if($specialite==="dermatologue" ) echo "selected" ?>>Dermatologue</option>
                    </select> &nbsp 
                    
                    <button type="submit" class="btn btn-success">
                    <i class="bi bi-search"></i> Rechercher...</button> &nbsp &nbsp
</div>
</div>
<div class="card border-primary mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t1"></div>
            <div class="card-body text-primary">
                <h5 class="card-title"> </h5>
                <div class="title">
                        <h2>Liste Des Médecins</h2>
                        <h3> Totale Liste (<?php echo $nbrMed ?> Medecins)</h3>
                       <a href="enregis-med.php" class="btn btn-success">Ajouter Médecin</a>
                    </div>
                  <table class="table table-striped  table-bordered">
                    <thead>
                    
            <!-- <div class="content-2">
                <div class="new-students">
                    <div class="title">
                        <h2>Liste Des Médecins</h2>
                       <a href="enregis-med.php" class="btn btn-success">Ajouter Médecin</a>
                    </div>
                    <table> -->
                        <tr>
                            <th>id</th>
                            <th>Nom</th>
                            <th>prenom</th>
                            <th>dateN</th>
                            <th>tel</th>
                            <th>Spécialité</th>
                            <th>disponibilite</th>
                            <th>Actions</th>
                        </tr>
                        <thead>
                        <tbody id="medecins-table">
             <?php while ($medecin = mysqli_fetch_assoc($resultatF)) {?>
                <tr>
                                <td> <?php echo $medecin['id'] ?></td>
                                <td> <?php echo $medecin['nom'] ?></td>
                                <td><?php echo $medecin['prenom'] ?></td>
                                <td> <?php echo $medecin['dateN'] ?></td>
                                <td> <?php echo $medecin['tel'] ?></td>
                                <td> <?php echo $medecin['specialite'] ?></td>
                                <td> <?php echo $medecin['disponibilite'] ?></td>
                                <td>
                                

                               <a  href="EditerMed.php?idM=<?php echo $medecin['id'] ?>"> 
                                         <i class="fa fa-pencil-square green"></i></a> &nbsp &nbsp 
                         <a onclick="return confirm('Etes vous sur vouloir supprimer le medecin  ?')"
                               href="deleteMed.php?idM=<?php echo $medecin['id'] ?>"> 
                              <i class="fa fa-trash red"></i></a>


                                       </td>

                              <!-- <button class="btn btn-danger">
                             <a class="text-light" href="delete.php?id='.$id.'">
                                     <i class="fa fa-trash"></i> Supprimer
                                </a>
                             </button>
                                </td> -->
                           
                     
                                  
                              </tr>
                              <?php } ?>
  <?php
                            //  $sql="select *  from medecin order by id desc";
                            //  $result=mysqli_query($conx,$sql);
                            //  if($result){
                            //     while($row=mysqli_fetch_assoc($result)){
                            //         $id=$row["id"];
                            //         $nom=$row["nom"];
                            //         $prenom=$row["prenom"];
                            //         $dateN=$row["dateN"];
                            //         $tel=$row["tel"];
                            //         $specialite=$row["specialite"];
                            //         $disponibilite=$row["disponibilite"];
                               
                            
                                
                            //     echo' <tr>
                            //     <td scope="row">'.$id.'</th>
                            //     <td id="med">'.$nom.'</td>
                                
                            //     <td>'.$prenom.'</td>
                            //     <td>'.$dateN.'</td>
                            //     <td>'.$tel.'</td>
                            //     <td>'.$specialite.'</td>
                            //     <td>'.$disponibilite.'</td>
                            //     <td>

                            //     <button class="btn btn-danger">
                            //     <a class="text-light" href="delete.php?id='.$id.'">
                            //         <i class="fa fa-trash"></i> Supprimer
                            //     </a>
                            // </button>
                            //    </td>
                            //     </tr>';
                            // }}
                            ?>
                       
                            

                    </table>
                    <div>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-md">
                    <?php for($i=1;$i<=$nbrpage;$i++) {  ?>
                       <li class="page-item  <?php if($i==$page) echo 'active' ?>"  > 
                        <a  class="page-link" href="med.php?page=<?php echo $i;?>&nom=<?php echo $nom ?>&specialite=<?php echo $specialite ?>">  
                          <?php     echo $i;   ?> </a> </li>   
                      <?php  } ?>
                      </ul> 
                  </nav>
                 </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>
</body>

</html>




 