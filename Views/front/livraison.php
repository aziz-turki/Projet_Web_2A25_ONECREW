<?php
      require_once     '../../controller/livraisonC.php';
      include("functions.php");

    $livraisonC=new livraisonC();
    $listelivraisons=$livraisonC->afficherlivraisons(); 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Article</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
        <img src="images/lol.png" alt="image" height="55" width="120" >
	      <a class="navbar-brand" href="index.html"><!--<span class="flaticon-lotus">--></span>Temple Glamour</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="treatments.html" class="nav-link">Evénement</a></li>
	          <li class="nav-item active"><a href="articles.html" class="nav-link">Article</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Commande</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
           
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications 
                <?php
                $query = "SELECT * from `notifications` where `status` = 'unread' order by `date` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
                    ?>
              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notifications` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='0'){
                    echo "Votre Produit est en cours de livraison.";
                }else if($i['type']=='1'){
                    echo ucfirst($i['name'])."  Votre Produit a ete delivre..";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>
        </ul>
          <?php 
          
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '', '0', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:index.php");
              }
          }
                
          ?>
      
          <?php
          
          if(isset($_POST['1'])){
              $name = $_POST['name'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '$name', '1', '', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:index.php");
              }
          }
          
          ?>
       
      </div>
	  </nav>
    <!-- END nav -->


    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_222.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Articles</h1>
          </div>
        </div>
      </div>
    </section>

		 
		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          </div>
        </div>
    		  <div class="content">

           


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                         
                         
                                 <center><h1 style="color:lightpink;">Liste des livraisons</h1></center>
                           
                            
                    </div>
                    <div class="table-responsive">
                   

                        <table  style="background-color: #FFB6C1" class="table text-start align-middle table-bordered table-hover mb-0">
                          <thead>
                                <tr class="text-dark">
                                    <th scope="col">Numlivraison</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">adresses</th>
                                    <th scope="col">DateInscription</th>
                                    <th scope="col">PersonID</th>
                                    <th scope="col">Localisation</th>
                                    <th scope="col">Annuler</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
               foreach($listelivraisons as $livraison){
            ?>
            <tr>
                <td><?php echo $livraison['Numlivraison']; ?></td>
                <td><?php echo $livraison['Nom']; ?></td>
                
                <td><?php echo $livraison['adresses']; ?></td>
        
                <td><?php echo $livraison['DateInscription']; ?></td>
                <td><?php echo $livraison['PersonID']; ?></td>
                <td>
                    <form method="POST" action="GPS/index.php">
                        <input type="submit" name="Localisation" value="Localisation">
                        <input type="hidden" value=<?PHP echo $livraison['Numlivraison']; ?> name="Numlivraison">
                    </form>
                </td>
                <td>
                    <a href="Annulerlivraison.php?Numlivraison=<?php echo $livraison['Numlivraison']; ?>">Annuler</a>
                </td>
            </tr>
            <?php
                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button><a href="index.php" class="btn btn-primary">Reclamation</a></action>  </button>
            </div>    
          <?php
                
          ?>
          
          
    			
    			
    			
    		</div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Service Client</h2>
              <p>Acheter sur Temple Glamour</p>
              <p>Méthodes de paiement</p>
              <p>Expedition & livraison</p>
              <p>Politique de retour</p><ul class="ftco-footer-social list-unstyled float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Carriers</h2>
              <ul class="list-unstyled">
                <li><a href="#">Conditions d'utilisation</a></li>
                <li><a href="#">Temple Glamour services</a></li>
                <li><a href="#">Temple Glamour Logistiques</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <ul class="list-unstyled">
                <li><a href="#">Our Spa</a></li>
                <li><a href="#">Treatments</a></li>
                <li><a href="#">articles</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+216 20 212 022</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@TempleGlamour.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}

</script>


<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

          </div>
        </div>
      </div>
    </footer>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
