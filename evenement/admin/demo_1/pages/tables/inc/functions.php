<?php

function connect (){
$servername = "localhost";
$username = "root";
$password = "root";

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

function getAllEvenements(){
    $conn= connect ();
    $requette = "SELECT * FROM evenements";
    $resultat = $conn->query($requette);
    $evenements = $resultat->fetchAll();
    //var_dump($participants);
    return $evenements;
    }

    function getAllParticipants(){
        $conn= connect ();
        $requette = "SELECT * FROM participant";
        $resultat = $conn->query($requette);
        $participants = $resultat->fetchAll();
        //var_dump($produits);
        return $participants;
        }


function getParticipantById($idp){
    $conn= connect ();
    $requette = "SELECT * FROM participant WHERE idp =$idp";
    $resultat = $conn->query($requette);
    $participant = $resultat->fetch();
    return $participant;

}
function getParticipantsByIdev($participants,$idev){
    $participantsIdev= array();

    foreach ($participants as $p){
        if($p['idev']== $idev){
            array_push($participantsIdev,$p);

        }
    }
    return $participantsIdev ;
}


?>