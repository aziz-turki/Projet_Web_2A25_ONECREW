<?php
  require '../../controller/livraisonC.php';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=liste_des_commandes.com.xls");
$livraisonC = new livraisonC();
    $listelivraisons=$livraisonC->afficherlivraisons();
 ?>
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border='2'>
                                    <thead>

  <tr>
    <th>Numlivraison</th>
    <th>Nom</th>
    <th>adresses</th>
     <th>DateInscription</th>
    <th>PersonID</th>


  </tr>
  
  <?php 
                foreach($listelivraisons as $livraison) {
        ?>

                                           <td><?php echo $livraison['Numlivraison']; ?></td>
                                          <td><?php echo $livraison['Nom']; ?></td>
                
                                            <td><?php echo $livraison['adresses']; ?></td>
        
                                              <td><?php echo $livraison['DateInscription']; ?></td>
                                             <td><?php echo $livraison['PersonID']; ?></td>
                                              
                                               
                                               
                                                
                                                </tr>
                                            
                                                </div>
                      </div>
                  </div>

              </div>
              <!-- /.container-fluid -->

          </div>


      <?php
              }
      ?>
</table>