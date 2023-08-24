<?php
include '../auth/auth.php';

include 'layout.php';

if (!empty($_GET['id'])) {
    $article = getArticle($_GET['id']);
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 2; // Nombre d'articles par page
$offset = ($page - 1) * $limit;

?>
<div class="home-content">
    <div class="overview-boxes">
    
        <div class="box">
            <form action=" <?php echo !empty($_GET['id']) ? '../services/modifArticle.php' : '../services/ajoutArticle.php'; ?>" method="post" enctype="multipart/form-data">
                <label for="nom_article">Nom de l'article</label>
                <input value="<?php echo !empty($_GET['id']) ? $article['nom_article'] : ''; ?>" type="text" name="nom_article" id="nom_article" placeholder="Veuillez saisir le nom">
                <input value="<?php echo !empty($_GET['id']) ? $article['id'] : ''; ?>" type="hidden" name="id" id="id">
<!-- suivant -->
                <label for="id_categorie">Catégorie</label>
                <select name="id_categorie" id="id_categorie">
                    <option value="">--Choisir une catégorie--</option>
                    <?php

                    $categories = getCategorie();
if (is_array($categories) && !empty($categories)) {
    foreach ($categories as $key => $value) {
        ?>
                            <option <?php echo !empty($_GET['id']) && $article['id_categorie'] == $value['id'] ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['libelle_categorie']; ?></option>
                 <?php
    }
}
?>
                </select>

                <label for="quantite">Quantité</label>
                <input value="<?php echo !empty($_GET['id']) ? $article['quantite'] : ''; ?>" type="number" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité">
                <label for="prix_unitaire">Prix unitaire</label>
                <input step="any" value="<?php echo !empty($_GET['id']) ? $article['prix_unitaire'] : ''; ?>" type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix">

               

         
                <label for="images">Image</label>
                <input value="<?php echo !empty($_GET['id']) ? $article['images'] : ''; ?>" type="file" name="images" id="images">
                <label for="id_fournisseur">Fournisseur</label>
                <select name="id_fournisseur" id="id_fournisseur">
                    <?php
$clients = getFournisseur();
if (!empty($clients) && is_array($clients)) {
    foreach ($clients as $key => $value) {
        ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nom'].' '.$value['prenom']; ?></option>
                    <?php

    }
}

?>
                </select>
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
        <div style="display: block;" class="box">
             <form action="" method="get">
                <table class="mtable">
                    <tr>
                        <!-- <th>Nom article</th>
                        <th>Catégorie</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Date Achat</th> -->

                    </tr>
                    <tr>
                    <!--  -->
                        <!-- <td>
                            <input type="text" name="nom_article" id="nom_article" placeholder="Veuillez saisir le nom">
                        </td> -->
                        <!-- <td>
                            <select name="id_categorie" id="id_categorie">
                                <option value="">--Choisir une catégorie--</option>
                                <?php

                $categories = getCategorie();
if (is_array($categories) && !empty($categories)) {
    foreach ($categories as $key => $value) {
        ?>
                                        <option <?php echo !empty($_GET['id']) && $article['id_categorie'] == $value['id'] ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['libelle_categorie']; ?></option>
                                <?php
    }
}
?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantite" id="quantite" placeholder="Veuillez saisir la quantité">
                        </td>
                        <td>
                            <input type="number" name="prix_unitaire" id="prix_unitaire" placeholder="Veuillez saisir le prix">
                        </td>
                        <td>
                            <input type="date" name="date_achat" id="date_achat">
                        </td> -->

                    </tr>
                </table>
                <br>
                <!-- <button type="submit">recherche</button> -->
            <span>    <?php

if (!empty($_SESSION['messageAnnule']['text'])) {
    $messageText = $_SESSION['messageAnnule']['text'];
    $messageType = $_SESSION['messageAnnule']['type'];

    // Clear the session message after retrieving its values
    unset($_SESSION['messageAnnule']);
    ?>
  <span id="alertBox" class="alert <?php echo $messageType; ?>">
    <?php echo $messageText; ?>
</span>

  <script>
    setTimeout(function () {
      var alertBox = document.getElementById('alertBox');
      alertBox.style.opacity = '0';
      alertBox.style.transition = "opacity 1s";

      setTimeout(function () {
        // alertBox.style.display = 'none';
      }, 2000); // 1000 milliseconds = 1 second (fade out duration)
    }, 2000); // 3000 milliseconds = 3 seconds
  </script>
  <?php
}
?></span>
            </form>
            <br> 
            <table class="mtable">
                <tr>
                    <th>Nom article</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Date d'achat</th>
                    <th>Image</th>
                    <th>fournisseur</th>
                    <th>Action</th>
                </tr>
                <?php
                $total_articles = 0;
$total_pages = 0;
if (!empty($_GET['s'])) {
    $articles = getArticle(null, $_GET, $limit, $offset);

    $count = countArticle($_GET);
    $total_articles = $count['total'];
    $total_pages = ceil($total_articles / $limit);
} else {
    $articles = getArticle(null, null, $limit, $offset);

    $count = countArticle(null);
    $total_articles = $count['total'];
    $total_pages = ceil($total_articles / $limit);
}

if (!empty($articles) && is_array($articles)) {
    foreach ($articles as $key => $value) {
        ?>
        <!-- Date expiration -->
                        <tr>
                            <td><?php echo $value['nom_article']; ?></td>
                            <td><?php echo $value['libelle_categorie']; ?></td>
                            <td><?php echo $value['quantite']; ?></td>
                            <td><?php echo $value['prix_unitaire']; ?> Dt</td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($value['date_achat'])); ?></td>
                            <td><img width="100" height="100" src="<?php echo $value['images']; ?>" alt="<?php echo $value['nom_article']; ?>"></td>
                            <td><?php echo $value['nom'].' '.$value['prenom']; ?></td>
                            <td><a href="?id=<?php echo $value['id']; ?>"><i class='bx bx-edit-alt'></i></a>

                            <a style="color:red;" href="../services/annuleArticle.php?id_article=<?php echo $value['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this article?');">
                                    <i class='bx bx-trash'></i>
                                </a> 
                                <a href="articleDetails.php?id_article=<?php echo $value['id']; ?>"><i class='bx bx-search-alt-2'></i></a>
                        </td>           


                            
                        </tr>
                <?php

    }
}
?>
            </table>
            <?php

            echo "<div class='pagination'>";
// $active = "";
// echo "<pre>";
// var_dump($total_pages, $limit, $total_articles);
// echo "</pre>";
// Lien vers la page précédente
if ($page > 1) {
    $prev_page = $page - 1;
    echo "<a href='?page=$prev_page'>&laquo; Précédent</a> ";
}
// pagination
for ($i = 1; $i <= $total_pages; ++$i) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    echo "<a class='$active' href='?page=$i'>$i</a> ";
}

// Lien vers la page suivante
if ($page < $total_pages) {
    $next_page = $page + 1;

    echo "<a href='?page=$next_page'>Suivant &raquo;</a> ";
}
echo '</div>';

?>
        </div>
    </div>

</div>
</section>
