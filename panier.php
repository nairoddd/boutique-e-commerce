<?php 

require_once('./inc/init.php'); 


?>




<?php
 if (isset($_POST['ajout_panier'])) {
    $req = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_POST[id_produit]'");

    $produit = $req->fetch(PDO::FETCH_ASSOC);

    // var_dump($produit);

    $id_produit = $produit['id_produit'];
    $quantite = $_POST['quantite'];
    $prix =  $produit['prix'];


    ajoutProduit($id_produit, $quantite, $prix);
    header('Location:panier.php');

    //var_dump($_SESSION['panier']);

}

if (isset($_POST['payer'])) {

    for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) {


        // Je fais une req pour récupérer les data des produits quui sont dans ma sessio
        $r = $pdo->query("SELECT * FROM produit WHERE id_produit = '" . $_SESSION['panier']['id_produit'][$i] . "' ");

        $data = $r->fetch(PDO::FETCH_ASSOC);

        // Si la quantité demandé est inférieur à ce que j'ai en stock alors on aura 2 cas:
        if ($data['stock'] < $_SESSION['panier']['quantite'][$i]) {

            if ($data['stock'] > 0) { // Si la quantité disponible est >0 mais < a ce que l'user demande

                $_SESSION['panier']['quantite'][$i] = $data['stock'];
            } else { // Sinon le produit n'est plus en stock donc le stock = 0
                $content .= 'Le produit demandé n\'est plus disponible en stock';
                retireProduit($_SESSION['panier']['id_produit'][$i]);

                $i--; // Je refais un tour du panier afin de m'assurer que tout est ok avant la validation

            }

            $error = true;

        }
    }


    // S'il n'y a pas de problème sur le stock



    if(!isset($error)){
        $pdo->query("INSERT INTO commande (id_membre,montant,date_enregistrement,etat) VALUES('".$_SESSION['membre']['id_membre']."','".montantTotal()."',NOW(),'en cours de traitement')");

        $idCommande = $pdo->lastInsertId();

        for($i=0;$i < count($_SESSION['panier']['id_produit']);$i++){

            $pdo->query("INSERT INTO detail_commande(id_commande,id_produit,quantite,prix) VALUES('$idCommande','".$_SESSION['panier']['id_produit'][$i]."','".$_SESSION['panier']['quantite'][$i]."','".$_SESSION['panier']['prix'][$i]."')");

            //Mettre à jour le panier

            $pdo->query("UPDATE produit SET stock = stock - '".$_SESSION['panier']['quantite'][$i]."' WHERE id_produit = '".$_SESSION['panier']['id_produit'][$i]."' ");



        }

        unset($_SESSION['panier']);

    }


} 
















// Je vais ici créer une table html qui va contenir le panier
$content .= '<div class="container">';

$content .= '<table class="table table-hover">';

$content .= '<thead><tr><th scope="col" class="text-center">id produit</th><th scope="col" class="text-center">Quantité</th><th scope="col" class="text-center">Prix Unitaire</th></tr></thead>';

if (empty($_SESSION['panier']['id_produit'])) { // S'il n'y a rien dans ma session "panier"

    $content .= '<tr><td colspan="3" class="text-center display-4">Votre panier est vide</tr></td>';
} else { //Sinon il y a des produits dans notre panier

    for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) { //Je fais une boucle afin d'afficher tous les produits
        $content .= '<tr>';
        $content .= '<td class="text-center display-6">' . $_SESSION['panier']['id_produit'][$i] . '</td>';
        $content .= '<td class="text-center display-6">' . $_SESSION['panier']['quantite'][$i] . '</td>';
        $content .= '<td class="text-center display-6">' . $_SESSION['panier']['prix'][$i] . ' € </td>';
        $content .= '</tr>';
    }
    $content .= '<th colspan="3"> Montant Total : ' . montantTotal() . '€ </th>';

    if (!userConnected()) {
        $content .= '<div class="alert alert-light text-center" role="alert">Veuillez vous  <span class="fw-bold text-decoration-none"><a href="connexion.php">connecter</a></span> ou vous <span class="fw-bold"><a href="inscription.php">inscrire</a></span> </div>';
    } else {
        $content .= '<form action="" method="POST">';
        $content .= '<tr><td><input type="submit" name="payer" value="Valider le panier" class="btn btn-success btn-lg"></td></tr>';
        $content .= '</form>';
    }
}

$content .= '</table>';
$content .= '</div>';






?>


<?php require_once('./inc/header.inc.php') ?>

<h1 class="text-center display-4 lead m-2 text-muted">Panier</h1>

<?= $content ?>

<?php require_once('./inc/footer.inc.php') ?>