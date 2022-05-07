<! DOCTYPE html>
<html>
<head>
  <title>PDF</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/
  bootstrap.min.css" integrity="
  sha384-Gn5384xqQ1aoWXA+058RXPXPg6fy4IWVTNhOE263XmFcJ1SAwiGgFAW/dAis6JXm" crossorigin=
  "anonymous">
</head>
<body>
  <style></style>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
         <div class="col-md-6">
             <div style="background-color: white; border: 1px solid #cccccc; padding: 16px
                   ;margin-top: 40px;">
                  <center><h3>Employed Record</h3></center>
                  <table class="table table=hover">
                      <tr>
                           <th>View Online</th>
                           <th>Download</th>
                      </tr>




                      <?php
  $con=new PDO("mysql:host=localhost; dbname=make-up","root","");
  $query="SELECT*FROM livreur";
  $result=$con->prepare($query);
  $result->execute();
   if($result->rowCount())
    while($livreur=$result->fetch())
    {
      ?>
     <tr>
    <td>
        <a href="employe.php?PersonID=<?php echo $livreur['PersonID'];
             ?>">View Online</a>
    </td>
    <td>
        <a href="employe.php?PersonID=<?php echo $livreur['PersonID'];?>" download="employe.php?PersonID=<?php echo $livreur['PersonID'];?> "
              ?>Download Now</a>
    </td>
</tr>

      <?php
    }
    else {
      echo "<br><br> Data Not FOUND";
    }
?>
                     
                  </table>
             </div>
         </div>
     <div class="col-md-3"></div>
  </div>
</div>
</body>
</html>
