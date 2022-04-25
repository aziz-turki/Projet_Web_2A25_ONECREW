<?php
	class livraison{
		private $Numlivraison=null;
		private $Nom=null;
		
		private $adresses=null;
		
		private $DateInscription;
		private $PersonID;
	
		
		
		function __construct($Numlivraison, $Nom,  $adresses,  $DateInscription,  $PersonID){
			$this->Numlivraison=$Numlivraison;
			$this->Nom=$Nom;
			$this->adresses=$adresses;
			$this->DateInscription=$DateInscription;
			$this->PersonID=$PersonID;
	
		}
		function getNumlivraison(){
			return $this->Numlivraison;
		}
		function getNom(){
			return $this->Nom;
		}
		
		function getadresses(){
			return $this->adresses;
		}
	
		function getDateinscription(){
			return $this->DateInscription;
		}
		function getPersonID(){
			return $this->PersonID;
		}
		
		
		function setNom(string $Nom){
			$this->Nom=$Nom;
		}
	
		function setadresses(string $adresses){
			$this->adresses=$adresses;
		}
	
		function setDateInscription(string $DateInscription){
			$this->DateInscriptionv=$DateInscription;
		}
		function setPersonID(string $PersonID){
			$this->PersonID=$PersonID;
		}
		
		
	}


?>