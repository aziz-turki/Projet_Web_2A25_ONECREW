<?php
	    include_once '../../controller/livraisonC.php';
	$livraisonC=new livraisonC();
	$livraisonC->supprimerlivraison($_GET["Numlivraison"]);
	header('Location:afficherlivraison.php');
?>