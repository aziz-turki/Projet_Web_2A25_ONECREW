<?php
require_once     '../../Controller/panierlineC.php';
    require_once '../../Model/panier.php' ;
session_start();


    if (isset($_GET['prix'] ) && isset($_GET['nom_produit'] ))
    {
       //$id_utilisateur = $_SESSION['id_user'];
       //$id_panier = $_SESSION['id_panier'];
       $id_panier = 1;
       $id_utilisateur = 1;
       $nbr = 1;
       $prix = $_GET['prix'];
       $nom_produit = $_GET['nom_produit'];
       

            $panier_line = new panier_line(
                $id_panier,
                $id_utilisateur,
                $prix,
                $nbr,
                $nom_produit
            );
            $PanierlineC = new panierlineC();
            $PanierlineC->ajouterPanier($panier_line);
            $_SESSION['produitAjoute'] = 1;
            header('Location:articles.php');
    }
    ?>