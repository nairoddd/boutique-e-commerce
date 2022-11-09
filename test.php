
<!-- traitement-------------------------- -->

<?php

require_once 'inc\init.php';

$regex = '#^[a-zA-Z0-9._-]+$#';

$erreur = '';


if($_POST){

// verifier pseudo

    if(strlen($_POST['pseudo']) <3 || strlen($_POST['pseudo']) >20){
        $erreur .= '<div class="alert alert-danger" role="alert">
        le pseudo doit etre compris entre 3 et 20 charactere
      </div>';
    }
    
    if (!preg_match($regex,($_POST['pseudo']))) {
        $erreur .= '<div class="alert alert-danger" role="alert">
        Characteres invalides
      </div>';
      }
// verifier si pseudo existe deja ds bdd


    $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");

    if($r->rowCount() >=1)
    {
        $erreur =  '<div class="alert alert-danger" role="alert">
        le pseudo existe deja
      </div>';
    }

// hasher le mdp

if(empty($_POST['mdp'])){
    $erreur .=  '<div class="alert alert-danger" role="alert">mot de passe vide</div>';
}

$password = password_hash($_POST['mdp'],PASSWORD_DEFAULT);


// echo $password;

// inserer l'user ds bdd

    if(empty($erreur))
    {
        $pdo->query("INSERT INTO membre(pseudo,mdp,nom,prenom,email,civilite,ville,codepostal,adresse) VALUES ('$_POST[pseudo]','$password','$_POST[nom]', '$_POST[prenom]','$_POST[email]','$_POST[civilite]','$_POST[ville]','$_POST[cp]','$_POST[adresse]')");

        $content .= '<div class="alert alert-success" role="alert">
        succés!
      </div>';
    }




  $content .= $erreur;
}





?>

<!-- AFFICHAGE--------------------------- -->








<?php
   require_once('inc/header.inc.php');
  ?>
  
<h1 class="text-center" >Inscription</h1>

<?php
   echo $content;
  ?>

<div class="container">
        <form method="POST" action="" class="w-50" >
    
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
    
            <button type="submit" class="btn btn-outline-primary btn-lg mt-2">Submit</button>
        </form>
    </div>

  <?php
   require_once('inc/footer.inc.php');
  ?>  
  </body>
</html>