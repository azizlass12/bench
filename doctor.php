<!DOCTYPE html>
<html>
<head>
	<title>Hospito</title> 
	<link rel="stylesheet" type="text/css" href="doctor.css">
	<link rel="icon" href="img/heart.png">
	<link rel="shortcut icon " type="text/css" href="">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</head>
<body>
	
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>


<script src="js/jquery.ripples-min.js" type="text/javascript"></script>	
<script src="js/main.js" type="text/javascript"></script>
<script src="js/typed.min.js" type="text/javascript"></script>



<!-----------navigation starts------->
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
<!-----------navigation end------->

<!-----------slider section start------->
<section class="slider text-center" id="slider">
	<div class="slider-overlay">
		<div class="slider-content">

	</div>
	</div>

</section>



<section class="service-area" id="services">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="section-title text-center wow zoomIn" data-wow-duration=".5s" data-wow-delay=".5s">
					
				</div>
			</div>                      
		</div><br><br>
		<div class="row wow bounceInUp"  data-wow-duration="1.2s" data-wow-delay="1.2s">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="service-wrap text-center">
					<div class="service-icon">
						<i class="fa fa-pills"></i>
					</div>
                    <i class="fa-solid fa-file-medical"></i>
					<h3><a href="">Dossiers médicaux </a> </h3>
					<!--<p>
						Nos pharmacies entièrement équipées, ouvertes 24h/24 et 7j/7, proposent des médicaments pour de nombreux types de maladies prescrits par nos médecins.
					</p>-->
				</div>
				
			</div>
			   
				 <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="service-wrap text-center">
					<div class="service-icon">
						<i class="fa fa-ambulance"></i>
					</div>
					<h3><a href="">Liste des médecins</a></h3>
					<!--<p>
						Efficacité, rapidité et professionnalisme <br>est la clé avec<br>notre service ambulancier	
					</p>-->
				</div>
				
			</div> 
			   
			   <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="service-wrap text-center">
					<div class="service-icon">
						<i class="fa fa-user-md"></i>
					</div>
					<h3><a href="">Liste des patients</a></h3>
					<!--<p>
						Nous avons été reconnus pour notre service et nos soins exceptionnels par des organismes de récompense internationaux et locaux
					</p>-->
				</div>
				
			</div>
			   
			  
			          
				
</section>
<br><br>

  
		  <!-- Social buttons -->
		  <div class="text-center text-md-right">
			<ul class="list-unstyled list-inline">
			  <li class="list-inline-item">
				<a class="btn-floating btn-sm rgba-white-slight mx-1">
				  <i class="fab fa-facebook-f"></i>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a class="btn-floating btn-sm rgba-white-slight mx-1">
				  <i class="fab fa-twitter"></i>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a class="btn-floating btn-sm rgba-white-slight mx-1">
				  <i class="fab fa-google-plus-g"></i>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a class="btn-floating btn-sm rgba-white-slight mx-1">
				  <i class="fab fa-linkedin-in"></i>
				</a>
			  </li>
			</ul>
			
		  </div>
  
		</div>
		<!-- Grid column -->
  
	  </div>
	  <!-- Grid row -->
  
	</div>
	<!-- Footer Links -->
  
  </footer>
  <!-- Footer -->

</body>
<style>
	*
{
  margin:0;
  padding:0;
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

/*.navbar-inverse
{
	background-color: transparent !important;
}*/

.secondary
{
    background-color: #34495e;
}

.slider
{
	width: 100%;
	height: 700px;
	background-image: url(doc.jpg); 
	background-size:     cover;                     
    background-position: 0px 5px;
	color: white;	
}

.slider-overlay
{
	width: 100%;
	height: 100%;
	background:rgba(0,0,0,0.10); 
	position: relative;
}

.slider-content
{
	position: absolute;
	top: 39%;
	width: 100%; 
}

.icons .fa
{
	font-size: 30px;
	margin-right: 7px;
}


.slider .text 
{
	display: inline-block;
	font-size: 50px;
}

/*--------Servise styles------*/
.service-area
{
    margin-top: 30px;
}

.service-area p
{
   margin-bottom: -5px;
}




.service-wrap {
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    overflow: hidden;
    padding: 25px 35px;
    position: relative;
    transition: all 0.5s ease 0s;
    z-index: 9;
    margin-top: 20px;
    
}

.service-wrap::before, .service-wrap::after {
    content: "";
    height: 300%;
    position: absolute;
    transform: rotate(45deg);
    width: 120%;
    z-index: -9;
    transition: all 0.5s;
    opacity: 0;
    background: #34495e;    
    
}

.service-wrap::before{
    top: -37px;
    left: 100%;  
    
}

.service-wrap:hover:before{    
    left: -27px;
    opacity: 1;
    
}


.service-wrap::after{
     right: 100%;
     bottom: -37px;
    
}

.service-wrap:hover:after{
     right: -27px;
     opacity: 1;
    
}

.service-wrap:hover{
     color: white;    
}

.service-wrap:h3{
     color: white;    
}


.service-wrap:hover h3{
     color: white;    
}


.service-wrap:hover h3:after{
     background-color: white;    
}

.service-icon i{
    font-size: 80px;
    margin-bottom: 20px;
    transition: all 0.5s;
    
}


.service-wrap:hover .service-icon i{
    
    transform:rotate(360deg);
}

.service-wrap h3
{
    font-size: 25px;
    font-weight: 700;
    padding-bottom: 15px;
    position: relative;
    
}

.service-wrap p
{
    font-size: 14px;
    margin-bottom: 0;
}



.service-wrap a:hover 
{
	text-decoration: none;
}

.page-footer
{
	background-color: #1e96a1;
		
}
.page-footer p
{
	color:white;
}

.page-footer a
{
	color: white;
}

.page-footer a:hover
{
	text-decoration: none;
	cursor:pointer; 
	color:#00A0C6;
	
}

.page-footer navbar-brand
{
	padding-top: 20px;
}

.page-footer ul li
{
	 border: 1px solid  white;
    padding: 0px;
    color: white;
    width: 30px;
    height: 30px;
	border-radius: 30px;
    margin-right: 10px;
    line-height: 30px;
	transition: all 0.5s ease-in;   
}

.navbar-toggle
{
	border: 1px solid white !important;

	transition: all 0.5s ease-in; 
}
</style>



<script src="script.js"></script>
</html>