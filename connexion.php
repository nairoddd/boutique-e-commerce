<!--PARTIE TRAITEMENT -->
<?php require_once './inc/init.php';

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    session_destroy();
    header('location:index.php');
}



if ($_POST) {

    if (!empty($_POST['pseudo'])) { // Si le pseudo n'est pas vide

        //Je fais une req pour récupérer les infos du pseudo qui a été envoyé en POST
        $req = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");

        // Si le rowCount() >= 1 alors il y a un user qui ce pseudo
        if ($req->rowCount() >= 1) {

            $membre = $req->fetch(PDO::FETCH_ASSOC); // Je fetch pour récupérer les infos dans un tableau

            // je vérifie si le mdp envoyé en POST correspond au mdp que j'ai dans mon tableau $membre qui contient toutes les infos du membre
            if (password_verify($_POST['mdp'], $membre['mdp'])) {

                // Je crée une session que j'appelle 'membre' pour stocker les infos de l'user

                $_SESSION['membre']['id_membre'] = $membre['id_membre'];
                $_SESSION['membre']['pseudo'] = $membre['pseudo'];
                $_SESSION['membre']['nom'] = $membre['nom'];
                $_SESSION['membre']['prenom'] = $membre['prenom'];
                $_SESSION['membre']['email'] = $membre['email'];
                $_SESSION['membre']['civilite'] = $membre['civilite'];
                $_SESSION['membre']['ville'] = $membre['ville'];
                $_SESSION['membre']['code_postal'] = $membre['code_postal'];
                $_SESSION['membre']['adresse'] = $membre['adresse'];
                $_SESSION['membre']['statut'] = $membre['statut'];

                

                header('location:profil.php');
            } else {
                $content .= '<div class="alert alert-danger" role="alert">Erreur sur le mot de passe</div>';
            }
        } else {
            $content .= '<div class="alert alert-danger" role="alert">Erreur sur pseudo</div>';
        }
    }
}







?>










<!--PARTIE AFFICHAGE -->
<?php require_once('./inc/header.inc.php'); ?>

<h1 class="text-center text-muted">Connexion</h1>

<div class="container">

    <?= $content; ?>

    <form method="POST" action="">

        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo">

        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mdp" name="mdp">

        <input type="submit" value="Login" class=" btn btn-outline-success mt-2 btn-lg">

</div>

<?php require_once('./inc/footer.inc.php'); ?>