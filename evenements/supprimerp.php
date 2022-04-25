<?php
//echo "ID ".$_GET['idp'];
$idparticipant = $_GET['idp'];
include "inc/functions.php";
$conn= connect();
$requette = "DELETE FROM participant WHERE idp='$idparticipant'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:listp.php?delete=ok');

}

?>