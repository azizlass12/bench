<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $con = new mysqli("localhost", "root", "", "test");
        if ($con->connect_error) {
            die("Failed to connect: " . $con->connect_error);
        } else {
            $stmt = $con->prepare("SELECT * FROM inscription WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            
            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
                
                if (password_verify($password, $data['password'])) {
					$_SESSION['user']=$user;
                    echo "<h2>Login successfully</h2>";
                    
                    // Utilisateur connecté avec succès, maintenant récupérez le rôle depuis la base de données
					
                    $role = $data['role'];
					// Utilisateur connecté avec succès, maintenant récupérez l'ID depuis la base de données
                     $user_id = $data['id']; 
					 $nom =   $data['nom'];
                // Supposons que l'ID de l'utilisateur est stocké dans le champ 'id'

                     // Enregistrez l'ID de l'utilisateur dans la session
                         session_start();
                      $_SESSION['user_id'] = $user_id;
					  $_SESSION['nom'] = $nom;

                    
                    // Utilisez le rôle pour rediriger l'utilisateur
                    if ($role === 'medecin') {
                        header("Location: doctor.php"); // Redirige vers la page du médecin
                    } else if ($role === 'secretaire') {
                        header("Location: secretaire.php"); // Redirige vers la page de la secrétaire
                    } else {
                        // Redirige vers une page par défaut si le rôle n'est pas reconnu
                        header("Location: default.php");
                    }
                    
                    exit();
                } else {
                    echo "<h2>Invalid password</h2>";
                }
            } else {
                echo "<h2>Invalid email</h2>";
            }
        }
    } 
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion | Hospito</title>
    <link rel="stylesheet" type="text/css" href="css/style-login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></link>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</head>
<body>
    <img class="wave" src="wave.png" alt="bg.png">
    <div class="container">
        <div class="img">
            <img src="bglogin.svg" alt="">
        </div>
        <div class="login-container">
		<form method="post" action="page2.php" class="form">
                <img class="avatar" src="avatar.svg" alt="avatar.svg">
                <h2><span class="title">Hospito</span></h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-at"></i>
                    </div>
                    <div>
                        <h5 class="placehorder">Nom d'utilisateur</h5>
                        <input class="input" name="email" type="email" id="email" autocomplete="off">
                    </div>
                </div>
                <span class="pesan pesan-nama">Nom d'utilisateur requis !</span>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5 class="placeholder">Mot de passe</h5>
						<input class="input" name="password" type="password" id="pass" autocomplete="off">
                    </div>
                </div>
                <span class="pesan pesan-password">Mot de passe requis !</span>
				<div class="mb-3">
              <!-- <div class="form-input">
			  <select name="type" required>
  			  <option value="medecin">medecin</option>
   			 <option value="secretaire">secretaire</option>
			</select>
              </div> -->
            </div>
                <a class="forgot" href="signup.php">créer un nouveau compte</a>
                <button onclick="return confirmLogin();" type="submit" class="btn">Connexion</button>
                <br>
            </form>
        </div>
    </div>

    <script type="text/javascript"></script>

    <!-- jQuery -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('.form').submit(function() {
            var username = $('#username').val().length;         
            var password = $('#password').val().length;         
 
            if (username == 0 && password == 0) {                
                $(".pesan-nama").css('display','block');
                $(".pesan-password").css('display','block');
                return false;
            }

            else if (username == 0) {                
                $(".pesan-nama").css('display','block');
                return false;
            }

            if (password == 0) {                
                $(".pesan-password").css('display','block');
                return false;
            }

            if (username != 0 && password != 0) {                
                $(".pesan-nama").css('display','none');
                $(".pesan-password").css('display','none');
                return true;
            }
        });

        $('.form').keyup(function() {
            var username = $('#username').val().length;         
            var password = $('#password').val().length;         
            
            if (username == 0) {                
                $(".pesan-nama").css('display','block');
            }

            if (username != 0) {                
                $(".pesan-nama").css('display','none');
            }

            if (password == 0) {                
                $(".pesan-password").css('display','block');
            }

            if (password != 0) {                
                $(".pesan-password").css('display','none');
            }
        });

    });

    
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;800&display=swap');

:root {
	--color-primary: #0056A8;
	--color-secondary: #1227E2;
	--color-btn: #026ED6;
	--color-black: #000;
	--color-grey0: #f8f8f8;
	--color-grey-1: #dbe1e8;
	--color-grey-2: #b2becd;
	--color-grey-3: #6c7983;
	--color-grey-4: #454e56;
	--color-grey-5: #2a2e35;
	--color-grey-6: #12181b;
	--br-sm-2: 14px;
	--box-shadow-1: 0 3px 15px rgba(0,0,0,.3);
  }

