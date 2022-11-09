<?php

//1- Connexion à notre BDD

$pdo = new PDO('mysql:host=localhost;dbname=boutiquetest','root','',
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//var_dump($pdo);


//2 - Déclarer une variable qui va afficher les messages

$content = '';

// Je lance ma session

session_start();


require_once 'function.php';

define('URL','http://localhost/php/boutique/');

define('RACINE', $_SERVER['DOCUMENT_ROOT'] .'/php/boutique/');