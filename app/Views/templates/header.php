<?php $session = session();
if ($session->has('cart')) {
    $cart = session('cart');
    $nb = count($cart);
} else $nb = 0; 
?>
<!DOCTYPE html>
<html lang="fr">
<body>
    
</body>
</html>
<head>
    <title>ChopesGames</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php  echo base_url('assets/images/favicon.ico')  ?>">
    <link rel="alternate" type="application/rss+XML" title="ChopesGames" href="<?php echo site_url('AdministrateurSuper/flux_rss') ?>" />
    <link rel="stylesheet" href="<?php  echo css_url('style') ?>">
    <script src="<?php  echo js_url('bootstrap.bundle.min') ?>"></script>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('Visiteur/accueil') ?>">
                <img width="60" height="38" src="<?php  echo base_url('/assets/images/logo.jpg')  ?>" alt="Logo">
            </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse2" aria-controls=".dual-collapse2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      

        <div class="collapse navbar-collapse dual-collapse2">

   
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a href="<?php  echo site_url('Visiteur/accueil') ?>" class="btn btn-info">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-primary" href="<?php  echo site_url('Visiteur/lister_les_produits') ?>">Lister tous les Produits</a>
                </li>

            </ul>
      
  
                <?php 
                echo form_open('Visiteur/lister_les_produits', 'class="d-flex" role="search"'); 
                echo form_input('search', '', ['placeholder' => 'Search','class' => 'form-control me-2'],'search');
                $data = [
                    'class'   => 'btn btn-primary',
                    'type'    => 'submit',
                    'content' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>',
                ];
                echo form_button($data);
                echo form_close();
                ?>
    


            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="<?php echo site_url('Visiteur/afficher_panier') ?>" class="btn btn-info btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg><?php if ($nb > 0) echo "($nb)" ?></span>
                    </a>
                </li>

                <?php if ($session->get('statut') == 2 or $session->get('statut') == 3) : ?>
                    <li class="nav-item dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Administration
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurEmploye/afficher_les_clients') ?>">Clients->Commandes</a>
                            <a class="dropdown-item" href="">(2Do) Commandes non traitées</a>
                            <?php if ($session->get('statut') == 3) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_un_produit') ?>">Ajouter un produit</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/modifier_identifiants_bancaires_site') ?>">Modifier identifiants bancaires site</a>
                            <?php } ?>
                        </div>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  Mon compte
  </button>
  <div class="dropdown-menu">
  <?php if (!is_null($session->get('statut'))) { ?>
                            <?php if ($session->get('statut') == 1) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('Client/historique_des_commandes') ?>">Mes commandes</a>
                                <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">Modifier son compte</a>
                            <?php } elseif ($session->get('statut') == 3) { ?>
                                <li><a class="dropdown-item" href="?>">(2Do) Modifier son compte</a></li>
                            <?php } ?>
                            <a class="dropdown-item" href="<?php echo site_url('Client/se_de_connecter') ?>">Se déconnecter</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/se_connecter') ?>">Se connecter</a>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">S'enregister</a>
                        <?php } ?>
                        </div>
                        </li>
                

                <?php if (empty($session->get('statut'))) : ?>
                    <li class="nav-item droite">
                        <a href="<?php echo site_url('Visiteur/connexion_administrateur') ?>">Admin</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <main>