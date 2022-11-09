## DANS LE FICHIER INSCRIPTION.PHP

## JOUR 1

Etape 1

E nutilisant la fonction strlen() Vérifier la taille du pseudo (Le pseudo doit être compris entre 3 et 20 caractère)
En utilisant la fonction preg*match() pour vérifier si le pseudo contient les caractères autorisés '#^[a-zA-Z0-9.*-]+$#'
Vérifier si le pseudo est déjà dans la bdd(2 users ne peuvent pas avoir le même pseudo)

Etape 2

En utilisant la fonction password_hash() , crypter le mot de passe de l'user dans la bdd

## JOUR 2

1 - Créer la page de connexion avec les champs (pseudo et mot de passe)
2 - Vérifier si le pseudo existe dans la bdd
3 - Vérifier si le mot de passe saisi correspond au mot de passe de cet user (Utiliser la fonction password_verify())
4 - Créer une session membre qui contiendra toutes les informations du membre connecté
5 - Rediriger l'user vers la page profil.php et lui afficher ces infos (Tout user qui n'est pas connecté ne pourra pas accéder à la page profil.php)

6-Ajouter un user avec le pseudo admin puis dans la bdd modifier son statut à 1 (Un membre qui a son statut à un est un admin)

7- Créer un fichier function.php qui contiendra toutes nos fonctions dans le dossier inc. Faites un appel à cet fichier dans le fichier init.php

8 - Dans le fichier function.php Faites une fonction userConnected() qui vérifie si l'user est connecté . Cette fonction doit renvoyer un booléen

9 - Dans le fichier function.php Faites une fonction userIsAdmin() qui vérifie si l'user qui est connecté est admin.Cette fonction doit renvoyer un booléen

10 - Si un qui user est déjà connecté essai d'accéder à la page connxion.php , vous devez le rediriger vers profil.php en utilisant la fonction header('location:')

11 - Si l'user n'est pas connecté mais veux accéder à profil.php on le redirige vers index.php

++++ Réorganiser les liens du menu en utilisant <?php if(): ?> lien du menu <?php endif ?>

Si l'user est admin il doit voir backoffice dans le menu qui pointe vers la page index.php qui se trouve dans admin

Si l'user est connecté il verra dans son menu BOUTIQUE - PANIER - PROFIL - DECONNEXION

Si l'user n'est pas connecté il verra INSCRIPTION - CONNEXION - BOUTIQUE - PANIER

## JOUR 3

1 - Mettre en place la page index.php de la partie back-end (dossier admin)
2 - Créer un fichier gestion*produit.php
A- Faites le formulaire d'ajout d'un produit(NB: La référence produit doit être unique)
* Faites l'affichage des produits sur le même fichier
\_ Gérer la modification puis la suppression d'un produit
3 - Afficher tous les produits sur la page index.php de la boutique

## JOUR 4

/////////////////////////////LES ETAPES POUR L'AFFICHAGE DES PRODUITS SUR LA PAGE INDEX DE BOUTIQUE

1- Faire une req qui récupère toutes les catégories

2 -Boucler sur le résultat de la req afin d'afficher toutes nos catégories

3 - Au clic sur une catégorie, passer le nom de la catégrie en GET dans l'url

4 - Faire une req qui récupère les produits de la catégorie passée dans l'url

5 - Boucler sur le resultat pour afficher les produits de cette catégorie dans une div card

## JOUR 5

//////////////////////////////LES ETAPES POUR LA FICHE PRODUIT

Au clic sur un produit, je récupère l'id du produit

1- Envoyer l'user vers le fichier fiche-produit.php

2 - Faire une req qui récupère les infos du produit qui sont en GET ( je passe l'id dans l'url)

3- j'affiche les détails dui produit dans une div (titre,catégorie , coueur , taille , photo, quantité) et un bouton ajouter au panier

## JOUR 6

////////////////////////////////////////////////LES ETAPES POUR LE PANIER

Au clic sur le bouton ajouter au panier,

1- envoyer l'user vers le fichier panier.php

2- Faire une fonction creation_panier() dans le fichier function.php qui va créer une session panier

3- Faire une fonction ajoutProduit() qui prend en argument l'id,la quantité et le prix qui vérifie première si le produit est dans dans le panier Utiliser array_search() pour la vérification. Si le produit y est déjà , on incrémente la quantité sinon on l'ajoute.

4- Créer une fonction montantTaotal() dans function.php qui calcul le montant total du panier

5- Afficher les produits qui sont dans le panier dans une table html(id ou titre du produit, quantité, prix unitaire puis le montant total)


## JOUR 7

////////////////////////////////////////////////LES ETAPES POUR LA VALIDATION DE LA COMMANDE

Si l'user clic sur le bouton payer(Ce bouton doit être dans une balise form)

1- boucler sur le panier et récupérer tous les datas puis vérifier si la quantité est disponible en stock

2- Si la quantité demandé est supérieur à la quantité en stock alors on fera un ajustement de la quantité demandée

3- Faire une fonction retirerProduit() qui prend l'id du produit à supprimer et supprime le produit du panier


## JOUR 8




