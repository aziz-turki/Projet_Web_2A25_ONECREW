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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Plus Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="../../../assets/images/faces/aziz.jpg" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">aziz mansour</span>
                <span class="text-secondary icon-sm text-center">$69696969696969.00</span>
              </div>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link d-block" href="../../index.html">
              <img class="sidebar-brand-logo" src="../../../assets/images/logo.svg" alt="" />
              <img class="sidebar-brand-logomini" src="../../../assets/images/logo-mini.svg" alt="" />
              <div class="small font-weight-light pt-1">Responsive Dashboard</div>
            </a>
            <form class="d-flex align-items-center" action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control border-0" placeholder="Search" />
              </div>
            </form>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Template Pages</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/evenement/admin/demo_1/pages/tables/listeev.php">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">EVENEMENTS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:8000/evenement/admin/demo_1/pages/tables/listp.php">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">PARTICIPANTS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/icons/mdi.html">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/forms/basic_elements.html">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Forms</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/charts/chartjs.html">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/basic-table.html">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link" href="http://bootstrapdash.com/demo/plus-free/documentation/documentation.html" target="_blank">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../../assets/images/faces/aziz.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                      <p class="text-gray mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../../assets/images/faces/face6.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                      <p class="text-gray mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../../assets/images/faces/face7.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                      <p class="text-gray mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
                </div>
              </li>
              <li class="nav-item dropdown ml-3">
                <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">New order recieved</h6>
                      <p class="text-gray ellipsis mb-0"> 45 sec ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="mdi mdi-settings"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">Server limit reached</h6>
                      <p class="text-gray ellipsis mb-0"> 55 sec ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-link-variant"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">Kevin karvelle</h6>
                      <p class="text-gray ellipsis mb-0"> 11:09 PM </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-logout d-none d-md-block mr-3">
                <a class="nav-link" href="#">Status</a>
              </li>
              <li class="nav-item nav-logout d-none d-md-block">
                <button class="btn btn-sm btn-danger">Trailing</button>
              </li>
              <li class="nav-item nav-profile dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-text">English </div>
                </a>
                <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-de mr-3"></i> German </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
                </div>
              </li>
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="../../index.html">
                  <i class="mdi mdi-home-circle"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Basic Tables</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Basic tables </li>
                </ol>
              </nav>
            </div>


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <p <a class= "btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
                    </p>
                    <div class="table-responsive">
                    <?php if (isset($_GET['ajout'])&&($_GET['ajout']=='ok')){
                             print'
                             <div class="alert alert-success">
                             participant ajouté avec succès
       
                             </div>
                             ';
                    }
                    ?>
                     <?php if (isset($_GET['modif'])&&($_GET['modif']=='ok')){
                             print'
                             <div class="alert alert-success">
                             participant modifié avec succès
       
                             </div>
                             ';
                    }
                    ?>
                    <?php if (isset($_GET['delete'])&&($_GET['delete']=='ok')){
                             print'
                             <div class="alert alert-success">
                             participant supprimé avec succès
       
                             </div>
                             ';
                    }
                    ?>
                    
                    <?php if (isset($_GET['erreur'])&&($_GET['erreur']=='duplicate')){
                             print'
                             <div class="alert alert-danger">
                             Nom de participant existe deja
       
                             </div>
                             ';
                    }
                    ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                     <div class="form-group d-flex">
                        <select type="text" name="idev" class="form-control" id="exampleInputCity1" placeholder="ID" >
                        <option value="">----Choisir evenement----</option>
                        <option value="tout">----Tout----</option>
                            <?php
                              foreach ($evenements as $index => $ev )
                              print'<option value="'.$ev['idev'].'">'.$ev['nomev'].'</option>'

                            ?>
                        </select>
                        <input type="submit" class="btn btn-primary " name="btnSearch" value="Filtrer"/>
                    </div>
                 </form>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Nom participant</th>
      <th>prenom participant</th>
      <th>id evenement</th>
      <th>action</th>

   
  </tr>
  </thead>
  <tbody>
  <?php
 
      foreach($participants as $i => $p){
       
        
               print'
                       <tr>
                           
                           <td >'.$p['idp'].'</td>
                           <td>'.$p['nomp'].'</td>
                           <td>'.$p['prenomp'].'</td>
                           <td>'.$p['idev'].'</td>
                           
                          <td>
                           <a data-toggle="modal" data-target="#editModal'.$p['idp'].'" class= btn btn-success">Modifier</a>
                           <a onClick ="return popUpDeleteParticipant()" href="supprimerp.php?idp='.$p['idp'].'"class= btn btn-danger">Supprimer</a>
                           </td>
          
                      </tr>';}
  ?>

    
  </tbody>
</table>
</div>
</div>
</div>
</div>
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
<?php
foreach($participants as $participant){?>
<!-- Modal Modifier-->
<div class="modal fade" id="editModal<?php echo $participant['idp'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<form class="forms-sample" action="modifierp.php" method="post" >
<input type="hidden" value="<?php echo $participant['idp']; ?>" name="idpp"/>
<div class="form-group">
  <label for="exampleInputCity1">id de participant</label>
  <input type="text" name="idp" class="form-control" value="<?php echo $participant['idp'] ?>" id="exampleInputCity1" placeholder="ID" />
</div>
<div class="form-group" >
  <label for="exampleInputName1">Nom de participant</label>
  <input type="text" name="nomp"  class="form-control" value="<?php echo $participant['nomp'] ?>" id="exampleInputName1" placeholder="Nom" />
</div>
<div class="form-group" >
  <label for="exampleInputName1">Prenom de participant</label>
  <input type="text" name="prenomp"  class="form-control" value="<?php echo $participant['prenomp'] ?>" id="exampleInputName1" placeholder="prenom" />
</div>
<div class="form-group">
                        <label for="exampleInputCity1">ID evenement</label>
                        <input type="text" name="idev" class="form-control" value="<?php echo $participant['idev'] ?>" id="exampleInputCity1" placeholder="ID" />
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

<?php
}

?>



<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
<div class="d-sm-flex justify-content-center justify-content-sm-between">
<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../../assets/js/off-canvas.js"></script>
<script src="../../../assets/js/hoverable-collapse.js"></script>
<script src="../../../assets/js/misc.js"></script>
<script src="../../../assets/js/settings.js"></script>
<script src="../../../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
<script>
function popUpDeleteParticipant(){
return confirm("Voulez-vous vraiment supprimer ce participant ?");
}
</script>

</body>
</html>