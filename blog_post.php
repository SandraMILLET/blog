<?php
error_reporting(-1);
ini_set('display_errors', 'On');

// On se connecte à MySQL JAI CHANGE LOCALHOST PAR 127.0.0.1 CAR CHEMIN DU SOCK PAS BON
//$bdd = new PDO('mysql:host=127.0.0.1;dbname=simplonDatabase;charset=utf8', 'root', 'origins');
$bdd = null;

include('database.php'); 
 $bdd=connectbdd();
var_dump($bdd);

//PARTIE INSERTION DANS LES TABLES

$titre = $_POST['titre'];
$description = $_POST['description'];

// CODE A ETUDIER DE PRET POUR INSERT LES DATA DU FORM (REQUETE DE TYPE PREPAREE)
$request = $bdd->prepare('INSERT INTO posts (titre, description) VALUES(?, ?)');
$request->execute(array($titre, $description));

header('Location: index.php');
?>