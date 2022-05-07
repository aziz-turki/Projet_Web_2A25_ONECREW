<?php

	include_once '../../Model/livreur.php';
	class livreurC {
		function afficherlivreur(){
			$sql="SELECT * FROM livreur";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
			
		function supprimerlivreur($PersonID){
			$sql="DELETE FROM livreur WHERE PersonID=:PersonID";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':PersonID', $PersonID);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterlivreur($livreur){
			$sql="INSERT INTO livreur (PersonID, nom,  prenom,  age) 
			VALUES (:PersonID,:nom,:prenom,:age)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'PersonID' => $livreur->getPersonID(),
					'nom' => $livreur->getnom(),
					
					'prenom' => $livreur->getprenom(),
					
					'age' => $livreur->getage()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererlivreur($PersonID){
			$sql="SELECT * from livreur where PersonID=$PersonID";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$livreur=$query->fetch();
				return $livreur;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	
		
		function modifierlivreur($livreur, $PersonID){
			try {
				$db = config::getConnexion();

					$query = $db->prepare(
					'UPDATE livreur SET 
						nom= :nom, 
						prenom= :prenom, 
						age= :age
						
						
					WHERE PersonID= :PersonID'
				);
								
				$query->execute([
					'nom' => $livreur->getnom(),
					'prenom' => $livreur->getprenom(),
					'age' => $livreur->getage(),
					
					
					'PersonID' => $PersonID
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


	}
?>
