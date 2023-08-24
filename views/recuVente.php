
<style>
    td , th {
        border: solid 2px #9f8f8f;
    }
  .td  {
    text-align: center !important;

  }
</style>
<?php 
include "../auth/auth.php";
include 'layout.php';

if (!empty($_GET['id'])) {
    $vente = getVente($_GET['id']);
}

?>
<div class="home-content">


    <button class="hidden-print" id="btnPrint" style="position: relative; left: 45%;"> <i class='bx bx-printer'></i> Imprimer</button>


    <div class="page">
    <div style="text-align:center;">        <h1 style="">FACTURE  N° #: <?= $vente['id'] ?> </h1>
    <br>
    <br>
        <div class="cote-a-cote">
        <img  src="../public/images/labit.png" style="width:30%; margin:5px;margin-top: -8px;" alt="ici img">   
         <div>
               
                <p>Date: <?= date('d/m/Y h:i:s A', strtotime('2023-08-06 10:36:00')) ?> </p>
                
            </div>
            
            
        </div>
        <br>
        <table class="mtable">
            <tr>    
                <th>Jaouadi Anis (LAB-IT)</th>
               
            </tr>

            <tr>
                <td>Adresse : Cité Ezzahra rue des catacombes Souk lahad Sousse</td>
            
            </tr>
            <tr>
                <td>Matricule Fiscale : 1668688K/P/C/000</td>
            
            </tr>
            <tr>
                <td>Tél : 50234911</td>
            
            </tr>
            <tr>
                <td>Email : contact@lab-it.tn</td>
            
            </tr>
        </table>
        
        <br>
        <br>
        <div style="padding: 13px;
    border: solid 2px #dddddd;">
        <h3 style="text-align: left;">Destinataire</h3>
        <br>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Nom :</p>
            <p><?= $vente['nom'] . " " . $vente['prenom'] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Tel :</p>
            <p><?= $vente['telephone'] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Adresse :</p>
            <p><?= $vente['adresse'] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 50%;">
            <p>Matricule fiscale :</p>
            <p><?= $vente['matricule_fiscale'] ?></p>
        </div>
        <br>
        
        <table class="mtable">
            <tr>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix unitaire(dt)</th>
                <th>Prix total(dt)</th>
                

            </tr>
        
            <tr>
                <td class="td"><?= $vente['nom_article'] ?></td>
                <td class="td"><?= $vente['quantite'] ?></td>
                <td class="td"><?= $vente['prix_unitaire'] ?></td>
                <td class="td"><?= $vente['prix'] ?></td>

            </tr>
            <tr>
                <td class="td" style="border:none;"></td>
                <td class="td" style="border:none;"></td>

                <td class="td">Timbre fiscale</td>
                <td class="td">1</td>

            </tr>
            <tr>
                <td class="td" style="border:none;"></td>
                <td class="td" style="border:none;"></td>

                <td class="td">Total</td>
                <td class="td"><?= $vente['prix'] ?></td>


            </tr>
        </table>
</div>
  <br>
        <footer class="footer" >
        <table class="mtable">
            <tr>
                <th>Siège Sociale</th>
                <th style="margin-right:3px;">Coordonnées</th>
                <th>Détails Bancaires</th>
            </tr>

            <tr>
                <td>Adresse : Cité Ezzahra rue des catacombes Souk lahad Sousse <br>
                Code Postal : 4002 Tunisie <br>
            Matricule Fiscale : 1668688K/P/C/000 </td>
                <td style=" padding: 10px 1px 1 9px;"><span>Mr Jaouadi Anis</span> <br> Tel : 50234911 <br><h6> Email : <a href="https://lab-it.tn/">www.lab-it.tn</a></h6>    </td>
                <td><p>Banque : Attijari Bank</p> <span>RIB : 04504011005259165870</span>  </td>

            </tr>
           

        </table>
        <br>
            <div class="footer-content">
                <p>&copy; <?= date('Y') ?> Jaouadi Anis (LAB-IT). All rights reserved.</p>
            </div>
        </footer>
    </div>
    


</div>

</section>


<script>

    var btnPrint = document.querySelector('#btnPrint');
    btnPrint.addEventListener("click", () => {
        window.print();
    });

    function setPrix() {
        var article = document.querySelector('#id_article');
        var quantite = document.querySelector('#quantite');
        var prix = document.querySelector('#prix');

        var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

        prix.value = Number(quantite.value) * Number(prixUnitaire);
    }
  
    
</script>
























