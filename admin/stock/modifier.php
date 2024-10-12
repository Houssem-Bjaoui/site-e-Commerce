<?php

// récupération des données de formulaire 
session_start();
$id= $_POST['ids'];
$quantite= $_POST['quantite'];





//connexion DB
include "../../inc/functions.php";

$conn=connect();
 //Requette

 $requette= "UPDATE stock SET  quantite='$quantite' Where id='$id' ";

$result=$conn ->query($requette);
if($result){
    header('location:list.php?edit=ok');
}

?>