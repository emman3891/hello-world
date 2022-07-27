 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dead Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <style></style>
</head>

<body class="fn12 fnPoppins">
    <div class="m20">

        <table class="cw100p bsp">
            <tr>
                <td class="cw30p bgC001 bb fn18 cac p5 textUC cfw">STOCK LIST</td>
                <td class="cw70Wp car plr10">
                    <a href="create.php" class="btn btn-success"><button class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7">Add</button></a>
                    <button onclick="window.print()" class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7">Print</button>
                    <a href="partial.php"><button  class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7">Print</button></a>
                    <a href="home.php"><button class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7">Close</button></a>
                </td>
            </tr>
        </table>
        <br>
        <table class="cw100p bsp fn10">
            <tr>
                <td colspan="2" class="p5 bl bt cac">
                    <form method="post" action="search.php">
                      <h1>SEARCH </h1>
                      <input type="text" name="search" required/>
                      <input type="submit" value="Search"/> </td>
                    </form><td colspan="7" class="p5 bt cac"></td>
                <td class="p5 bt br "><input class="inputBx cw100p bn bon ht25 p5 cac" list="rec" onchange=""
                        value="" />
                    <datalist id="rec">
                        <option value="25" selected></option>
                        <option value="50"></option>
                        <option value="100"></option>
                        <option value="200"></option>
                        <option value="500"></option>
                    </datalist>
                </td>
            </tr>
            <tr>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 p5" list="salesacc" onchange=""
                        value="" />
                    <datalist id="salesacc">
                        <option value="Cash Sales"></option>
                        <option value="Cheque Sales"></option>
                        <option value="Online Sales"></option>
                        <option value="Credit Sales"></option>
                    </datalist>
                </td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 p5" list="salesacc" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="p5 bl bt cac"><input class="inputBx cw100p bn bon ht25 cac p5" type="text" onchange=""
                        value="" /></td>
                <td class="c025 p5 bl bt br cac fn14 cp">
                <button class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins"
                        name="saveupdate" type="submit" tabindex="7">Clear</button></td>
            </tr>
            
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
                <td class="cw8p bgC007 p5 cac bt bl br">Action</td>
            </tr>
    <?php
        // Include config file
        require_once "config.php";
        
        // Attempt select query execution
        
        $total_alloc= 0;
        $total_qty= 0;
        $total_bal= 0;
        
        $sql = "SELECT * FROM drugs";
        if($result = mysqli_query($link, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
             
             while($row = mysqli_fetch_array($result))
               {

                  $total_qty += $row['quantity'];
                  $total_alloc += $row['allocated'];
                  $total_bal += $row['quantity']-$row['allocated'];
            echo '<tr> 
                    <td class="p5 bl bt cac">'. $row['id'] .'</td>
                    <td class="p5 bl bt">'. $row['code'] .'</td>
                    <td class="p5 bl bt">'. $row['name'] .'</td>
                    <td class="p5 bl bt cac">'. $row['batch'] .'</td>
                    <td class="p5 bl bt cac">'. $row['expiry_date'] .'</td>
                    <td class="p5 bl bt">'. $row['branch'] .'</td>
                    <td class="p5 bl bt cac">'. $row['quantity'] .'</td>
                    <td class="p5 bl bt cac">'. $row['allocated'] .'</td>
                    <td class="p5 bl bt cac">'. $row['quantity']-$row['allocated'] .'</td>
                    <td class="c025 p5 bl bt br cac fn14 cp">
                    <a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record"  data-toggle="tooltip"><i class="fa fa-eye c011 m5" aria-hidden="true"></i></a>
                    <a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fa fa-edit c012 m5" aria-hidden="true"></i></a>
                    <a href="delete.php?id='. $row['id'] .'" class="mr-3" title="Delete Record" data-toggle="tooltip"><i class="fa fa-trash c013 m5" aria-hidden="true"></i></a>                            
                    </td>
                </tr>';             
                }                    
          echo '<tr>
                    <td colspan="6" class="cfw p5 bl bt car">TOTAL </td>
                    <td class="cfw p5 bl bt cac">'.$total_qty.'</td>
                    <td class="cfw p5 bl bt cac">'.$total_alloc.'</td>
                    <td class="cfw p5 bl bt cac">'.$total_bal.'</td>
                    <td class="cfw p5 bl bt br car"></td>
                </tr>
                <td colspan="11" class="bt"></td>
            </table>';    
         // Free result set  
           mysqli_free_result($result);
            } else
            {
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            }
        } else{
        echo "Oops! Something went wrong. Please try again later.";
        }    

        // Close connection
        mysqli_close($link);
    ?>

    </div>
</body>

</html>
