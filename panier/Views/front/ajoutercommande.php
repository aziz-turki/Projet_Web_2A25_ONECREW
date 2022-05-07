<?php
    require_once     '../../Model/commande.php';
    require_once     '../../Controller/commandec.php';

    $error = "";

    // create adherent
    $commande = null;

    // create an instance of the controller
    $commandec = new commandec();
    if (
        
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["telephon"]) &&
    isset($_POST["email"]) &&
		isset($_POST["adress"]) &&		
        isset($_POST["region"]) &&
		isset($_POST["ville"]) 
        
    ) {
        if (
            
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["telephon"]) && 
      !empty($_POST["email"]) && 
			!empty($_POST['adress']) &&
            !empty($_POST["region"]) && 
			!empty($_POST["ville"]) 
            
        ) {
            $commande = new commande(
               21,
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['telephon'],
        $_POST['email'],
$_POST['adress'],
        $_POST['region'], 
$_POST['ville']
            );
            $commandec->modifiercommande($commande);
            header('Location:affichercommande.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="fr">
<head>
<title>Ajouter une commande</title>
<link rel="shoet icon" href="images/lol.png">
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
	          <li class="nav-item"><a href="treatments.html" class="nav-link">Treatments</a></li>
	          <li class="nav-item"><a href="specialists.html" class="nav-link">Produit</a></li>
	          <li class="nav-item active"><a href="pricing.html" class="nav-link">commande</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
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
            <h1 class="mb-3 bread">commande</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>commande</span></p>
          </div>
        </div>
      </div>
    </section>
</head>    
    <body>
        <br>
        <button><a href="affichercommande.php">Retour a la liste des commandes</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST" class="contact-form">
            <table  align="center">
                
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" class="form-control" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">prenom:
                        </label>
                    </td>
                    <td><input class="form-control" type="text" name="prenom" id="prenom" maxlength="20"></td>
                </tr>
				        <tr>
                    <td>
                        <label for="telephon">telephon:
                        </label>
                    </td>
                    <td><input class="form-control" type="number" name="telephon" id="telephon" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email:
                        </label>
                    </td>
                    <td><input class="form-control" type="text" name="email" id="email" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adress">adress:
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="adress" id="adress" maxlength="20">
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label for="region">region:
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="region" id="region" maxlength="20">
                    </td>
                </tr>   
                <tr>
                    <td>
                        <label for="ville">ville:
                        </label>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="ville" id="ville" maxlength="20">
                    </td>
                </tr>                           
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary py-3 px-5" type="submit" value="Envoyer"> 
                        <p style="color: red;" id="erreur" ></p>
                        <script src="verif.js"></script>
                    </td>
                    
                </tr>
            </table>
        </form>
    </body>

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
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+216 20 212 022</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@TempleGlamour.com</span></a></li>
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
</html>