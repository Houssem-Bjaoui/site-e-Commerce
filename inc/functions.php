<?php

//CONNEXION DB

function connect(){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce"; // Added the missing semicolon here

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

return $conn;

}


//         AFFICHER LES CATEGORIES  ///

function getAllCategories(){

   $conn= connect();
// 2- création de la requette

$requette= "SELECT * FROM  categories";


//3- execution de la requette
$resultat= $conn->query($requette);

//4- resultat de la requette

$categories= $resultat->fetchAll();

return $categories;
}


function getAllproducts(){

  $conn= connect();

// 2- création de la requette

$requette= "SELECT * FROM  produits";


//3- execution de la requette
$resultat= $conn->query($requette);

//4- resultat de la requette

$produits = $resultat->fetchAll();

return $produits;
}

//SEARCH PRODUCTS

function searchProduits($keywords){

  $conn= connect();

$requette= "SELECT * FROM produits WHERE nom LIKE '%$keywords%' " ;

$resultat= $conn->query($requette);

$produits = $resultat->fetchAll();

return $produits;

}


function getProduitsById($id){
  $conn= connect();

  $requette= "SELECT * FROM produits WHERE id=$id";

  $resultat= $conn->query($requette);

  $produit = $resultat->fetch();

  return $produit;
}


function  AddVisiteur($data){

  $conn= connect();

$mphash = md5($data['mp']);

  $requette = "INSERT INTO visiteurs(nom, prenom, email, mp, telephone) 
  VALUES (
    '".$data['nom']."', '".$data['prenom']."', '".$data['email']."', '".$mphash."', '".$data['telephone']."'
  )";


$resultat= $conn->query($requette);

if($resultat){
  return true;

}else{
  return false;
}

}

function connectVisiteur($data) {
  // Establish the connection
  $conn = connect();

  // Retrieve email and hashed password (using md5 for hashing)
  $email = $data['email'];
  $mp = md5($data['mp']);

  // Use prepared statement to avoid SQL injection
  $stmt = $conn->prepare("SELECT * FROM visiteurs WHERE email = :email AND mp = :mp");
  
  // Execute the query with user data
  $stmt->execute([
      ':email' => $email,
      ':mp' => $mp
  ]);

  // Fetch result
  $user = $stmt->fetch();

  return $user;
}


function connectAdmin($data) {
  // Establish the connection
  $conn = connect();

  // Retrieve email and hashed password (using md5 for hashing)
  $email = $data['email'];
  $mp = md5($data['mp']);

  // Use prepared statement to avoid SQL injection
  $stmt = $conn->prepare("SELECT * FROM admin WHERE email = :email AND mp = :mp");
  
  // Execute the query with user data
  $stmt->execute([
      ':email' => $email,
      ':mp' => $mp
  ]);

  // Fetch result
  $user = $stmt->fetch();

  return $user;
}


function getAllusers(){
  // Establish the connection
  $conn = connect();

  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT * FROM visiteurs WHERE etat = 0");

  // Execute the statement
  $stmt->execute();

  // Fetch all the users
  $users = $stmt->fetchAll(); 

  // Return the users
  return $users;
}


function getStock(){

    // Establish the connection
    $conn = connect();

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT p.nom , s.id , s.quantite FROM produits p , stock s WHERE p.id = s.produit");
  
    // Execute the statement
    $stmt->execute();
  
    // Fetch all the users
    $stock = $stmt->fetchAll(); 
  
    // Return the users
    return $stock;

}
 
function getAllcommandes(){
  // Establish the connection
  $conn = connect();

  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT v.nom, v.prenom, v.telephone, p.total, p.etat, p.date_creation, p.id FROM panier p, visiteurs v WHERE p.visiteur = v.id");

  // Execute the statement
  $stmt->execute();

  // Fetch all the users
  $commandes = $stmt->fetchAll(); 

  // Return the users
  return $commandes;
}


function  getData(){
  $data =array();

  $conn = connect();

$requette = "SELECT COUNT(*) FROM produits";
$resultat = $conn->query($requette);
$nb_produits = $resultat->fetch();





$requette1 = "SELECT COUNT(*) FROM categories";
$resultat = $conn->query($requette1);
$nb_categories = $resultat->fetch();




$requette2= "SELECT COUNT(*) FROM visiteurs";
$resultat = $conn->query($requette2);
$nb_visiteurs =$resultat->fetch();



$data ["produits"] = $nb_produits[0];

$data ["categories"] = $nb_categories[0];

$data ["visiteurs"] = $nb_visiteurs[0];

return $data;
}
?>