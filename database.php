<?php

function connectbdd(){
    //CHAPITRE LIRE DES DONNEES DANS LA BDD
    try
    {
        // On se connecte à MySQL 
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=simplonDatabase;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        return $bdd;
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
}

function deletepost(){
    $bdd=deletepost(); 
    $request=$bdd->prepare("DELETE from posts where id=" . $_POST['id']);
    header('Location: index.php');
}