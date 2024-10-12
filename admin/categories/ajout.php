<?php

// récuoération des données de formulaire 
session_start();
$nom= $_POST['nom'];
$description= $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("Y-m-d");

//connexion DB
include "../../inc/functions.php";

$conn=connect();
 //Requette

 $requette= "INSERT INTO categories(nom,description,createur,date_creation) 
 VALUES ('$nom','$description','$createur','$date_creation')";

$result=$conn ->query($requette);

if($result){

    header('location:list.php?ajout=ok');
}

?>