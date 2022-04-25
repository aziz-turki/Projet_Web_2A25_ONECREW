<?php
    include_once '../../controller/livreurC.php';
	$livreurC=new livreurC();
	$livreurC->supprimerlivreur($_GET["PersonID"]);
	header('Location:afficherlivreur.php');
?>