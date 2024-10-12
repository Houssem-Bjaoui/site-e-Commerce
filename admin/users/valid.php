<?php
include "../../inc/functions.php";


$iduser = $_GET['id'];



$conn=connect();

$requette = "UPDATE visiteurs SET etat=1 WHERE id = '$iduser'";
$result = $conn->query($requette);

if($result){
    header('lacation:list.php?valider=ok');
}else

echo "errrrrror";

?>