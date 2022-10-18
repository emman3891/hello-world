<?php
// Check existence of id parameter before processing further
 if(isset($_POST["drug_id"]) && !empty(trim($_POST["drug_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM drugs WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["drug_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value(UNNECESARILY)
                $name = $row["name"];
                $code = $row["code"];
                $quantity = $row["quantity"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  
                    <div class="form-group">
                        <label>CODE</label>
                        <p><b><?php echo $row["code"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>NAME</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>EXPIRY DATE</label>
                        <p><b><?php echo $row["expiry_date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>BRANCH</label>
                        <p><b><?php echo $row["branch"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>QUANTITY </label>
                        <p><b><?php echo $row["quantity"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>QUANTITY ALLOCATED</label>
                        <p><b><?php echo $row["allocated"]; ?></b></p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>