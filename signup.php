<!DOCTYPE html> 
<!--===  === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://kit.fontawesome.com/fa538140c9.js" crossorigin="anonymous"></script>
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Inscription Du Patient</title> 
</head>
<body>
    <div class="container">
        <form action="connect.php"  method ="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title"><h2>Inscription </h2></span>
                    <br>
                    <br>
                    <div class="fields">
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="nom" placeholder="Votre Nom.." >
                        </div>
                        <br>
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="prenom" placeholder="Votre Prenom.." >
                        </div>
                        <br>
                        <br>
                        <div class="input-field">
                            <i class="fa-solid fa-cake-candles"></i>
                            <input type="date" name="dateN" placeholder="Votre Date De Naissance" >
                        </div>
                        <br>
                        <div class="input-field">
                            <i class="fa-solid fa-id-card"></i>
                            <input type="text" name="cin" placeholder="Votre CIN" >
                        </div>
                        <br>
                        <div class="input-field">
                            <i class="fa-solid fa-phone"></i>
                            <input type="tel" name="tel" placeholder="Votre Numéro télé.." >
                        </div>

                        <br>
                        <div class="input-field">
                            <i class="fa-solid fa-genderless"></i>
                            <select name="genre" required>
                                <option disabled selected>Selectinner votre genre</option>
                                <option>Femme</option>
                                <option>Homme</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-genderless"></i>
                            <select name="role" required>
                                <option disabled selected>Selectinner votre Role</option>
                                <option>Medecin</option>
                                <option>Secretaire</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
              <div class="details ID">
                    <div class="fields">
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Votre Email.." >
                        </div>
                        <br>
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Votre mot de passe..." name="password" >
                        </div>             
                    </div>
                    <br>
	                <div class="buttons">
	                    <button class="sumbit">
	                        <span class="btnText">Envoyer</span>
                            
	                        
	                    </button>
                    </div>
        
            </div>
            <br>
          <br>
          <br>
          <a href="login.php">vous avez déja un compte</a>
          </div> 
          
       </div>
   </form>
 </div>

</body>
 
  

  </style>
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>

<script src="js/script.js"></script>
</html>