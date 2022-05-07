<?php
    require_once     '../../Controller/commandec.php';
	$commandec=new commandec();
	$commandec->supprimercommande($_GET["num"]);
	header('Location:affichercommande.php');
?>