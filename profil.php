<?php
require_once 'inc/init.php';


if (!userConnected()) {
    header('location:connexion.php');
    exit();
}

if (userIsAdmin()) {
    $content .= '<div class="alert alert-secondary" role="alert">Bonjour Admin</div>';
    
}





/* 
if(isset($_SESSION['membre']))
{
    $content .= 'Bonjour';

    $content .= $_SESSION['membre']['pseudo'] .'<br>';
    $content .= $_SESSION['membre']['nom'].'<br>';
    $content .=  $_SESSION['membre']['prenom'].'<br>';
    $content .= $_SESSION['membre']['email'].'<br>';
    $content .= $_SESSION['membre']['civilite'].'<br>';
 
    $content .= $_SESSION['membre']['ville'].'<br>';
    $content .= $_SESSION['membre']['code_postal'].'<br>';
    $content .= $_SESSION['membre']['adresse'].'<br>';
}else{
    header('location:connexion.php');
} */


?>



<!--PARTIE AFFICHAGE -->
<?php require_once('./inc/header.inc.php'); ?>

<h1 class="text-center text-muted">Page profil</h1>

<div class="container">
    <?= $content; ?>

    <?php
        
        echo $_SESSION['membre']['pseudo'] .'<br>';
        echo $_SESSION['membre']['nom'].'<br>';
        echo  $_SESSION['membre']['prenom'].'<br>';
        echo $_SESSION['membre']['email'].'<br>';
        echo $_SESSION['membre']['civilite'].'<br>';
        echo $_SESSION['membre']['ville'].'<br>';
        echo $_SESSION['membre']['code_postal'].'<br>';
        echo $_SESSION['membre']['adresse'].'<br>';

    ?>


</div>




<?php require_once('./inc/footer.inc.php'); ?>