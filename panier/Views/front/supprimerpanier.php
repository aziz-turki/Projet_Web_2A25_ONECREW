<?php
require_once     '../../Controller/panierlineC.php';
	
$PanierlineC = new panierlineC();
$PanierlineC->supprimerpanier($_GET["prix"]);
	header('Location:afficherpanier.php');
?>