<?php
require_once     '../../Controller/panierlineC.php';



    if (isset($_POST["id"] ) && isset($_POST["nbr"] ))
    {
       foreach ($_POST["id"] as $id) {
           
       
       $nbr = $_POST["nbr"];
      // $id = $_POST["id"];
       

            $PanierlineC = new panierlineC();
            $PanierlineC->editQuantity($id,$nbr);
            //header('Location:afficherpanier.php');
            echo 'success';
       }
    } else {
        echo 'dskjzdkjz';
    }
    ?>