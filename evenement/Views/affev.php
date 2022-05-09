<?php
include"inc/functions.php";
$evenements=getAllEvenements();
$participants=getAllParticipants();
if (isset($_POST['btnSearch'])){
  //echo $_POST['idcat'];
  //exit;
if ($_POST['idev']=="tout"){
  $participants=getAllParticipants();
}
else
{
  $participants=getParticipantsbyIdev($participants,$_POST['idev']);
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Temple Glamour</title>
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

    
    <!--<link rel="stylesheet" href="css/flaticon.css">-->
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
        <img src="images/lol.png" alt="image" height="55" width="120" >
	      <a class="navbar-brand" href="index.html"><span class="flaticon-lotus"></span>Temple Glamour</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="treatments.html" class="nav-link">Client</a></li>
	          <li class="nav-item"><a href="specialists.html" class="nav-link">Article</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Commande</a></li>
            <li class="nav-item"><a href="pricing.html" class="nav-link">Livraison</a></li>
	          <li class="nav-item active"><a href="blog.html" class="nav-link">Evenement</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Login</a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_222.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-3 bread">événement</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html"> <span>Events</span></p>
          </div>
        </div>
      </div>
    </section>
    <?php if (isset($_GET['ajout'])&&($_GET['ajout']=='ok')){
                             print'
                             <div class="alert alert-success">
                             Felicitations vous avez garanti votre place !
       
                             </div>
                             ';
                    }
                    ?>
    <section class="ftco-section bg-light">
        
          <?php
                 foreach($evenements as $evenement ){ 
                
         print'

         <div class="container">
         <div class="row d-flex">
           
            <div class="col-md d-flex ftco-animate">

              <img src="images/'.$evenement['image'].' "class="card-img-top"   height="400" width="150">
          	   <div class="blog-entry justify-content-end">


               <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-5 mb-4">
              		 <div class="one">
              			<span class="yr">'.$evenement['datedebutev'].'</span>
              		 </div>

              	</div>
                <h3 class="heading mt-2"><a href="#">'.$evenement['nomev'].'</a></h3>
                <p>'.$evenement['descriptionev'].'</p>
              </div>
              <a class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal">Participer</a>
            </div>
            </div>
            </div>  
          </div>'
           
          
          ;
}
          
          ?>
                 </div>
      </div>
    

          
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Service Client</h2>
              <p>Service Client</p>
              <p>Acheter sur Temple Glamour</p>
              <p>Méthodes de paiement</p>
              <p>Expedition & livraison</p>
              <p>Politique de retour</p>
              <ul class="ftco-footer-social list-unstyled float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">A Propos</h2>
              <ul class="list-unstyled">
                <li><a href="#">Carriers</a></li>
                <li><a href="#">Conditions d'utilisation</a></li>
                <li><a href="#">Temple Glamour services</a></li>
                <li><a href="#">Temple Glamour Logistiques</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="#">About</a></li>
                <li><a href="#">Our Spa</a></li>
                <li><a href="#">Treatments</a></li>
                <li><a href="#">Specialists</a></li>
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
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p class="mb-0">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>
                document.write(new Date().getFullYear());

              </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  
<!-- Modal Ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Basic form elements</h4>
<p class="card-description">Basic form elements</p>
<form class="forms-sample" action="ajouterp.php" method="post" >

</p>


<div class="form-group" >
  <label for="exampleInputName1">id de participant </label>
  <input type="text" name="idp" class="form-control" id="exampleInputName1" placeholder="ID" />
</div>

<div class="form-group" >
  <label for="exampleInputName1">Nom de participant </label>
  <input type="text" name="nomp" class="form-control" id="exampleInputName1" placeholder="Nom" />
</div>

<div class="form-group" >
  <label for="exampleInputName1">prenom de participant </label>
  <input type="text" name="prenomp" class="form-control" id="exampleInputName1" placeholder="Prenom" />
</div>

<div class="form-group">
                        <label for="exampleInputCity1">ID d'evenement</label>
                        <select type="text" name="idev" class="form-control" id="exampleInputCity1" placeholder="ID" >
                            <?php
                              foreach ($evenements as $index => $ev )
                              print'<option value="'.$ev['idev'].'">'.$ev['nomev'].'</option>'

                            ?>
                        </select>
                      </div>

<button type="submit" class="btn btn-primary mr-2"> Submit </button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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