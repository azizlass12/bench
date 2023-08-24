
<?php
include '../auth/auth.php';
include 'layout.php';

if (!empty($_GET['id'])) {
    $client = getClient($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?php echo !empty($_GET['id']) ? '../services/modifClient.php' : '../services/ajoutClient.php'; ?>" method="post">
                <label for="nom">Nom</label>
                <input value="<?php echo !empty($_GET['id']) ? $client['nom'] : ''; ?>" type="text" name="nom" id="nom" placeholder="Veuillez saisir le nom">
                <input value="<?php echo !empty($_GET['id']) ? $client['id'] : ''; ?>" type="hidden" name="id" id="id" >
                
                <label for="prenom">Prénom</label>
                <input value="<?php echo !empty($_GET['id']) ? $client['prenom'] : ''; ?>" type="text" name="prenom" id="prenom" placeholder="Veuillez saisir le prénom">

                <label for="telephone">N° de téléphone</label>
                <input value="<?php echo !empty($_GET['id']) ? $client['telephone'] : ''; ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le N° de téléphone">
                
                <label for="adresse">Adresse</label>
                <input value="<?php echo !empty($_GET['id']) ? $client['adresse'] : ''; ?>" type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse">
                <label for="matricule_fiscale">matricule_fiscale</label>
                <input value="<?php echo !empty($_GET['id']) ? $client['matricule_fiscale'] : ''; ?>" type="text" name="matricule_fiscale" id="matricule_fiscale" placeholder="matricule_fiscale">
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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
                <?php
$clients = getClient();

if (!empty($clients) && is_array($clients)) {
    foreach ($clients as $key => $value) {
        ?>
                        <tr>
                            <td><?php echo $value['nom']; ?></td>
                            <td><?php echo $value['prenom']; ?></td>
                            <td><?php echo $value['telephone']; ?></td>
                            <td><?php echo $value['adresse']; ?></td>
                            <td><a href="?id=<?php echo $value['id']; ?>"><i class='bx bx-edit-alt'></i></a>
                            <a style="color:red;" href="../services/supClient.php?id_client=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure you want to delete this client?');">
                        <i class='bx bx-trash'></i></td>
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

