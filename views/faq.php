<!DOCTYPE html>

<html>

<head>
	<title>Stock-Vision</title>
  <link rel="shortcut icon" href="../public/images/favicon.ico" />
	<meta charset="utf-8">
	<meta name="description" content="Personal Portfolio">
	<meta name="author" content="Tanja Veljanovska">
	<meta name="keywords" content="Personal portfolio, about, work, projects, contact">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Itim|Source+Sans+Pro" rel="stylesheet">
  <style>
    body, #container {
	margin: 0vw;
	padding: 0vw;
	max-width: 100vw;
}
#container {
    display: flex;
    
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    background-color: #3c4888;
    color: white;
    /* font-family: 'Source Sans Pro', sans-serif; */
    /* font-size: 1.3vw; */
    text-align: center;
}

#navbar, #main, #footer {
	width: 100%;
}

#navbar
{
	background-color: black;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	position: sticky;
	top: 0;
	z-index: 999;
}

#navLogo {
	padding-left: 5vw;
}

#logo {
  border: solid;
  padding: 0.5vw;
  padding-left: 1vw;
  padding-right: 1vw;
}

#navLinks {
	padding-right: 5vw;
}

.list {
	display: inline;
	margin-left: 5vw;
}

.link {
	color: white;
	text-decoration: none;
	font-weight: bold;
}

.link:hover {
	color: #111;
}
/* "1111" */
#welcome-section {
	background-image: url("../public/images/lab2.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	background-attachment: fixed;
	height: 100vh;
	
  : 1.5vw;
}

#layer {
    background-color: rgb(0 8 139 / 43%);
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

#welcomeHeadline {
	background-color: transparent;
	color: white;
  font-family: inherit;
	text-align: center;
	padding-top: 35vh;
}

#welcomeParagraf {
	background-color: transparent;
	color: white;
	text-align: center;
  font-size: 1.8vw;
}

.divHeadline {
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	padding: 5vw;
	color: white;
	font-size: 2vw;
}

#projects {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	margin-top: 10vw;
	margin-bottom: 10vw;
}

.project-tile {
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	margin: 1.5vw;
	height: 37vw;
	width: 35vw;
}

.project-tile:hover {
	height: 40vw;
	width: 38vw;
}

.iframe {
	width: 80%;
	height: 80%;
	margin: 1.8vw;
}

.links {
	padding: 2.5vw;
	color: white;
	font-weight: bold;
	text-decoration: none;
}

.links:hover {
	color: "1111";
}

#aboutImg {
	background-image: url("../public/images/red.jpg");
  background-size: unset;
}

#about {
	padding-top: 3vw;
	padding-bottom: 3vw;
	background-color: white;
	color: black;
}

.text {
	padding-left: 5vw;
	padding-right: 5vw;
	font-size: 1.5vw;
	font-weight: bold;
}

#contactImg {
	background-image: url("../public/images/red.jpg");
  background-size: cover;
}

#contact {
	background-color: white;
	padding: 5vw;
	font-size: 2.5vw;
}

.fa {
	padding: 3vw;
	color: black;
	text-decoration: none;
}

.fa:hover {
	color: "1111";
}


#footer {
	padding-left: 5vw;
	color: "1111";
	text-align: left;
}

@media (max-width: 600px) {

#container {
	font-size: 4vw;
}

#navLogo {
	padding-left: 8vw;
	font-size: 3vw;
}

#navLinks {
	padding-right: 8vw;
	font-size: 3vw;
}

#welcome-section {
	font-size: 3.5vw;
}
  
  #welcomeParagraf {
    font-size: 3.6vw;
  }

.divHeadline {
	padding: 7vw;
	font-size: 4vw;
}

#projects {
	margin-top: 10vw;
	margin-bottom: 10vw;
}

.project-tile {
	margin-top: 5vw;
  margin-bottom: 5vw;
	height: 100vw;
	width: 90vw;
}

.project-tile:hover {
	height: 105vw;
	width: 95vw;
}

.iframe {
	width: 90%;
	height: 90%;
}

.links {
	padding: 5vw;
}

#about {
	padding-top: 5vw;
	padding-bottom: 5vw;
}

.text {
	padding-left: 10vw;
	padding-right: 10vw;
	font-size: 4vw;
}

