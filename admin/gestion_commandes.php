<?php require_once('../inc/init.php'); ?>

<?php
//1-  Si l'user n'est pas admin je le redirige vers la page index de la boutique
if (!userIsAdmin()) {
    header('location:../index.php');
    exit();
}


//2- Au clic sur le bouton changer état , je mets à jour l'état de la commande
if (isset($_POST['statut_cmde'])) {

    // ici je récupère état et l'id_commande qui sont envoyés en POST
    $pdo->query("UPDATE commande SET etat='$_POST[etat]' WHERE id_commande='$_POST[id_commande]'");

}


// 1- Je récupère toutes les commandes que j'affiche dans une table html
$allOrder = $pdo->query("SELECT * FROM commande ORDER BY id_commande DESC");

$content .= '<table class="table table-striped"><tr>';

for ($i = 0; $i < $allOrder->columnCount(); $i++) {

    $colone = $allOrder->getColumnMeta($i);

    $content .= '<th>' . $colone['name'] . '</th>';
}
$content .= '</tr>';

while ($OneOrder = $allOrder->fetch(PDO::FETCH_ASSOC)) {

    $content .= '<tr>';

    foreach ($OneOrder as $key => $value) {

        if ($key == 'etat') { // si la clé est = état alors je veux afficher l'état de la commande dans un formulaire en utilisant une balise select
            $content .= '<form method="POST" action ="">';
            // Je récupère l'id de la commande dans un input hiddent
            $content .= "<input type=\"hidden\" name=\"id_commande\" value=\"$OneOrder[id_commande]\">";
            $content .= "<td class=\"align-middle\">";
            $content .= "<select name=\"etat\">";
            $content .= "<option value=\"$value\">$value</option>";
            $content .= "<option value='envoyé'>Envoyé</option>";
            $content .= "<option value='livré'>Livré</option>";
            $content .= "</select>";
            $content .= "<input type=\"submit\" value=\"Changer état\" name=\"statut_cmde\" class=\"btn btn-outline-primary btn-sm ms-2\">";
            $content .= '</form>';
        } else {
            $content .= "<td class=\"align-middle\">$value</td>";
        }
    }

    $content .= '</tr>';
}

$content .= '</table>';









?>







<?php require_once('inc/head.php'); ?>
<h1 class="text-center display-4">GESTION DES COMMANDES</h1>

<?= $content; ?>




<?php require_once('inc/head.php'); ?>