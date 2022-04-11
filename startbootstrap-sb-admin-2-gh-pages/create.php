<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$cin =$name = $address = $tel = "";
$cin_err =$name_err = $address_err = $tel_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
       // Validate address
    $input_cin = trim($_POST["cin"]);
    if(empty($input_cin)){
        $cin_err = "Please enter an address.";     
    } else{
        $cin = $input_cin;
    }
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate tel
    $input_tel = trim($_POST["tel"]);
    if(empty($input_tel)){
        $tel_err = "Please enter the tel amount.";     
    } elseif(!ctype_digit($input_tel)){
        $tel_err = "Please enter a positive integer value.";
    } else{
        $tel = $input_tel;
    }
    
    // Check input errors before inserting in database
    if(empty($cin_err) &&empty($name_err) && empty($address_err) && empty($tel_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (cin,name, address, tel) VALUES (?,?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss",$param_cin, $param_name, $param_address, $param_tel);
            
            // Set parameters
            $param_cin = $cin;
            $param_name = $name;
            $param_address = $address;
            $param_tel = $tel;
            
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
                            <label>CIN</label>
                            <input type="text" name="cin" class="form-control <?php echo (!empty($cin_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cin; ?>">
                            <span class="invalid-feedback"><?php echo $cin_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                                 <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>tel</label>
                            <input type="text" name="tel" class="form-control <?php echo (!empty($tel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tel; ?>">
                            <span class="invalid-feedback"><?php echo $tel_err;?></span>
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