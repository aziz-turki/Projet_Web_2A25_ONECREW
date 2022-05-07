<?php

    require_once '../../config.php';
    require_once '../../Model/commande.php';


    Class commandec {

        function affichercommande()
        {
            $requete = "select * from commande";
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
        function ajoutercommande($commande){
			$sql="INSERT INTO commande (num, nom, prenom, telephon, email, adress, region, ville) 
			VALUES (:num,:nom,:prenom,:telephon, :email, :adress, :region, :ville)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'num' => $commande->getnum(),
					'nom' => $commande->getnom(),
					'prenom' => $commande->getprenom(),
					'telephon' => $commande->gettelephon(),
					'email' => $commande->getemail(),
					'adress' => $commande->getadress(),
					'region' => $commande->getregion(),
					'ville' => $commande->getville()
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
       
        function getcommandebynum($num)
        {
            $requete = "select * from commande where num=:num";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'num'=>$num
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

    
        function supprimercommande($num){
			$sql="DELETE FROM commande WHERE num=:num";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':num', $num);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		
		}       
        
                function getcommande($num){
                    $requete="select * from commande where num=:num";
                    $config= config::getConnexion();
                    try{
                    $query=$config->prepare($requete);
                    $query->execute(
                [ 
                    'num'=>$num,
                    
                ]);
                    $result=$query->fetchAll();
                    return $result;
                    }catch (PDOException $e)
                    {$e->getMessage();}
                }     

               
                function recuperercommande($num){
                    $sql="SELECT * from commande where num=$num";
                    $db = config::getConnexion();
                    try{
                        $query=$db->prepare($sql);
                        $query->execute();
        
                        $commande=$query->fetch();
                        return $commande;
                    }
                    catch (Exception $e){
                        die('Erreur: '.$e->getMessage());
                    }
                }


            function affichertri()
        {
            $requete = "select * from commande ORDER BY telephon";
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
        function recherchecommande($num )
        {
            $requete = "select * from commande where num  like '%$num%'";
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
        

    
    function modifiercommande($commande)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            UPDATE commande SET
            nom= :nom, 
            prenom= :prenom, 
            telephon= :telephon,
            email= :email,
            adress= :adress,
            region= :region,
            ville= :ville   

            where num=:num
            ');
            $querry->execute([
                'num' => $commande->getnum(),
                'nom' => $commande-> getnom(),
                'prenom' => $commande->getprenom(),
                'telephon' => $commande->gettelephon(),
                'email' => $commande->getemail(),
                'adress' => $commande-> getadress(),
                'region' => $commande->getregion(),
                'ville' => $commande->getville()
               
            ]);
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }


    }
