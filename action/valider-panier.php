<?php

session_start();
include "../inc/functions.php";

$conn = connect();

$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');
//creation de panier 

$requette_panier="INSERT INTO panier(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')" ;


//execution requette panier
$resultat = $conn ->query($requette_panier);

$panier_id = $conn->LastInsertId();



$commande = $_SESSION['panier'][3];

foreach($commandes as $commande ){
//ajouter commande 

//requette 

$quantite =$commande[0];
$total =$commande[1];
$id_produit =$commande[4];
$requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES ('$quantite', '$total' , $panier_id , '$date' , '$date' , '$id_produit' )  ";



$resultat = $conn ->query($requette);


}

$_SESSION['panier'] = null;

header('location:../index.php');


?>