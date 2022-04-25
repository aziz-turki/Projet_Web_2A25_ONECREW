<?php
	class livreur{
		private $PersonID=null;
		private $nom=null;
		private $prenom=null;
		private $age=null;	
		
	
		
		
		function __construct($PersonID, $nom,  $prenom,  $age){
			$this->PersonID=$PersonID;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->age=$age;
			
	
		}
		function getPersonID(){
			return $this->PersonID;
		}
		function getnom(){
			return $this->nom;
		}
		
		function getprenom(){
			return $this->prenom;
		}
	
		function getage(){
			return $this->age;
		}
		
		
		function setnom(string $nom){
			$this->nom=$nom;
		}
	
		function setprenom(string $prenom){
			$this->prenom=$prenom;
		}
	
		function setage(string $age){
			$this->age=$age;
		}
		
		
		
	}


?>