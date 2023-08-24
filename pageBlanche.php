<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  </title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="styles.css">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<style>
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
			<li><a href="dossier.html">Dossiers médicaux</a></li>
			<li><a href="index.html" class="login">Déconnexion</a></li>

            
            
		</ul>
		<!-------navigation menu end---->
		</div>
	
</nav>
    

    <?php 
    // include('menu.php'); ?>
    
          
                  
                  
        

     <!-- Option 2: Separate Popper and Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>
</html>