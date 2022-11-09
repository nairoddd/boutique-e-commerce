<!---------------------------------------------- PARTIE TRAITEMENT -->

<?php require_once './inc/init.php';

//Je fais une req pour récupérer mes catégories . DISTINCT Permet d'éliminer les doublons
$req = $pdo->query("SELECT DISTINCT categorie FROM produit");

$content .= '<div class="container">';

$content .= '<div class="row">';
$content .= '<div class="col-md-2">';
$content .= '<p class="lead">Nos catégories</p>';
while ($categorie = $req->fetch(PDO::FETCH_ASSOC)) { // Je fetch sur le resultat de ma req pour tout avoir dans un tableau
    $content .= "<ul class=\"list-group\">";
    $content .= "<li class=\"list-group-item mt-2\">";
    $content .= "<a href=\"?categorie=$categorie[categorie]\" class=\"text-decoration-none fw-bold\">$categorie[categorie]</a>"; // Je passe dans l'url la catégorie du produit
    $content .= "</li>";
    $content .= "</ul>";
}
$content .= '</div>';

$content .= '<div class="col-md-10 md-offset-1">';

if (isset($_GET['categorie'])) {

    $produits = $pdo->query("SELECT * FROM produit WHERE categorie = '$_GET[categorie]'");

    $content .= "<h4 class=\"text-center mt-3 mb-3 text-warning display-4\"> Catégorie : " .$_GET['categorie'] ."</h4>";

    while ($produit = $produits->fetch(PDO::FETCH_ASSOC)) {

        // J'utilise substr() afin de réduire la taille de la chaîne de caractère qui contient le detail
        $detail = substr($produit['description'], 0, 150);

        $content .= '<section style="background-color: white;"><div class="container py-2 px-0">

          <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-12">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                        <img src="' . $produit['photo'] . '" alt=""  class="w-100"/>
                    </a>
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                    <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                      <h6 class="text-capitalize">' . $produit['titre'] . '</h6>
                      </a>
                     
                      <p>' . $detail . '...' . '<a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">Lire la suite</a>' . '</p>
                      <h6 class="text-success"><i class="bi bi-truck"></i><span class="text-muted fw-light"> Livraison en 24 heure</span></h6>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                      <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1 text-center">' . $produit['prix'] . ' €</h4>
                        </div>
                    
                      <div class="d-flex flex-column mt-4">
                      <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                      <input type="button" value="DETAIL" class="btn btn-outline-primary btn-lg">
                      </a>
                      <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                      <input type="button" value="PAYER" class="btn btn-success btn-lg mt-1">
                      </div>
                      </a>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            </a>
          </div>';

    }
} else {
    // GESTION DE LA PAGINATION
    //Je fais la req qui récupère tous les produits
    $allProducts = $pdo->query("SELECT * FROM produit");

    // $nbProduct contient le nombre de produit issu de ma req
    $nbProduct = $allProducts->rowCount();

    // Je précise le nombre de produits que je veux afficher par page
    $page = 3;
    //$nbPage correspont à la division du nombre total de produit par le nombre de produit par page. Ainsi j'aurai le nombre de page
    $nbPage = ceil($nbProduct / $page);

    //@ permet d'éviter l'affichage d'erreurs
    // je déclare une variable qui contient la valeur de la page en GET
    @$pageNumber = $_GET["page"];

    // $pageNumber est vide alors nous sommes sur la première page 
    if (empty($pageNumber)) {
        $pageNumber = 1;
    }

    // $pageValue correspond au point de départ
    $pageValue =  ($pageNumber - 1) * $page;

    // Je fais le req qui récupère le nombre de produit en partant chaque fois du point de départ
    $showProduct = $pdo->query("SELECT * FROM produit LIMIT $pageValue,$page");

    // Si le rowCount() de $showProduct est <= 0 alors il n'y a aucune page qui correspond a ce que l'user écrit dans l'url
    //Donc je le redirige sur ma page boutique
    if ($showProduct->rowCount() <= 0) {
        header('Location: boutique.php');
    }

    // Affichage de ma pagination dans un a href 
    // je fais une boucle qui part de 1 jusqu'au nombre de page (car la première page c'est 1)
    $content .= '<div class="text-center mt-3 mb-2">';
    for ($i = 1; $i <= $nbPage; $i++) {
        if ($pageNumber != $i) { // Si la valeur de $i est différent du numéro de la page $pageNumber alors je permet le clic
            // Je passe le numéro de page en GET ?page=$i
            $content .= "<a href=\"?page=$i\" type=\"button\" class=\"btn btn-info m-1\">$i</a>";
        } else { // Sinon je change la couleur et je desactive le bouton disabled pour ne pas permettre le clic sur la page courante
            $content .= "<a href=\"\" type=\"button\" class=\"btn btn-secondary disabled m-1\">$i</a>";
        }
    }
    $content .= '</div>';

    while ($produit = $showProduct->fetch(PDO::FETCH_ASSOC)) {

        // J'utilise substr() afin de réduire la taille de la chaîne de caractère qui contient le detail
        $detail = substr($produit['description'], 0, 150);


        $content .= '<section style="background-color: white;"><div class="container py-2 px-0">

          <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-12">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                        <img src="' . $produit['photo'] . '" alt=""  class="w-100"/>
                    </a>
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                    <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                      <h6 class="text-capitalize">' . $produit['titre'] . '</h6>
                      </a>
                     
                      <p>' . $detail . '...' . '<a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">Lire la suite</a>' . '</p>
                      <h6 class="text-success"><i class="bi bi-truck"></i><span class="text-muted fw-light"> Livraison en 24 heures</span></h6>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                      <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1 text-center">' . $produit['prix'] . ' €</h4>
                        </div>
                    
                      <div class="d-flex flex-column mt-4">
                      <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                      <input type="button" value="DETAIL" class="btn btn-outline-primary btn-lg">
                      </a>
                      <a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '" class="text-decoration-none">
                      <input type="button" value="PAYER" class="btn btn-success btn-lg mt-1">
                      </div>
                      </a>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            </a>
          </div>';
    }
}

$content .= '</div>';
$content .= '</div>';

$content .= '</div>'; // Fermeture div container
?>




<!---------------------------------------------- PARTIE AFFICHAGE -->
<?php require_once './inc/header.inc.php'; ?>

<h1 class="text-center">Boutique</h1>

<?= $content ?>

<? require_once './inc/footer.inc.php'; ?>