*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body{
	font-family: 'Inter', sans-serif;
}

.wave{
	position: fixed;
	height: 100%;
	left: 0;
	bottom: 0;
	z-index: -1;
}

.container{
	width: 100vw;
	height: 100vh;
	display: grid;
	grid-template-columns: repeat(2,1fr);
	grid-gap: 7rem;
	padding: 0 2rem;
}

.img{
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

.img img{
	width: 500px;
}

.login-container{
	display: flex;
	align-items: center;
	text-align: center;
}

form{
	width: 360px;
}

.avatar{
	width: 100px;
}

form h2{
	font-size: 1.5rem;
	/*text-transform: uppercase;*/
	margin: 15px 0;
	color: #333;
}

.input-div{
	position: relative;
	display: grid;
	grid-template-columns: 7% 93%;
	margin: 25px 0;
	padding: 5px 0;
	border-bottom: 2px solid #d9d9d9;
}

.input-div:after, .input-div:before{
	content:'';
	position: absolute;
	bottom: -2px;
	width: 0;
	height: 2px;
	background-color: #00B0FF;
	transition: .3s;
}

.input-div:after{
	right: 50%;
}

.input-div:before{
	left: 50%;
}

.input-div.focus .i i{
	color: #00B0FF;
}

.input-div.focus div h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus:after, .input-div.focus:before{
	width: 50%;
}

.input-div.one{
	margin-top: 0;
}

.input-div.two{
	margin-bottom: 4px;
}

.i{
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	color: #d9d9d9;
	transition: .3s;
}

.input-div > div{
	position: relative;
	height: 45px;
}

.input-div > div h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px; 
	transition: .3s;
}

.input{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	font-family: 'Poppins', sans-serif;
	color: #555;
}

a{
	text-decoration: none;
	transition: .3s;
	color: var(--color-primary);
}

.title{
	color: var(--color-primary);
}

.forgot{
	display: block;
	text-align: right;
	color: var(--color-btn);
	font-size: .9rem;
	margin-top: 15px;
}

a:hover{
	color: #00B0FF;
}

.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 15px;
	margin: 1rem 0;
	font-size: 1.2rem;
	outline: none;
	border: none;
	background-color: var(--color-btn);
	box-shadow: 3px 3px 15px RGBA(21,101,216,0.45);
	cursor: pointer;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	background-size: 200%;
	transition: .5s;
	text-transform: uppercase;
}

.btn:hover{
	background-color: #0a3778;
}

.follow{
    margin: 0 1.4rem;
    font-family: 'Poppins', sans-serif;
    color: whitesmoke;
    position: absolute;
    font-size: .8rem;
    margin-top: -54px;
}


i.fa-heart{
	color: #f23333;
}

.fail{
	font-size: .9rem;
	color: red;
}

.fail span{
	color: #00a4eb;
}

.pesan{
	display: none;
	color: red;
}



@media screen and (max-width: 1050px){
	.container{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	form h2{
		font-size: 1.3rem;
		margin: 8px 0;
	}

	.img img{
		width: 400px;
	}

	.placeholder{
		font-size:10px;
	}
}

@media screen and (max-width: 900px){
	.img{
		display: none;
	}

	.container{
		grid-template-columns: 1fr;
	}

	.wave{
		display: none;
	}

	.login-container{
		justify-content: center;
	}

	.follow{
		color: #00B0FF;
		transform: translate(-50%);
		left: 50%;
		margin-left: 0;
		margin-top: -64px;
		font-size: .7rem;
		text-align: center;
	}
}

@media screen and (max-width: 600px){
	.follow{
		font-size: .57rem;
	}
}
</style>
<script>
    const inputs = document.querySelectorAll('.input');

function focusFunc(){
	let parent = this.parentNode.parentNode;
	parent.classList.add('focus');
}

function blurFunc(){
	let parent = this.parentNode.parentNode;
	if (this.value == "") {
		parent.classList.remove('focus');
	}
}

inputs.forEach(input => {
	input.addEventListener('focus', focusFunc);
	input.addEventListener('blur', blurFunc);
});

const navbar = document.querySelector('.nav-fixed');
window.onscroll = () => {
    if (window.scrollY > 100) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active');
    }
};

function alertFunc(){
	alert("Belum ada halaman berita, stay tune!");
}

function confirmFunc(){
	confirm("Pastikan data sudah benar, anda yakin?");
}


</script>
</body>
</html>