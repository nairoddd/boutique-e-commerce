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
    $content .= "<a href=\"index.php?categorie=$categorie[categorie]\" class=\"text-decoration-none fw-bold\">$categorie[categorie]</a>"; // Je passe dans l'url la catégorie du produit
    $content .= "</li>";
    $content .= "</ul>";
}
$content .= '</div>';

$content .= '<div class="col-md-10 md-offset-1">';

if (isset($_GET['categorie'])) {

    $produits = $pdo->query("SELECT * FROM produit WHERE categorie = '$_GET[categorie]'");
    $content .= '<div class="row">';

    while ($produit = $produits->fetch(PDO::FETCH_ASSOC)) {

        // J'utilise substr() afin de réduire la taille de la chaîne de caractère qui contient le detail
        $detail = substr($produit['description'], 0, 150);

        $content .= '<div class="col-md-6 col-sm-6 col-lg-6">';
        $content .= '<div class="card text-center m-2" style="width: 22rem;">';
        $content .= "<a href=\"fiche-produit.php?id_produit=$produit[id_produit]\">";
        $content .= "<img src=\"$produit[photo]\" class=\"card-img-top\">";
        $content .= "</a>";
        $content .= '<div class="card-body">';
        $content .= "<h6 class=\"card-subtitle mb-2 text-muted\">$produit[categorie]</h6>";
        $content .= "<a href=\"fiche-produit.php?id_produit=$produit[id_produit]\" class=\"text-decoration-none text-dark\">";
        $content .= "<h5 class=\"card-title\">$produit[titre]</h5>";
        $content .= "</a>";
        $content .= "<p class=\"card-text\">$detail...<a href=\"fiche-produit.php?id_produit=$produit[id_produit]\" class=\"text-decoration-none\">Lire la suite</a></p>";
        $content .= "<p class=\"text-center\"><a href=\"fiche-produit.php?id_produit=$produit[id_produit]\" class=\"card-link fw-bolder text-decoration-none text-dark fs-4\">$produit[prix] € </p></a>";
        $content .= "<a href=\"fiche-produit.php?id_produit=$produit[id_produit]\" class=\"btn btn-primary btn-lg\">Voir ce produit</a>";
        $content .= '</div></div></div>';
 

        //////  A NE PAS REPRODUIRE........ :)))
  /*                $content .= '<section style="background-color: white;"><div class="container py-2 px-0">

          <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-12">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                        <img src="' . $produit['photo'] . '" alt=""  class="w-100"/>
                          <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                    
                      <h6 class="text-capitalize">' . $produit['titre'] . '</h6>
                    
                     
                      <p>' . $detail . '...' . '<a href=\"\" class="text-decoration-none">Lire la suite</a>' . '</p>
                      <h6 class="text-success"><i class="bi bi-truck"></i><span class="text-muted fw-light"> Livraison en 24 heure</span></h6>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                      <div class="d-flex flex-row align-items-center mb-1">
                        <h4 class="mb-1 me-1 text-center">' . $produit['prix'] . ' €</h4>
                        </div>
                    
                      <div class="d-flex flex-column mt-4">
                      
                      <input type="button" value="DETAIL" class="btn btn-outline-primary btn-lg">
                      <input type="button" value="PAYER" class="btn btn-success btn-lg mt-1">
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            </a>
          </div>';  */
    }
    $content .= '<div class="row">';

}

$content .= '</div>';
$content .= '</div>';

$content .= '</div>'; // Fermeture div container
?>
<a href=""></a>


<!---------------------------------------------- PARTIE AFFICHAGE -->
<?php require_once './inc/header.inc.php'; ?>

<h1 class="text-center display-4 lead m-5">Projet boutique</h1>

<?= $content ?>

<? require_once './inc/footer.inc.php'; ?>