#contact {
	padding: 5vw;
	font-size: 5vw;
}

.fa {
	padding: 6vw;
}

#footer {
	padding-left: 8vw;
}

}





body, #container {
        margin: 0;
        padding: 0;
        max-width: 100vw;
        font-family: inherit;    }

    /* Rest of your existing CSS rules */

    #welcomeHeadline,
    #welcomeParagraf,
    .divHeadline,
    .headline1,
    .text {
      font-family: inherit;    }

    #container {
        font-size: 1.3vw;
    }

    @media (max-width: 600px) {
        #container {
            font-size: 4vw;
        }

  </style>
</head>

<body>
<div id="container">	


	<main id="main">
		<div id="welcome-section">
			<div id="layer">
      <a href="../index.php" style="float: left;margin: 19px;background: #273f90;border: solis 2px;border-radius: 50px;width: 82px;border: solid 1px;color: wheat;cursor: pointer;text-decoration: none;
">Acceuil</a>

				<h1 id="welcomeHeadline">À Propos de LAB-IT</h1>
				<p id="welcomeParagraf">Fondée en 2020 en Tunisie par M. Anis JAOUADI, LAB-IT est un pionnier majeur du secteur IT dans le pays.

</p>
			</div>	
		</div>



		<div id="aboutImg" class="divHeadline">
			<h3 class="headline1">Nous sommes reconnus pour notre expertise en gestion de stock informatique et proposons une gamme complète de services et de solutions :</h3>
		</div>

		<div id="about">
			<p class="text">Notre Mission
</p>			<p class="text">_______</p>
			<p class="text">est d'offrir des solutions informatiques de pointe et des services de haute qualité pour aider nos clients à optimiser leur efficacité opérationnelle, en mettant particulièrement l'accent sur la gestion de stock informatique.</p>
      <br>
<img src="../public/images/contact.jpg" alt="">		
		<br>
		</div>
		<div id="contactImg" class="divHeadline">
			<p><small>
Nous sommes là pour répondre à vos questions et discuter de la manière dont LAB-IT peut vous accompagner dans la gestion optimale de votre stock informatique. Contactez-nous dès aujourd'hui pour en savoir plus.</small></p>
			<h1 class="headline1">Contactez-Nous</h1>
		</div>

		<div id="contact">

    <span style="color:black;font-size: 23px;">~ linkedin ~  </span><a class="fa fa-linkedin  " href="https://www.linkedin.com/in/anis-jaouadi-a65598a1/" target="_blank"></a> 
    <span style="color:black;font-size: 23px;">~ facebook ~  </span><a class="fa fa-facebook" href="https://www.facebook.com/anisjaouadilabit" target="_blank"></a>
      
		</div>
		
	</main>

  <footer id="footer" style="    background-color: #313e51;
    color: #ffffff;
    padding: 0px;
    text-align: center;">
  <img src="../public/images/labit.png" style="width: 225px;
    margin-top: 40px;
    float: left;
}" alt="">
    <div id="footer-links" style="display: flex; justify-content: space-around; margin-top: 20px;">
        <div class="footer-section" style="flex: 1; padding: 10px; text-align: left;">
            <h3>Besoin D’aide</h3>
            <ul>
                <li><a href="#" style="color: white; text-decoration: none;">Livraison</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Conditions Générales de Vente (CGV)</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Politique en matière de remboursements et de retours</a></li>
            </ul>
        </div>
        <div class="footer-section" style="flex: 1; padding: 10px; text-align: left;">
            <h3>Service</h3>
            <ul>
                <li><a href="#" style="color: white; text-decoration: none;">Maintenance Informatique</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Réparation A Domicile</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Création de site e-commerce</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Création de Site Internet</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Demande Devis</a></li>
            </ul>
        </div>
        <div class="footer-section" style="flex: 1; padding: 10px; text-align: left;">
            <h3>Contact</h3>
            <p><p>Rue catacombes cité ezzahra souk lahad</p> sousse tunisie, Sousse, Tunisia</p>
            <p>Contact : 50 234 911</p>
            <p>E-mail : labitsousse@gmail.com</p>
        </div>
    </div>
</footer>

</div>	
</body>

</html>
