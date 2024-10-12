<?php


$id =$_GET['idp'];

include "../../inc/functions.php";

// Connexion à la base de données
$conn=connect();


$requette = "DELETE FROM produits WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
    
    header ('location:listp.php?delete=ok');

}

?>