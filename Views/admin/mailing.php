<!doctype html>
<html lang="en">
 




<?PHP
include "../../Model/reclamation.php";

include "../../Controller/reclamationc.php";





?>



                   <form method="POST" action="">
                       
                     <div class="email-head">
                        <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
                    </div>



                    <div class="email-compose-fields">
                        <div class="to">
                            <div class="form-group row pt-0">
                                <label class="col-md-1 control-label">To:</label>
                                <div class="col-md-11">
                                   <input class="form-control" type="text" name="email" value="<?php echo $email;   ?>">
                                   <input type="hidden" name="email" value="<?php echo $email;   ?>">
                                </div>
                            </div>
                        </div>
                        



                        <div class="subject">
                            <div class="form-group row pt-2">
                                <label class="col-md-1 control-label">Subject</label>
                                <div class="col-md-11">
                                    <input class="form-control" type="text" name="sujet">
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="email editor">
                        <div class="col-md-12 p-0">
                            <div class="form-group">
                                <label class="control-label sr-only" for="summernote">Descriptions </label>
                                <textarea class="form-control" id="summernote" name="reponse" rows="6" placeholder="Write Descriptions"></textarea>
                            </div>
                        </div>



                        <div class="email action-send">
                            <div class="col-md-12 ">
                                <div class="form-group">

<input type="submit" name="envoyer" class="btn btn-primary" onsubmit=" return clicked();">
  <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id" >
   

                                    

                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                   </form> 

                                    <button class="btn btn-secondary btn-space" type="button"><i class="icon s7-close"></i> Cancel</button>







            </div>



<?php


include "../../model/mailing.php";
include "../../Controller/mailingc.php";


if (isset($_POST['envoyer']))
{


$m1=new mailing($_POST['id'],$_POST['sujet'],$_POST['reponse'],$_POST['email']);
$m1c=new mailingc();
$m1c->ajouteremail($m1);

header('Location: mailing.php');

echo "done";


    




$header ="MIME-version: 1.0\r\n"; 

$header.='From : PrimFX.com"<support@primfix.com>'."\n"; 

$header.='Content-Type:text/html; charset="uft-8"'."\n"; 

$header.='Content-Transfer-Encoding: 8bit'; 


$message=$_POST['reponse'];



 mail($_POST['email'],$_POST['sujet'], $message, $header); 

}  
else

{echo "eee";}

?>

<script>
    function clicked(e) {
         return confirm('clicked');
    }


</script>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/select2/js/select2.min.js"></script>
    <script src="assets/vendor/summernote/js/summernote-bs4.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({ tags: true });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300

        });
    });
    </script>
</body>
 
</html>