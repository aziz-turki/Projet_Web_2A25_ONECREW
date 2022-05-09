<?php
//1_recuperation des donnees de la formulaire
$nomev=$_POST['nomev'];
$idev=$_POST['idev'];
$descriptionev=$_POST['descriptionev'];
$datedebutev=$_POST['datedebutev'];
$datefinev=$_POST['datefinev'];

//2_la chaine de connexion
include "inc/functions.php";
$conn = connect();

try {
    
//3_Creation de la requette 
$requette = "INSERT INTO evenements(idev,nomev,descriptionev,datedebutev,datefinev) VALUES ('0','$nomev','$descriptionev','$datedebutev','$datefinev')";

//4_Execution de la requette 
$resultat = $conn->query($requette);
if($resultat){
    header('location:listeev.php?ajout=ok');

}

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    if ($e->getcode()==23000){
   header('location:listeev.php?erreur=duplicate');
  }
  }
?>