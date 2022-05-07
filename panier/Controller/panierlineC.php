<?php
include_once '../../config.php';
include_once '../../Model/panier.php';

class panierlineC
{
	
	function ajouterPanier($panier)
	{

		$sql="INSERT INTO panier_line (id_panier , id_utilisateur, prix, nbr, nom_produit) 
				VALUES (:id_panier ,:id_utilisateur,:prix,:nbr,:nom_produit)";
	
		$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);	

        $id_panier        =$panier->getId_panier();
		$id_utilisateur   =$panier->getId_utilisateur();
		$prix       	  =$panier->getPrix();	
		$nbr	  		  =$panier->getNbr();
		$nom_produit	  =$panier->getNom_produit();


		$req->bindValue(':id_utilisateur',$id_utilisateur);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':nbr',$nbr);
        $req->bindValue(':nom_produit',$nom_produit);
        $req->bindValue(':id_panier',$id_panier);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	
	}


	function afficherpanier($id_utilisateur)
	{
		$sql="SELECT * FROM panier_line  where id_panier=$id_utilisateur;";
		$db = config::getConnexion();
		try
		{
			$liste=$db->query($sql);
			
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

    function getpanierbyid_panier($id_panier)
    {
        $requete = "select * from panier where id_panier=:id_panier";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id_panier'=>$id_panier
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }



    function supprimerpanier($id){
        $sql="DELETE FROM panier_line WHERE id=:prix";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':prix', $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function getarticlebyNom($nom)
        {
            $requete = "select * from article where nom='".$nom."'";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
   

	function modifierPanier($id,$nbr)
	{
		$sql="UPDATE panier_line  set `nbr`=:nbr where `id_panier`=:id";
		$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);	
		$req->bindValue(':nbr',$nbr);
		$req->bindValue(':id',$id);
            
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }	
	}

    function editQuantity($id,$nbr)
	{
		$sql="UPDATE panier_line  set `nbr`=:nbr where `id`=:id";
		$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);	
		$req->bindValue(':nbr',$nbr);
		$req->bindValue(':id',$id);
            
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }	
	}

    function recupererCoupon($coupon){
        $sql="SELECT * from coupon where coupon='".$coupon."'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $Voiture=$query->fetch();
            return $Voiture;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}




?>