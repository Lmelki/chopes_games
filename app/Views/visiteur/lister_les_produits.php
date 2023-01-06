<?php $session = session(); ?>
<div class="d-flex flex-wrap justify-content-evenly gap-2">
                    <?php if ($lesProduits == null) {
                        echo '<h3>Aucun produit correspondant à cette recherche</h3>';
                    } ?>
                    <?php $count = 0;
                    foreach ($lesProduits as $unProduit) { ?>
                    

                            <div class="card" style="width: 18rem;">
                                <div class="product-image">
                                    <a href="<?php echo site_url('Visiteur/voir_un_produit/' . $unProduit["NOPRODUIT"]) ?>">
                                        <?php
                                        if (!empty($unProduit["NOMIMAGE"])) echo img_class($unProduit["NOMIMAGE"] . '.jpg', $unProduit["LIBELLE"], 'card-img-top');
                                        else echo img_class('nonimage.jpg', $unProduit["LIBELLE"], 'img-responsive image');
                                        ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="<?php echo site_url('Visiteur/voir_un_produit/' . $unProduit["NOPRODUIT"]); ?>"><?php echo $unProduit["LIBELLE"] ?></a>
                                        <?php if ($session->get('statut') == 3) { ?>
                                            <a href="<?php echo site_url('AdministrateurSuper/Vitrine/' . $unProduit["NOPRODUIT"]);  ?>">
                                                <?php if ($unProduit['VITRINE'] == 1) {
                                                    echo "<i class='fas fa-star fav'></i>";
                                                } else {
                                                    echo "<i class='far fa-star fav'></i>";
                                                } ?> </a>
                                        <?php } ?>
                                    </h3>
                                    <p class="card-text">
                                        <?php echo number_format((($unProduit["PRIXHT"]) + ($unProduit["TAUXTVA"])), 2, ",", ' '), '€' ?>

                                    <?php if ($session->get('statut') == 3) {
                                        if ($unProduit["DISPONIBLE"] == 0) {
                                    ?>
                                            <a class="disponible" href="<?php echo site_url('AdministrateurSuper/rendre_disponible/' . $unProduit["NOPRODUIT"]);  ?>">Rendre disponible</a>
                                        <?php } else { ?>

                                            <a class="indisponible" href="<?php echo site_url('AdministrateurSuper/rendre_indisponible/' . $unProduit["NOPRODUIT"]);  ?>">Rendre indisponible</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($unProduit["DISPONIBLE"] == 0) {
                                            echo 'Rupture de stock..';
                                        } ?><br />
                                        <div class='container'> <a class="add-to-cart btn <?php if ($unProduit["DISPONIBLE"] == 0) {
                                                                                                echo 'disabled';
                                                                                            } ?>" href="<?php echo site_url('Visiteur/ajouter_au_panier/' . $unProduit["NOPRODUIT"]);  ?>">Ajouter au panier</a>
                                        </div> 
                                        </p>
                                        <?php } ?>
                                </div>
                            
                        </div>


                    <?php 
                    } ?>
            
</div>
<p><?php echo $pager->links() ?></p>