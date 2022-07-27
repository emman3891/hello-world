 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dead Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        .wrapper{
            width: 1300px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="fn12 fnPoppins">
<div class="wrapper">
    <div class="m20">

        <table class="cw100p bsp">
            <tr>
                <td class="cw30p bgC001 bb fn18 cac p5 textUC cfw">STOCK LIST</td>
                <td class="cw70Wp car plr10"><button onclick="window.print()"  push="right">Print</button></tr></td>                
           </tr>
        </table>
        <br>
        <table class="cw100p bsp fn10">  
             
            
            <tr>
                <td class="cw6p bgC007 p5 cac bt bl">Item ID</td>
                <td class="cw15p bgC007 p5 bt bl">Code</td>
                <td class="cw20p bgC007 p5 bt bl">Item Name</td>
                <td class="cw7p bgC007 p5 cac bt bl">Batch</td>
                <td class="cw7p bgC007 p5 cac bt bl">Expiry Date</td>
                <td class="cw10p bgC007 p5 bt bl">Branch</td>
                <td class="cw7p bgC007 p5 cac bt bl">Qty</td>
                <td class="cw7p bgC007 p5 cac bt bl">Allocated</td>
                <td class="cw7p bgC007 p5 cac bt bl">Balance</td>
               
            </tr>
    <?php
        // Include config file
        require_once "config.php";
        
        // Attempt select query execution
        $quantity = 100 ;
        
        $sql = "SELECT * FROM drugs";
        if($result = mysqli_query($link, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
             
             while($row = mysqli_fetch_array($result))
               {
            echo "<tr> ";
                    echo  '<td class="p5 bl bt cac">'. $row['id'] .'</td>';
                    echo  '<td class="p5 bl bt">'. $row['code'] .'</td> ';
                    echo  '<td class="p5 bl bt">'. $row['name'] .'</td>';
                    echo  '<td class="p5 bl bt cac">'. $row['batch'] .'</td>';
                    echo  '<td class="p5 bl bt cac">'. $row['expiry_date'] .'</td>';
                    echo  '<td class="p5 bl bt">'. $row['branch'] .'</td>';
                    echo  '<td class="p5 bl bt cac">'. $row['quantity'] .'</td>';
                    echo  '<td class="p5 bl bt cac">'. $row['allocated'] .'</td>';
                    echo  '<td class="p5 bl bt cac">'. $row['quantity']-$row['allocated'] .'</td>';
                    
            echo "</tr> ";
            echo "<tr>";
	            }
                // Free result set  array_sum($allocated)
                           mysqli_free_result($result);
            } else
            {
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            }
        } else{
        echo "Oops! Something went wrong. Please try again later.";
        }
              	     
        $total_alloc= 0;
        $total_qty= 0;
        $total_bal= 0;
        $sql = "SELECT * FROM drugs";
        if($result = mysqli_query($link, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                while($row= mysqli_fetch_array($result))
                {
                  $total_qty += $row['quantity'];
                  $total_alloc += $row['allocated'];
                  $total_bal += $row['quantity']-$row['allocated'];
                } 
            }
        }    
                echo '<td colspan="6" class="cfw p5 bl bt car">TOTAL </td>';
                echo '<td class="cfw p5 bl bt cac">'.$total_qty.'</td>';
                echo '<td class="cfw p5 bl bt cac">'.$total_alloc.'</td>';
                echo '<td class="cfw p5 bl bt cac">'.$total_bal.'</td>';
            
            echo "</tr>";
            echo '<tr></tr>';
        echo "</table>";    
        

        
    

                    // Close connection
                    mysqli_close($link);
    ?>

    </div>
</div>
</body>

</html>