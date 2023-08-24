<?php
include 'dp.php';
if(isset($_POST['submit'])){
$temps=$_POST["temps_valable"];
$id=$_POST["id"];

$req="select * from medecin where id='$id' ";
$res=mysqli_query($conx,$req);
if($row=mysqli_fetch_array($res)==0){ ?>
    <div class="alert alert-danger text-center">Le médecin saisi n'existe pas!</div>
<?php } else{ ?>

<?php
$sql="insert into valabilite (id,temps_valable) values('$id','$temps')";
$result=mysqli_query($conx,$sql);
if($result){
?>
     <div class="alert alert-success text-center">Horaire Ajouté!</div>

<?php  
}else{
    die(mysqli_error($conx));
}
}
}

?>
 

<!DOCTYPE html>
<!--===  === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    /* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    body {
        background: #16a085;
    }

    .forget-pwd>a {
        color: #dc3545;
        font-weight: 500;
    }

    .forget-password .panel-default {
        padding: 31%;
        margin-top: -32%;
    }

    .forget-password .panel-body {
        padding: 15%;
        margin-bottom: -50%;
        background: #fff;
        border-radius: 5px;
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    img {

        width: 90%;
        margin-bottom: 10%;
    }

    .submit {
        background: #c0392b;
        border: none;
    }

    .forget-password .dropdown {
        width: 100%;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }

    .forget-password .dropdown button {
        width: 100%;
    }

    .forget-password .dropdown ul {
        width: 100%;
    }
    </style>

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Spécialité</title>
</head>

<body>
      <a href="dispo.php" class="btn btn-info" style=" background:lightgreen; color:#000; margin-left:10px">Liste des horaires</a>
    <div class="container forget-password">
        <div class="row">
            <div class="col col-text-left">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="" alt="settings">

                            <p><b><em> Gestion de Valabilité </em></b></p>


                            <form id="register-form" role="form" autocomplete="on" class="form" method="post">
                                <div class="form-group">
                                <div class="input-group">

                                    <input type="text" name="temps_valable" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="saisir l'horaire" >
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i
                                        class="glyphicon glyphicon-envelope color-blue"></i></span>
                                <input type="text" name="inp"  class="form-control form-control-lg"
                                    id="exampleInputPassword1" placeholder="id" >
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="submit" class="btn btn-lg btn-success btn-block " value="Ajouter"
                                type="submit">
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>