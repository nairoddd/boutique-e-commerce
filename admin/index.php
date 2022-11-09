<?php require_once('../inc/init.php') ?>

<?php

if(!userIsAdmin()){
    header('location:../index.php');
    exit();
}

?>



<?php require_once('inc/head.php'); ?>

<h1 class="lead text-center mt-5">Admin Dashboard</h1>

<?php require_once('inc/foot.php'); ?>