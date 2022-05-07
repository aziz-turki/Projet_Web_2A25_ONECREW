<?php

    require_once '../../config.php';
    require_once '../../Model/article.php';


    Class articleC {

        function afficherarticle()
        {
            $requete = "select * from article";
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
        
       
        function getarticlebyID($id)
        {
            $requete = "select * from article where id=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajouterarticle($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO article
                (nom,description,categorie,prix,quantite,image)
                VALUES
                (:nom,:description,:categorie,:prix,:quantite,:image)
                ');
                $querry->execute([
                    'nom'=>$article->getNom(),
                    'categorie'=>$article->getCategorie(),
                    'description'=>$article->getDescription(),
                    'prix'=>$article->getPrix(),
                    'quantite'=>$article->getQuantite(),
                    'image'=>$article->getImage()
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierarticle($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE article SET
              nom=:nom,description=:description,categorie=:categorie,prix=:prix,quantite=:quantite

                where id=:id
                ');
                $querry->execute([
                    'id'=>$article->getId(),
                    'nom'=>$article->getNom(),
                    'categorie'=>$article->getCategorie(),
                    'description'=>$article->getDescription(),
                    'prix'=>$article->getPrix(),
                    'quantite'=>$article->getQuantite(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function modifierarticleImg($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE article SET
              nom=:nom,description=:description,categorie=:categorie,prix=:prix,quantite=:quantite,image=:image

                where id=:id
                ');
                $querry->execute([
                    'id'=>$article->getId(),
                    'nom'=>$article->getNom(),
                    'categorie'=>$article->getCategorie(),
                    'description'=>$article->getDescription(),
                    'prix'=>$article->getPrix(),
                    'quantite'=>$article->getQuantite(),
                    'image'=>$article->getImage()
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerarticle($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM article WHERE id =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
       
        
                function getarticle($id){
                    $requete="select * from article where id=:id   ";
                    $config= config::getConnexion();
                    try{
                    $query=$config->prepare($requete);
                    $query->execute(
                [ 
                    'id'=>$id,
                    
                ]);
                    $result=$query->fetchAll();
                    return $result;
                    }catch (PDOException $e)
                    {$e->getMessage();}
                }     

               
        
    }
