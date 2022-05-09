<?php
//1_recuperation des donnees de la formulaire
$idev=$_POST['idev'];
$nomev=$_POST['nomev'];
$descriptionev=$_POST['descriptionev'];
$datedebutev=$_POST['datedebutev'];
$datefinev=$_POST['datefinev'];

//upload image
$target_dir = "../../../../Views/images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if 
  (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
  {
    $image=$_FILES["image"]["name"];
  } 
  else 
  {
    echo "Sorry, there was an error uploading your file.";
  }


//2_la chaine de connexion
include "inc/functions.php";
$conn = connect();

try {
    
//3_Creation de la requette 
$requette = "INSERT INTO evenements(idev,nomev,descriptionev,datedebutev,datefinev,image) VALUES ('0','$nomev','$descriptionev','$datedebutev','$datefinev','$image')";

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

