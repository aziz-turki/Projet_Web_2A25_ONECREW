<?php

function connect (){
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=beauty_center", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
return $conn;
}

function getAllEvents(){
    $conn= connect ();
    $requette = "SELECT * FROM evenements";
    $resultat = $conn->query($requette);
    $evenements = $resultat->fetchAll();
    //var_dump($produits);
    return $evenements;
    }

function getProduitById($ref){
    $conn= connect ();
    $requette = "SELECT * FROM produits WHERE ref =$ref";
    $resultat = $conn->query($requette);
    $produit = $resultat->fetch();
    return $produit;

}
function getProductsByIdcat($produits,$idcat){
    $produitsIdcat= array();

    foreach ($produits as $p){
        if($p['idcat']== $idcat){
            array_push($produitsIdcat,$p);

        }
    }
    return $produitsIdcat ;
}

?>