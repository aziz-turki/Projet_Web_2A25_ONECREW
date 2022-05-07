<?php
require_once     '../../Controller/panierlineC.php';

//$id_utilisateur=2;

//$id_panier = $_SESSION['id_panier'];
$id_panier = 1;
$PanierlineC = new panierlineC();
$panierS = $PanierlineC->afficherpanier($id_panier);
$subTotale = 0;
?>
<html lang="fr">

<head>
  <title>Panier</title>
  <link rel="shoet icon" href="images/lol.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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


        <!------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------------------------->
<?php
if (isset($_POST['coupon'])) {
    $coupon = $PanierlineC->recupererCoupon($_POST['coupon']);
    if (isset($coupon['value'])) {
        $couponValue=$coupon['value'];
    } else {
    ?>
    <script>
    alert('coupon invalide');
    </script>
    <?php
}
} 
    ?>

    
        <!------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
    <div class="container">
      <img src="images/lol.png" alt="image" height="55" width="120">
      <a class="navbar-brand" href="index.html">
        <!--<span class="flaticon-lotus">--></span>Temple Glamour
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="treatments.html" class="nav-link">Treatments</a></li>
          <li class="nav-item"><a href="specialists.html" class="nav-link">Produit</a></li>
          <li class="nav-item active"><a href="pricing.html" class="nav-link">Panier</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>

        <!------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------------------------->
        <div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <!------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------------------------->      
</div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_222.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-3 bread">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Produit</h1>
        </div>
      </div>
    </div>
  </section>
  </head>
  <br>
  <br>

  <body>
    <!-- Cart view section -->
    <section id="cart-view">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="cart-view-area">
              <div class="cart-view-table">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Supprimer</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?PHP
                      $total = 0;
                      foreach ($panierS as $row) {

                        $somme = $row['prix'] * $row['nbr'];
                        $total = $total + $somme;
                        $product = $PanierlineC->getarticlebyNom($row['nom_produit']);

                        //$prix = $panier['prix']; 
                        //$Qte = $panier['quantite'];
                        $tot = $somme;
                        $subTotale += $tot;

                      ?>
                        <tr>


                          <input type="hidden" value="<?PHP echo $row['id_panier']; ?>" name="id_panier">

                          <td><a class="aa-cart-title"><a class="aa-product-img" href="#"><img src="<?php echo $product['image'] ?>" alt="image" height="80" width="80"></a></a></td>
                          <td><a class="aa-cart-title"><?php echo $row['nom_produit'] ?></a></td>
                          <td><?php echo $row['prix'] ?></td>
                          <form action="editQuantity.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                            <td><input class="aa-cart-quantity" name="nbr" type="number" data-id="<?php echo $row['id']  ?>"  value="<?php echo $row['nbr']; ?>" min='1' max='5'></td>
                          </form>
                          <td><?php echo $somme ?></td>
                          <td>
                            <a href="supprimerpanier.php?prix=<?php echo $row['id']; ?>">&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../res/supp.png" witdh='25px' height='25px'></a>
                          </td>

                          <td>
                        </tr>

                      <?php  } ?>


                    </tbody>
                  </table>
                  <div class="cart-body">
                                                    <div class="row">
                                                        <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                                            <div class="order-note">
                                                                <form method="POST">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <input type="search" class="form-control" name="coupon" placeholder="Coupon Code" aria-label="Search" aria-describedby="button-addonTags">
                                                                            <div class="input-group-append">
                                                                                <button class="input-group-text" type="submit" id="button-addonTags">Apply</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                                            <div class="order-total table-responsive ">
                                                                <table class="table table-borderless text-right">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Sub Total :</td>
                                                                            <td><?php echo $subTotale; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Shipping :</td>
                                                                            <td>$0.00</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <?php
                                                                            //$subTotale=100;
                                                                            $tax = $subTotale/100*18;
                                                                            ?>
                                                                            <td>Tax(18%) :</td>
                                                                            <td>$<?php echo $tax; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="f-w-7 font-18">
                                                                                <h4>Amount :</h4>
                                                                            </td>
                                                                            <td class="f-w-7 font-18">
                                                                                <?php
                                                                                //$subTotale=10;
                                                                                $prixFinale = $subTotale+$tax;
                                                                                    if (isset($couponValue)) {
                                                                                    $prixOriginale = $subTotale+$tax;
                                                                                    $prixFinale = $prixOriginale - ($prixOriginale * $couponValue / 100);?>
                                                                                    <h4><?php  echo $prixFinale; ?></h4> <h6><strike><?php  echo $prixOriginale; ?></strike></h6>
                                                                                <?php    } else { ?>
                                                                                <h4>$<?php  echo $subTotale+$tax; ?></h4>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
  
                                              </body>
                                              <div class="cart-footer text-right">
                                                    <a href="ajoutercommande.php" class="btn btn-success my-1">Proceed to Checkout<i class="ri-arrow-right-line ml-2"></i></a>
                                                </div>
  <br>
  <br>
  <br>


  <footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Service Client</h2>
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

        </div>
      </div>
    </div>
  </footer>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
    $(".aa-cart-quantity").on('change', function postinput(){
        var nbr = $(this).val(); // this.value
        var id = $(this).data();
        $.ajax({ 
            url: 'editQuantity.php',
            data: { nbr: nbr , id:id },
            type: 'post'
        }).done(function(responseData) {
            console.log('Done: ', responseData);
            window.location.reload();

        }).fail(function() {
            console.log('Failed');
        });
    });
}); 
  </script>
  <!--
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
  function addDarkmodeWidget() {
    new Darkmode().showWidget();
  }
  window.addEventListener('load', addDarkmodeWidget);
  </script> -->
</html>