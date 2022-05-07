<?php
	include '../../config.php';
	include_once '../../Model/livraison.php';
	class livraisonC {
		function afficherlivraisons(){
			$sql="SELECT * FROM livraison";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
			
 

		function supprimerlivraison($Numlivraison){
			$sql="DELETE FROM livraison WHERE Numlivraison=:Numlivraison";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Numlivraison', $Numlivraison);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterlivraison($livraison){
			$sql="INSERT INTO livraison (Numlivraison, Nom,  adresses,  DateInscription, PersonID) 
			VALUES (:Numlivraison,:Nom,:adresses,:DateInscription,:PersonID)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Numlivraison' => $livraison->getNumlivraison(),
					'Nom' => $livraison->getNom(),
					
					'adresses' => $livraison->getadresses(),
					
					'DateInscription' => $livraison->getDateinscription(),
					'PersonID' => $livraison->getPersonID()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererlivraison($Numlivraison){
			$sql="SELECT * from livraison where Numlivraison=$Numlivraison";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$livraison=$query->fetch();
				return $livraison;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function getAllLivreurs(){
    $db = config::getConnexion();
    $requette = "SELECT * FROM livreur";
    $resultat = $db->query($requette);
    $livreurs = $resultat->fetchAll();
    //var_dump($participants);
    return $livreurs;
    }



//triii
        function affichertri()
        {
            $requete = "select * from livraison ORDER BY PersonID";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
            function affichertri1()
        {
            $requete = "select * from livraison ORDER BY DateInscription";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function recherchelivraison($Numlivraison)
        {
            $requete = "select * from livraison where Numlivraison like '%$Numlivraison%'";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
	function getclienntbyID($Numlivraison)
        {
            $requete = "select * from livraison where Numlivraison=:Numlivraison";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'Numlivraison'=>$Numlivraison
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
		
		function modifierlivraison($livraison, $Numlivraison){
			try {
				$db = config::getConnexion();

					$query = $db->prepare(
					'UPDATE livraison SET 
						Nom= :Nom, 
						adresses= :adresses, 
						DateInscription= :DateInscription,
						PersonID= :PersonID
						
					WHERE Numlivraison= :Numlivraison'
				);
								
				$query->execute([
					'Nom' => $livraison->getNom(),
					'adresses' => $livraison->getadresses(),
					'DateInscription' => $livraison->getDateinscription(),
					'PersonID' => $livraison->getPersonID(),
					
					'Numlivraison' => $Numlivraison
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


	}
?>