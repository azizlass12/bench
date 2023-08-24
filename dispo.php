<?php
include 'dp.php';

$rq="select count(*) from medecin";
$rs=mysqli_query($conx,$rq);
$rw=mysqli_fetch_array($rs);



$rq3="select count(*) from specialite";
$rs3=mysqli_query($conx,$rq3);
$rw3=mysqli_fetch_array($rs3);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../medecin/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestion des disponibilités</title>
</head>

<body>
   
            <div class="content-2">
                <div class="new-students">
                    <div class="title">
                        <h2>Liste Des Disponibilités</h2>
                      <a href="valabilite.php" class="btn btn-success">Ajouter 
                         </a>
                    </div>
                    <table>
                        <tr>
                            <th>id</th>
                           <th>Médecin</th>
                            <th>temps de valablilité</th>
                            <th>Modifier</th>
                        </tr>

              <?php 
                             $sql="select m.*, v.* from valabilite v, medecin m where m.id=v.inp order by m.nom";
                             $result=mysqli_query($conx,$sql);
                             if($result){
                                while($row=mysqli_fetch_assoc($result)){
                               
                                $temps=$row["temps_valable"];
                                $id=$row["id"];
                                $nom=$row["nom"];

                                echo' <tr>
                                
                                <td>'.$nom.'</td>
                                <td>'.$id.'</td>
                                <td>'.$temps.'</td>
                                <td>
                                   <button class="btn btn-danger "><a class="text-light" href="delete-vb.php?id='.$row['id'].'"><i class="fa fa-trash"></i></a></button> &nbsp&nbsp
                                   <button class="btn btn-warning "><a class="text-light" href="update-vb.php?id='.$row['id'].'"><i class="fa fa-pen"></i></a></button>
                               </td>
                                </tr>';
                            }}
                       

          ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<style> 
 
  </style>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>