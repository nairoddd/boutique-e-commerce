<!---------------------------------------------- PARTIETRAITEMENT-->

<?php require_once './inc/init.php';

// Je verifie s'il n'y a pas un id_produit dans l'url
if (!isset($_GET['id_produit'])) {
    header('location:index.php'); // Je renvoi le user vers index.php
    exit();
}

if (isset($_GET['id_produit'])) { // S'il y a un id dans l'url , je fais une rq pour récupérer les data de ce id
    $data = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");
}

if ($data->rowCount() <= 0) { //Si le rowCount() est <=0 c'est que je n'ai pas de produit qui a cet id
    header('location:index.php');
    exit();
}

$produit = $data->fetch(PDO::FETCH_ASSOC);


$content .= '<div class="container text-center">';
$content .= "<p class=\"lead\">Titre:" . $produit['titre'] . "</p>";
$content .= "<p class=\"lead\">Catégorie :" . $produit['categorie'] . "</p>";
$content .= "<p class=\"lead\">Référence :" . $produit['reference'] . "</p>";
$content .= "<p class=\"lead\">Taille :" . $produit['taille'] . "</p>";
$content .= "<p class=\"lead\">couleur :" . $produit['couleur'] . "</p>";
$content .= "<p class=\"lead\">Public :" . $produit['public'] . "</p>";
$content .= "<img src=\"$produit[photo]\"  width=\"200px\">";
$content .= "<p class=\"lead\">Prix:" . $produit['prix'] . "</p>";

if($produit['stock'] >0){

    $content .= '<form action="panier.php" method=POST>';

    $content .= "<input type=hidden name=\"id_produit\" value=\"$produit[id_produit]\">";
    $content .= "<label for=\"quantite\">Quantité</label>";

    $content .= "<select name=\"quantite\" id=\"quantite\">";
        for($i=1;$i<=$produit['stock'];$i++){
            $content .= "<option>$i</option>";
        }
    $content .= "</select><br><br>";
    
    $content .= '<input type="submit" value="Ajouter au panier" class="btn btn-lg btn-primary mb-5" name="ajout_panier">';
    $content .= '</form>';

}else{
    $content .= '<div class="alert alert-danger" role="alert">Le produit est en rupture actuellement</div>';
}


?>












<!---------------------------------------------- PARTIE AFFICHAGE -->
<?php require_once './inc/header.inc.php'; ?>

<h1 class="text-center display-4 lead m-5">Fiche produit</h1>

<?= $content; ?>

<? require_once './inc/footer.inc.php'; ?>