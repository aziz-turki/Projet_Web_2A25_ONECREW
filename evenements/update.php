<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$idev =$nomev = $descriptionev = $datedebutev = $datefinev = "";
$idev_err =$nameev_err = $descriptionev_err = $datedebutev_err = $datefinev_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["idev"]) && !empty($_POST["idev"])){
    // Get hidden input value
    $id = $_POST["idev"];
    
     // Validate cin
    $input_nomev = trim($_POST["nomev"]);
    if(empty($input_nomev)){
        $nomev_err = "Please enter a noun";     
    } else{
        $nomev = $input_nomev;
    }
    // Validate description
    $input_descriptionev = trim($_POST["descriptionev"]);
    if(empty($input_descriptionev)){
        $descriptionev_err = "Please enter a description";
    } elseif(!filter_var($input_descriptionev, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $descriptionev_err = "Please enter a valid description";
    } else{
        $descriptionev = $input_descriptionev;
    }
    
    // Validate date debut
    $input_datedebutev = trim($_POST["datedebutev"]);
    if(empty($input_datedebutev)){
        $datedebutev_err = "Please enter a starting date";     
    } else{
        $datedebutev = $input_datedebutev;
    }
    
    // Validate finishing date
    $input_datefinev = trim($_POST["datefinev"]);
    if(empty($input_datefinev)){
        $datefinev_err = "Please enter finishing date";     
    } elseif(!ctype_digit($input_datefinev)){
        $datefinev_err = "Please enter a positive integer value.";
    } else{
        $datefinev = $input_datefinev;
    }
    
    // Check input errors before inserting in database
    if(empty($nomev_err) && empty($descriptionev_err) && empty($datedebutev_err) && empty($datefinev_err)){
        // Prepare an update statement
        $sql = "UPDATE evenements SET nomev=?, descriptionev=?, datedebutev=?, datefinev=? WHERE idev=?";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssi" ,$param_nomev, $param_descriptionev, $param_datedebutev, $param_datefinev, $param_idev);
            
            // Set parameters
            $param_nomev = $nomev;
            $param_descriptionev = $descriptionev;
            $param_datedebutev = $datedebutev;
            $param_datefinev = $datefinev;
            $param_idev = $idev;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: tables.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["idev"]) && !empty(trim($_GET["idev"]))){
        // Get URL parameter
        $idev =  trim($_GET["idev"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM evenement WHERE idev = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_idev);
            
            // Set parameters
            $param_idev = $idev;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nomev = $row["nomev"];
                    $descriptionev = $row["descriptionev"];
                    $datedebutev = $row["datedebutev"];
                    $datefinev = $row["datefinev"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
        
        // Close connection
        $mysqli->close();
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>nomev</label>
                            <input type="text" name="nomev" class="form-control <?php echo (!empty($cin_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nomev; ?>">
                            <span class="invalid-feedback"><?php echo $nomev_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>descriptionev</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($descriptionev_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $descriptionev; ?>">
                            <span class="invalid-feedback"><?php echo $descriptionev_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>datedebutev</label>
                            <textarea name="datedebutev" class="form-control <?php echo (!empty($datedebutev_err)) ? 'is-invalid' : ''; ?>"><?php echo $datedebutev; ?></textarea>
                            <span class="invalid-feedback"><?php echo $datedebutev_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>datefinev</label>
                            <input type="text" name="datefinev" class="form-control <?php echo (!empty($datefinev_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $datefinev; ?>">
                            <span class="invalid-feedback"><?php echo $datefinev_err;?></span>
                        </div>
                        <input type="hidden" name="idev" value="<?php echo $idev; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>

</html>