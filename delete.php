<?php 
include 'dp.php';

if(isset($_GET['id'])){
    $id = $_GET['id']; // Utilisez la variable $id pour stocker l'ID du médecin à supprimer

    $sql = "DELETE FROM medecin WHERE id = $id"; // Utilisez la variable $id dans la requête SQL
    $result = mysqli_query($conx, $sql);

    if($result){
        header('location: med.php');
        echo "Deleted successfully";
    } else { 
        die(mysqli_error($conx));
    }
}
?>
