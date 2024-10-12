<?php
// récupération des données de formulaire 
session_start();
$id= $_POST['idc'];
$nom= $_POST['nom'];
$description= $_POST['description'];
$date_modification = date("Y-m-d");




//connexion DB
include "../../inc/functions.php";

$conn=connect();
 //Requette

 $requette= "UPDATE categories SET  nom='$nom', description='$description', date_modification ='$date_modification' Where id='$id' ";

$result=$conn ->query($requette);
if($result){
    header('location:list.php?edit=ok');
}
?>