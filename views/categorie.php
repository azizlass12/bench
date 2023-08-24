<?php
include '../auth/auth.php';

include 'layout.php';

if (!empty($_GET['id'])) {
    $categorie = getCategorie($_GET['id']);
}

?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <form action=" <?php echo !empty($_GET['id']) ? '../services/modifCategorie.php' : '../services/ajoutCategorie.php'; ?>"
        method="post">
        <label for="libelle_categorie">Libelle</label>
        <input value="<?php echo !empty($_GET['id']) ? $categorie['libelle_categorie'] : ''; ?>" type="text"
          name="libelle_categorie" id="libelle_categorie" placeholder="Veuillez saisir le libéllé">
        <input value="<?php echo !empty($_GET['id']) ? $categorie['id'] : ''; ?>" type="hidden" name="id" id="id">

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
    <span><?php

if (!empty($_SESSION['messageAnnule']['text'])) {
    $messageText = $_SESSION['messageAnnule']['text'];
    $messageType = $_SESSION['messageAnnule']['type'];

    // Clear the session message after retrieving its values
    unset($_SESSION['messageAnnule']);
    ?>
    <br><br>
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

    <div class="box">
      <table class="mtable">
        <tr>
          <th>Libelle categorie</th>
          <th>Action</th>
        </tr>
        <?php
$categories = getCategorie();

if (!empty($categories) && is_array($categories)) {
    foreach ($categories as $key => $value) {
        ?>
            <tr>
              <td>
                <?php echo $value['libelle_categorie']; ?>
              </td>
              <td><a href="?id=<?php echo $value['id']; ?>"><i class='bx bx-edit-alt'></i></a>
              <a style="color:red;" href="../services/supCat.php?id_categorie=<?php echo $value['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this categorie?');">
                                    <i class='bx bx-trash'></i>
                                </a>
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