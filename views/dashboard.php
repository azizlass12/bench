<?php
include '../auth/auth.php';

include 'layout.php';

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
<div class="box-topic">Commandes</div>
                <div class="number"><?php echo getAllCommande()['nbre']; ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
        </div>
       
        <div class="box"  id="venteAnnulerDiv">
     
            <div class="right-side">
                <div class="box-topic">Ventes</div>
                <div class="number"><?php echo getAllVente()['nbre']; ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Articles</div>
                <div class="number"><?php echo getAllArticle()['nbre']; ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <i class="bx bx-cart cart three"></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Revenus</div>
                <div class="number"><?php echo number_format(getCA($conn), 0, ',', ' '); ?></div>
                <div class="indicator">
                    <i class="bx bx-down-arrow-alt down"></i>
                    <span class="text">Aujourd'hui</span>
                </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
        </div>
        
    </div>
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
<div class="box-topic">Fournisseurs</div>
                <div class="number"><?php echo getAllFournisseur()['nbre']; ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <i class="bx bxs-truck cart"></i>
        </div>
        <div class="box">
            <div class="right-side">
<div class="box-topic">Ventes</div>
                <div class="number"><?php echo getAllAnnuleVente()['nbre']; ?></div>
                <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                    <span class="text">Annulée</span>
                </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
        </div>
       
        <div class="box"  id="venteAnnulerDiv">
      
            <div class="right-side">
                <div class="box-topic">Clients</div>
                <div class="number"><?php echo getAllClient()['nbre']; ?></div>
                <div class="indicator">
                    <i class="bx bx-up-arrow-alt"></i>
                    <span class="text">Depuis hier</span>
                </div>
            </div>
            <i class="bx bx-user cart two"></i>
        </div>
     
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Revenus</div>
                <div class="number"><?php echo number_format(getCA1($conn), 0, ',', ' '); ?></div>
                <div class="indicator">
                    <i class="bx bx-down-arrow-alt down"></i>
                    <span class="text">Tous</span>
                </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
        </div>
        
    </div>
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Vente recentes</div>
            <?php
            $ventes = getLastVente();
?>
    
            <div class="sales-details">
                <ul class="details">
                    <li class="topic">Date</li>
                    <?php
        foreach ($ventes as $key => $value) {
            ?>
                        <li><a href="#"><?php echo date('d M Y', strtotime($value['date_vente'])); ?></a></li>
                    <?php
        }
?>
                </ul>
                <ul class="details">
                    <li class="topic">Client</li>
                    <?php
foreach ($ventes as $key => $value) {
    ?>
                        <li><a href="#"><?php echo $value['nom'].' '.$value['prenom']; ?></a></li>
                    <?php
}
?>
                </ul>
                <ul class="details">
                    <li class="topic">Article</li>
                    <?php
foreach ($ventes as $key => $value) {
    ?>
                        <li><a href="#"><?php echo $value['nom_article']; ?></a></li>
                    <?php
}
?>
                </ul>
                <ul class="details">
                    <li class="topic">Prix</li>
                    <?php
foreach ($ventes as $key => $value) {
    ?>
                        <li><a href="#"><?php echo number_format($value['prix'], 0, ',', ' ').' F'; ?></a></li>
                    <?php
}
?>
                </ul>
            </div>
            <div class="button">
                <a href="vente.php">Voir Tout</a>
            </div>
        </div>
        <div class="top-sales box">
            <div class="title">Article le plus vendu</div>
            <ul class="top-sales-details">
                <?php
                $article = getMostVente();
foreach ($article as $key => $value) {
    ?>
                    <li>
                        <a href="#">
                            <!--<img src="images/sunglasses.jpg" alt="">-->
                            <span class="product"><?php echo $value['nom_article']; ?></span>
                        </a>
                        <span class="price"><?php echo number_format($value['prix'], 0, ',', ' ').' F'; ?></span>
                    </li>
                <?php
}
?>
                
            </ul>
        </div>
    </div>
</div>
</section>



<!-- auth -->







