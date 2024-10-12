<?php
session_start();
// test user connecter 

if(!isset($_SESSION['nom'])){ // user non connecter
    header("location:../login.php");
    exit();
}




include "../inc/functions.php";

$conn = connect();

 $visiteur= $_SESSION['id'];




$id_produit = $_POST['produit'];

$quantite = $_POST['quantite'];






// Retrieve product price from the database
$requette = "SELECT prix ,nom FROM produits WHERE id='$id_produit' ";
$resultat = $conn->query($requette);
$produit = $resultat->fetch();

if ($produit) { // Make sure product is found
    $total = $quantite * $produit['prix'];
    $date = date("Y-m-d");

    // Check if the shopping cart session exists, otherwise create it
    if (!isset($_SESSION['panier'])) { 
        $_SESSION['panier'] = array($visiteur, 0, $date, array()); // Create cart
    }

    // Update total in session and add product to the cart
    $_SESSION['panier'][1] += $total;
    $_SESSION['panier'][3][] = array($quantite, $total, $date, $date, $id_produit , $produit['nom']);

}
 


header('location:../panier.php')

?>