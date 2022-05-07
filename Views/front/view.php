<h1>Notifications</h1>

<?php
    
    include("functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='1'){
                echo ucfirst($i['name'])." Votre Produit a ete delivre. <br/>".$i['date'];
            }else{
                echo "Votre Produit est en cours de livraison.<br/>".$i['message'];
            }
        }
    }
    
?><br/>
<a href="livraison.php">Back</a>