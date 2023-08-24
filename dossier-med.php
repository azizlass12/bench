
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

  <meta charset="UTF-8">
  <title>Dossiers médicaux</title>
  <style>
    /* Styles CSS */
  
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




    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
       
      color: #333;
      text-align: center;
      padding: 80px;
    }
    
    .dossier {
      background-color: #f4f4f4;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
    }
    
    .dossier h2 {
      color: #333;
      margin-top: 0;
    }
    
    .dossier p {
      color: #777;
      margin-bottom: 5px;
    }
    
    .dossier .info-label {
      font-weight: bold;
    }
    
    .dossier .info-label::after {
      content: ":";
    }
    
    .dossier .maladies {
      margin-top: 10px;
    }
    
    .dossier .maladies ul {
      margin: 0;
      padding-left: 20px;
    }
    .btn-supprimer,
.btn-modifier {
  background-color: #e74c3c;
  color: white;
  border: none;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-modifier {
  background-color: #3498db;
}

.btn-supprimer:hover,
.btn-modifier:hover {
  background-color: #c0392b;
  transform: scale(1.05);
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


  <h1>Dossiers médicaux</h1>
  
  <div class="dossier">
    <h2>Dossier patient 1</h2>
    <p><span class="info-label">Nom</span> Dupont</p>
    <p><span class="info-label">Prénom</span> Jean</p>
    <p><span class="info-label">Date de naissance</span> 15/02/1980</p>
    <p><span class="info-label">Antécédents</span> Hypertension</p>
    <p><span class="info-label">Allergies</span> Aucune</p>
    <p><span class="info-label">Médicaments en cours</span> Amlodipine, Lisinopril</p>
    <p><span class="info-label">Maladies</span> Diabète de type 2, Hypercholestérolémie</p><br>
      
  </div>
  
  <div class="dossier">
    <h2>Dossier patient 2</h2>
    <p><span class="info-label">Nom</span> Martin</p>
    <p><span class="info-label">Prénom</span> Sophie</p>
    <p><span class="info-label">Date de naissance</span> 10/07/1992</p>
    <p><span class="info-label">Antécédents</span> Allergie aux fruits à coque</p>
    <p><span class="info-label">Allergies</span> Pénicilline</p>
    <p><span class="info-label">Médicaments en cours</span> Sertraline, Albuterol</p>
    <p><span class="info-label">Maladies</span> Asthme, Migraine</p><br>

    
  </div>
  
  <div class="dossier">
    <h2>Dossier patient 3</h2>
    <p><span class="info-label">Nom</span> Dubois</p>
    <p><span class="info-label">Prénom</span> Marc</p>
    <p><span class="info-label">Date de naissance</span> 05/11/1975</p>
    <p><span class="info-label">Antécédents</span> Diabète de type 2</p>
    <p><span class="info-label">Allergies</span> Aucune</p>
    <p><span class="info-label">Médicaments en cours</span> Metformine, Insuline</p>
    <p><span class="info-label">Maladies</span> Hypertension, Obésité</p><br>

    
  </div>
</body>
</html>