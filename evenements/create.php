<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nomev = $descriptionev = $datedebutev = $datefinev = "";
$nameev_err = $descriptionev_err = $datedebutev_err = $datefinev_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
       
    
    // Validate name
    $input_nomev = trim($_POST["nomev"]);
    if(empty($input_nomev)){
        $nomev_err = "Please enter a name.";
    } elseif(!filter_var($input_nomev, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nomev_err = "Please enter a valid name.";
    } else{
        $nomev = $input_nomev;
    }
    
    // Validate description
    $input_descriptionev = trim($_POST["descriptionev"]);
    if(empty($input_descriptionev)){
        $descriptionev_err = "Please enter a description.";     
    } else{
        $descriptionev = $input_descriptionev;
    }
    
    // Validate datedebut
    $input_datedebutev = trim($_POST["datedebutev"]);
    if(empty($input_datedebutev)){
        $datedebutev_err = "Please enter the start date";     
    } elseif(!ctype_digit($input_datedebutev)){
        $datedebutev_err = "Please enter a positive integer value.";
    } else{
        $datedebutev = $input_datedebutev;
    }
    // Validate datefin
    $input_datefinev = trim($_POST["datefinev"]);
    if(empty($input_datefinev)){
        $datefinev_err = "Please enter the finishing date";     
    } elseif(!ctype_digit($input_datefinev)){
        $datefinev_err = "Please enter a positive integer value.";
    } else{
        $datefinev = $input_datefinev;
    }
    
    
    // Check input errors before inserting in database
    if( empty($nomev_err) && empty($descriptionev_err) && empty($datedebutev_err)&& empty($datefinev_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO evenements (nomev, descriptionev, datedebutev, datefinev) VALUES (?,?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_nomev, $param_descriptionev, $param_datedebutev, $param_datefinev);
            
            // Set parameters
            
            $param_nomev = $nomev;
            $param_descriptionev = $descriptionev;
            $param_datedebutev = $datedebutev;
            $param_datefinev = $datefinev;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
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
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="nomev" class="form-control <?php echo (!empty($nomev_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nomev; ?>">
                            <span class="invalid-feedback"><?php echo $nomev_err;?></span>
                        </div>
                                 <div class="form-group">
                            <label>Description</label>
                            <textarea name="descriptionev" class="form-control <?php echo (!empty($descriptionev_err)) ? 'is-invalid' : ''; ?>"><?php echo $descriptionev; ?></textarea>
                            <span class="invalid-feedback"><?php echo $descriptionev_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date Debut</label>
                            <input type="text" name="datedebutev" class="form-control <?php echo (!empty($datedebutev_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $datedebutev; ?>">
                            <span class="invalid-feedback"><?php echo $datedebutev_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date Fin</label>
                            <input type="text" name="datefinev" class="form-control <?php echo (!empty($datefinev_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $datefinev; ?>">
                            <span class="invalid-feedback"><?php echo $datefinev_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>