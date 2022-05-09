<?php
//echo "ID ".$_GET['idev'];
$idevenement = $_GET['idev'];
include "inc/functions.php";
$conn= connect();
$requette = "DELETE FROM evenements WHERE idev='$idevenement'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:listeev.php?delete=ok');

}

?>