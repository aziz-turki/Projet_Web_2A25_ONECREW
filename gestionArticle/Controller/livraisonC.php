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
    $conn= connect ();
    $requette = "SELECT * FROM livreur";
    $resultat = $conn->query($requette);
    $livreurs = $resultat->fetchAll();
    //var_dump($participants);
    return $livreurs;
    }


    function Tri_par_id()
{
$con=new config();
$co=$con->getconnexion();
$sql = "SELECT * FROM livraison order by Numlivraison  ";
$query=$co->prepare($sql);
$query->execute();
$occ=0;
while($data=$query->fetch())
{
$Numlivraison=$data['Numlivraison'];

$sql = "SELECT * FROM livraison where PersonID='$PersonID'  ";
$query1=$co->prepare($sql);
$query1->execute();
if($data1=$query1->fetch())
{
$occ++;





                                                


                                                    echo "<tr>";
                                                     echo "<form action='../../Views/admin/supprimerlivraison.php' method='POST'>";
                                                       echo "<td>";
                                                       echo $occ;
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo "<input class='trash' readonly name='idtest' value="; 
echo $data['Numlivraison'].">";
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['nom'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data1['prenom'];

                                                       echo "</td>";
                                                      
                                                       echo "<td>";
                                                       echo $data['Nom'];
                                                       echo "</td>";
                                                       echo "<td>";
                                                       echo $data['adresses'];

                                                       echo "</td>";
                                                      
                                                      
                                                       echo "<td><button value='delete' name='submit' class='btn btn-outline-danger'>Delete</button></td>
                                                         <td><button value='update' name='submit' class='btn btn-outline-info'>update</button></td>
<td><button value='Map' name='submit' class='btn btn-outline-warning'>Map</button></td>
                                                         </tr>";
                                                         echo "</form>";


                                                        
                                                        
                                                        
                                
                                                     }
                                                        
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