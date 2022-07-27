<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$code = $name = $batch = $expiry_date = $branch = $quantity = $allocated = $balance = "";
$code_err = $name_err= $batch_err = $exp_err = $branch_err = $quantiy_err = $allocated_err = $balance_err = "";
 
//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Validate product name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    }else{
        $name = $input_name;
    }

     // Validate code
    $input_code = trim($_POST["code"]);
    if(empty($input_code)){
        $code_err = "Please enter product code.";
    } elseif(!filter_var($input_code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $code_err = "Please enter a valid code.";
    } else{
        $code = $input_code;
    }
     // Validate batch
    $input_batch= trim($_POST["batch"]);
    if(empty($input_batch)){
        $batch_err = "Please enter the batch number.";     
    } elseif(!ctype_digit($input_batch)){
        $batch_err = "Please enter a valid batch value.";
    } else{
        $batch = $input_batch;
    }
    
    // Validate expiration
    $input_exp = trim($_POST["expiry_date"]);
    if(empty($input_exp)){
        $exp_err = "Please enter aa expiry date.";     
    } else{
        $expiry_date = $input_exp;
    }
    
    // Validate branch name
    $input_branch = trim($_POST["branch"]);
    if(empty($input_branch)){
        $branch_err = "Please enter the branch entry.";     
    } else{
        $branch = $input_branch;
    }

// BLOCK ADDED FOR TESTING 

     // Validate quantity
    $input_quantity = trim($_POST["quantity"]);
    if(empty($input_quantity)){
        $quantiy_err = "Please enter a quantity.";
    } else{
        $quantity = $input_quantity;
    }
    
    // Validate quantity allocated
    $input_allocated = trim($_POST["allocated"]);
    if(empty($input_allocated)){
        $allocated_err = "Please enter an allocated quantity.";     
    } else{
        $allocated = $input_allocated;
    }

    /* Validate quantity remained
    $input_balance = trim($_POST["balance"]);
    if(empty($input_balance)){
        $balance_err = "Please enter remained amount.";
    }  else{
        $balance = $input_balance;
    }
    
    

// BLOCK ENDS HERE*/
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO drugs (code, name, batch, expiry_date, branch, quantity, allocated) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_code, $param_name, $param_batch, $param_exp, $param_branch, $param_qty, $param_alloc);
            
            // Set parameters
            $param_code = $code;
            $param_name = $name;
            $param_batch = $batch;
            $param_exp = $expiry_date;
            $param_branch = $branch;
            $param_qty = $quantity;
            $param_alloc = $allocated;
        
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Pharmacy Record</h2>
                    <p>Please fill this form and submit to add drug record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>code</label>
                            <textarea name="code" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>"><?php echo $code; ?></textarea>
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>batch</label>
                            <input type="text" name="batch" class="form-control <?php echo (!empty($batch_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $batch; ?>">
                            <span class="invalid-feedback"><?php echo $batch_err;?></span>
                        </div>
            



                        <div class="form-group">
                            <label>Expiry date</label>
                            <input type="text" name="expiry_date" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $expiry_date; ?>">
                            <span class="invalid-feedback"><?php echo $expiry_date;?></span>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <textarea name="branch" class="form-control <?php echo (!empty($branch_err)) ? 'is-invalid' : ''; ?>"><?php echo $branch; ?></textarea>
                            <span class="invalid-feedback"><?php echo $branch_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" class="form-control <?php echo (!empty($quantiy_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
                            <span class="invalid-feedback"><?php echo $quantiy_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Quantity Allocated</label>
                            <input type="text" name="allocated" class="form-control <?php echo (!empty($allocated_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $allocated; ?>">
                            <span class="invalid-feedback"><?php echo $allocated_err;?></span>
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