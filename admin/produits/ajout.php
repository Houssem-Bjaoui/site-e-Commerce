<?php
session_start();


include "../../inc/functions.php";


$nom = $_POST['nom'];

$description = $_POST['description'];

$prix = $_POST['prix'];

$createur = $_POST['createur'];

$categorie = $_POST['categorie'];
$quantite = $_POST['quantite'];
$date = date('Y-m-d');
// ipload image 


$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
   $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $date = date ('Y-m-d');

  

$conn=connect();

 //Requette

 $requette= "INSERT INTO produits(nom,description,prix,image,categorie,createur,date_creation) 
 VALUES ('$nom','$description','$prix','$image','$categorie','$createur','$date') ";

$result=$conn ->query($requette);



if($result){

  $produit_id = $conn -> lastInsertId();

  $requette2 = "INSERT INTO stock(produit,quantite,createur,date_creation) VALUES(
    '$produit_id','$quantite','$createur','$date'
  )";
  if($conn -> query($requette2)){
  header('location:listp.php?ajout=ok');
}{
 echo "impossible";
}

   
}


?>