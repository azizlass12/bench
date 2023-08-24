
<?php
include '../auth/auth.php';
include 'layout.php';

if (!empty($_GET['id'])) {
    $article = getAnnuleVente($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">

        <div class="box">
            <table class="mtable">
                <tr>
                    <th><del>Article</del></th>
                    <th><del>Client</del></th>
                    <th><del>Quantité</del></th>
                    <th><del>Prix</del></th>
                    <th><del>Date</del></th>
                </tr>
                <?php

$vente = getAnnuleVente();

if (!empty($vente) && is_array($vente)) {
    foreach ($vente as $key => $value) {
        ?>
                      
                        <tr>  
                            <td><del><?php echo $value['nom_article']; ?></del></td>
                            <td><del><?php echo $value['nom'].' '.$value['prenom']; ?></del></td>
                            <td><del><?php echo $value['quantite']; ?></del></td>
                            <td><del><?php echo $value['prix']; ?></del></td>
                            <td><del><?php echo date('d/m/Y H:i:s', strtotime($value['date_vente'])); ?></del></td>
                            <!-- <td>
                                <a href="recuVente.php?id=<?php echo $value['id']; ?>"><i class='bx bx-receipt'></i></a>
                                <a onclick="annuleVente(<?php echo $value['id']; ?>, <?php echo $value['idArticle']; ?>, <?php echo $value['quantite']; ?>)" style="color: red;"><i class='bx bx-stop-circle'></i></a>
                            </td>  -->
                        </tr>
                       
                <?php

    }
}
?>
            </table>
        </div>
    </div>

</div>
</section>


<script>
    function annuleVente(idVente, idArticle, quantite) {
        if (confirm("Voulez-vous vraiment annuler cette vente ?")) {
            window.location.href = "../services/annuleVente.php?idVente=" + idVente + "&idArticle=" + idArticle + "&quantite=" + quantite
        }
    }

    function setPrix() {
        var article = document.querySelector('#id_article');
        var quantite = document.querySelector('#quantite');
        var prix = document.querySelector('#prix');

        var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

        prix.value = Number(quantite.value) * Number (prixUnitaire) * 1.30;
    }
</script>



