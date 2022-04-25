<?php
//1_recuperation des donnees de la formulaire
$nomp=$_POST['nomp'];
$prenomp=$_POST['prenomp'];
$idp=$_POST['idp'];
$idev=$_POST['idev'];


//2_la chaine de connexion
include "inc/functions.php";
$conn = connect();

try {
    
//3_Creation de la requette 
$requette = "INSERT INTO participant(idp,nomp,prenomp,idev) VALUES ('0','$nomp','$prenomp','$idev')";

//4_Execution de la requette 
$resultat = $conn->query($requette);
if($resultat){
    header('location:listp.php?ajout=ok');

}

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    if ($e->getcode()==23000){
   header('location:listp.php?erreur=duplicate');
  }
  }
?>