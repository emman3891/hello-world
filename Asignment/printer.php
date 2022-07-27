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
<body>
<?php
        // Include config file
        require_once "config.php";
        
        // Attempt select query execution
        $html= "";
        $htm="";
        $sql = "SELECT * FROM drugs";
        if($result = mysqli_query($link, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
             
             while($row = mysqli_fetch_array($result))
               {
                $html.='
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
                        <body>
                        <tr>     
                            <td class="p5 bl bt cac">'. $row['id'] .'</td>
                            <td class="p5 bl bt">'. $row['code'] .'</td> 
                            <td class="p5 bl bt">'. $row['name'] .'</td>
                            <td class="p5 bl bt cac">'. $row['batch'] .'</td>
                            <td class="p5 bl bt cac">'. $row['expiry_date'] .'</td>
                            <td class="p5 bl bt">'. $row['branch'] .'</td>
                            <td class="p5 bl bt cac">'. $row['quantity'] .'</td>
                            <td class="p5 bl bt cac">'. $row['allocated'] .'</td>
                            <td class="p5 bl bt cac">'. $row['quantity']-$row['allocated'] .'</td>
                        </tr>';
            
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
           $htm.='<tr>
                      <td colspan="6" class="cfw p5 bl bt car">TOTAL </td>
                      <td class="cfw p5 bl bt cac">'.$total_qty.'</td>
                      <td class="cfw p5 bl bt cac">'.$total_alloc.'</td>
                      <td class="cfw p5 bl bt cac">'.$total_bal.'</td>
                      <td class="cfw p5 bl bt br car"></td>
                  </tr>
                  <td colspan="11" class="bt"></td>
              </table>';    
        


    

                    // Close connection
                    mysqli_close($link);
    ?>

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>





<div id="divToPrint" style="">
  <div style="width:200px;height:300px;background-color:teal;"> 

           <?php echo $html; ?>
           <?php echo $htm; ?>      
  </div>
</div>
<div>
  <input type="button" value="print" onclick="PrintDiv();" />
</div>
</body>
</html>
Share
Follow
answered Sep 30, 201