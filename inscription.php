<!---------------------PARTIE TRAITEMENT  -->
<?php
//Etape 1
// En utilisant la fonction strlen() Vérifier la taille du pseudo (Le pseudo doit être compris entre 3 et 20 caractère)

//En utilisant la fonction preg_match() pour vérifier si le pseudo contient les caractères autorisés '#^[a-zA-Z0-9._-]+$#'
// Vérifier si le pseudo est déjà dans la bdd(2 users ne peuvent pas avoir le même pseudo)

//Etape 2
//En utilisant la fonction password_hash() , crypter le mot de passe de l'user dans la bdd

require_once './inc/init.php';

$erreur = '';



if(!empty($_POST)){

    foreach($_POST as $key =>$valeur){
        $_POST[$key] = htmlspecialchars(addslashes($valeur));
    }
    
    

// Vérification de la longueur du pseudo
// strlen() permet d'avoir la longueur d'une chaîne de caractère
    if(strlen($_POST['pseudo']) <3 || strlen($_POST['pseudo']) >20){
        $erreur .= '<div class="alert alert-danger" role="alert"> Le pseudo doit être entre 3 et 20 caractères</div>';
    }

// Vérification des caractères du pseudo
// preg_match() permet de vérifier une correspondance avec une expression régulière(Regex)

$pseudo = $_POST['pseudo'];
$monExpression = '#^[a-zA-Z0-9._-]+$#';

if(!preg_match($monExpression,$pseudo)){
    $erreur .= '<div class="alert alert-danger" role="alert">Le pseudo contient des caractères non autorisés</div>';
}

// Req pour vérifier si le pseudo existe dans notre dans la bdd

$r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");

//En utilisant rowCount() afficher un message à l'user si le speudo existe

if($r->rowCount() >=1)
{
    $erreur .= '<div class="alert alert-danger" role="alert">Le pseudo n\'est pas disponible</div>';
}

//Hasher le mot de passe en utilisant password_hash()

$_POST['mdp'] = password_hash($_POST['mdp'],PASSWORD_DEFAULT);


// Insérer l'user dans la bdd

if(empty($erreur))
{
    $pdo->query("INSERT INTO membre(pseudo,mdp,nom,prenom,email,civilite,ville,code_postal,adresse) VALUES('$_POST[pseudo]','$_POST[mdp]','$_POST[nom]','$_POST[prenom]','$_POST[email]','$_POST[civilite]','$_POST[ville]','$_POST[cp]','$_POST[adresse]')");

    $content .= '<div class="alert alert-success" role="alert">L\'utilisateur a bien été enrégistré :)</div>';
}


    $content .= $erreur;

}






?>


<!---------------------PARTIE AFFICHAGE -->
<?php require_once './inc/header.inc.php'; ?>


<h1 class="text-center display-4 lead m-5">Inscription</h1>


<div class="container">
    <?= $content; ?>

    <form method="POST" action="">

        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo">

        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mdp" name="mdp">

        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">

        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom">

        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email">
        
        <input type="radio"  id="civilite" name="civilite" value="m" checked>
        Homme -- Femme
        <input type="radio"  id="civilite" name="civilite" value="f"><br>

        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">

        <label for="cp" class="form-label">Code Postal</label>
        <input type="text" class="form-control" id="cp" name="cp">

        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse">

        <button type="submit" class="btn btn-outline-primary btn-lg mt-2">S'inscrire</button>
    </form>
</div>



<? require_once './inc/footer.inc.php'; ?>