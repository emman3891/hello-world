<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$code = $name = $batch = $expiry_date = $branch = $quantity = $allocated = "";
$code_err = $name_err= $batch_err = $exp_err = $branch_err = $quantiy_err = $allocated_err = $balance_err = "";
 
// Processing form data when form is submitted
if(isset($_POST['updatedata']) && !empty($_POST['update_id'])){
    // Get hidden input value
    $id = $_POST['update_id'];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate PRODUCT CODE
    $input_code = trim($_POST["code"]);
    if(empty($input_code)){
        $code_err = "Please enter a PRODUCT CODE.";     
    } else{
        $code = $input_code;
    }
    
    // Validate EXPIRY DATE
    $input_exp = trim($_POST["expiry_date"]);
    if(empty($input_exp)){
        $exp_err = "Please enter the expiry_date.";     
    } elseif(!ctype_digit($input_exp)){
        $exp_err= "Please enter a valid date.";
    } else{
        $expiry_date = $input_exp;
    }
    //accepting input remained without VALIDATION

     $batch = trim($_POST["batch"]);
     $quantity = trim($_POST["quantity"]);
     $allocated = trim($_POST["allocated"]);
     $branch = trim($_POST["branch"]);
     $expiry_date = trim($_POST["expiry_date"]);
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($code_err) && empty($batch_err)){
        // Prepare an update statement
        $sql = "UPDATE drugs SET name = ?, code = ?, batch = ?, expiry_date = ?, branch=?, quantity=?, allocated=? WHERE id = ?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_code, $param_batch, $param_exp, $param_branch, $param_quantity, $param_alloc, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_code = $code;
            $param_batch = $batch;
            $param_exp = $expiry_date;
            $param_branch = $branch;
            $param_quantity = $quantity;
            $param_alloc = $allocated;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM drugs WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $code = $row["code"];
                    $quantity = $row["quantity"];
                    $batch = $row["batch"];
                    $branch = $row["branch"];
                    $allocated = $row["allocated"];
                    $expiry_date = $row["expiry_date"];
                   
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
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

