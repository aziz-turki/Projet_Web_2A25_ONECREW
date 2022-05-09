<?php
//1_recuperation des donnees de la formulaire
$idi=$_POST['idev'];
$nomev=$_POST['nomev'];
$idev=$_POST['idev'];
$datedebutev=$_POST['datedebutev'];
$datefinev=$_POST['datefinev'];
$descriptionev=$_POST['descriptionev'];

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
$requette = " UPDATE evenements SET idev='$idev', nomev='$nomev',datedebutev='$datedebutev',descriptionev='$descriptionev',datefinev='$datefinev',image='$image' WHERE idev='$idi' ";

//4_Execution de la requette 
$resultat = $conn->query($requette);
if($resultat){
    header('location:listeev.php?modif=ok');

}

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    if ($e->getcode()==23000){
   header('location:listeev.php?erreur=duplicate');
  }
  }
?>


