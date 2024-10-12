<?php
session_start();


include "../../inc/functions.php";
$id= $_POST['idp'];

$nom = $_POST['nom'];

$description = $_POST['description'];

$prix = $_POST['prix'];

$createur = $_POST['createur'];

$categorie = $_POST['categorie'];


//connexion DB

$conn=connect();
 //Requette

 $requette= "UPDATE produits SET  nom='$nom', description='$description','prix=$prix', cataegorie = $categorie Where id='$id'";

$result=$conn ->query($requette);
if($result){
    header('location:listp.php?edit=ok');
}
?>