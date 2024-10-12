<?php


$id =$_GET['idc'];

include "../../inc/functions.php";

// Connexion à la base de données
$conn=connect();


$requette = "DELETE FROM categories WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
    
    header ('location:list.php?delete=ok');

}

?>