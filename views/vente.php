
<?php
include '../auth/auth.php';
include 'layout.php';

if (!empty($_GET['id'])) {
    $article = getVente($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?php echo !empty($_GET['id']) ? '../services/modifVente.php' : '../services/ajoutVente.php'; ?>" method="post">
                <input value="<?php echo !empty($_GET['id']) ? $article['id'] : ''; ?>" type="hidden" name="id" id="id">

                <label for="id_article">Article</label>
                <select onchange="setPrix()" name="id_article" id="id_article">
                    <?php
                    $articles = getArticle();
if (!empty($articles) && is_array($articles)) {
    foreach ($articles as $key => $value) {
        ?>
                            <option data-prix="<?php echo $value['prix_unitaire']; ?>" value="<?php echo $value['id']; ?>"><?php echo $value['nom_article'].' - '.$value['quantite'].' disponible'; ?></option>
                    <?php

    }
}

?>
                </select>

                <label for="id_client">Client</label>
                <select name="id_client" id="id_client">
                    <?php
$clients = getClient();
if (!empty($clients) && is_array($clients)) {
    foreach ($clients as $key => $value) {
        ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nom'].' '.$value['prenom']; ?></option>
                    <?php

    }
}

?>
                </select>

                <label for="quantite">Quantité</label>
                <input onkeyup="setPrix()" value="<?php echo !empty($_GET['id']) ? $article['quantite'] : ''; ?>" type="number" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité">

                <label for="prix">Prix</label>
                <input step="any" value="<?php echo !empty($_GET['id']) ? $article['prix'] : ''; ?>" type="number" name="prix" id="prix" placeholder="Veuillez saisir le prix">


                <button type="submit">Valider</button>

                <?php
                if (!empty($_SESSION['message']['text'])) {
                    $messageText = $_SESSION['message']['text'];
                    $messageType = $_SESSION['message']['type'];

                    // Clear the session message after retrieving its values
                    unset($_SESSION['message']);
                    ?>
                    <div id="alertBox" class="alert <?php echo $messageType; ?>">
                        <?php echo $messageText; ?>
                    </div>

                    <script>
                        setTimeout(function () {
                            var alertBox = document.getElementById('alertBox');
                            alertBox.style.opacity = '0';
                            alertBox.style.transition = "opacity 1s";

                            setTimeout(function () {
                                // alertBox.style.display = 'none';
                            }, 1000); // 1000 milliseconds = 1 second (fade out duration)
                        }, 1000); // 3000 milliseconds = 3 seconds
                    </script>
                    <?php
                }
?>
            </form>

        </div>
        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Article</th>
                    <th>Client</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php

$vente = getVente();

if (!empty($vente) && is_array($vente)) {
    foreach ($vente as $key => $value) {
        ?>
                        <tr>
                            <td><?php echo $value['nom_article']; ?></td>
                            <td><?php echo $value['nom'].' '.$value['prenom']; ?></td>
                            <td><?php echo $value['quantite']; ?></td>
                            <td><?php echo $value['prix']; ?> Dt</td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($value['date_vente'])); ?></td>
                            <td>
                                <a href="recuVente.php?id=<?php echo $value['id']; ?>"><i class='bx bx-receipt'></i></a>
                                <a onclick="annuleVente(<?php echo $value['id']; ?>, <?php echo $value['idArticle']; ?>, <?php echo $value['quantite']; ?>)" style="color: red;"><i class='bx bx-stop-circle'></i></a>
                            </td>
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



