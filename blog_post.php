<?php
error_reporting(-1);
ini_set('display_errors', 'On');

// On se connecte à MySQL JAI CHANGE LOCALHOST PAR 127.0.0.1 CAR CHEMIN DU SOCK PAS BON
//$bdd = new PDO('mysql:host=127.0.0.1;dbname=simplonDatabase;charset=utf8', 'root', 'origins');
$db = null;

include('database.php');
$bdd = connectbdd();
var_dump($bdd);

//PARTIE INSERTION DANS LES TABLES
// PAS INDISPENSABLE MAIS IDEAL POUR LA CONCATENATION
$title = $_POST['title'];
$content = $_POST['content'];

// CODE A ETUDIER DE PRET POUR INSERT LES DATA DU FORM (REQUETE DE TYPE PREPAREE)
$req = $db->prepare('INSERT INTO posts (title, content) VALUES(?, ?)');
$req->execute(array($title, $content));

header('Location: index.php');

