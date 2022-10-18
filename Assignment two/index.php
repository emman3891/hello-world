 <!--Bootstrap and jQuery Library-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<!--Bootstrap Modal Popup -->
<!-- Trigger the modal with a button -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dead Stock</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    
</head>

<body class="fn12 fnPoppins">
    <div class="wrapper">
    <div class="m20 ">

        <table class="cw100p bsp">
            <tr>
                <td class="cw30p bgC001 bb fn18 cac p5 textUC cfw">STOCK LIST</td>
                <td class="cw70Wp car plr10">                   
                    <button  class="adBtn bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7" data-toggle="modal" data-target="#adModal">Add</button>
                    <button onclick="window.print()" class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7">Print</button>
                    <a href="home.php"><button class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" name="saveupdate" type="submit"
                        tabindex="7">Close</button></a>
                </td>
            </tr>
        </table>
        <br>
        <table class="cw100p bsp fn10" >
            <tr>
                <td colspan="2" class="p5 bl bt cac">
                    <form method="post" action="index.php">
                      <h1>SEARCH </h1>
                      <input type="text" name="search" required/>
                      <input type="submit" class="bgC001 bn br5 ht25 plr10 p5 fn10 fnPoppins" value="Search"/> </td>
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
        
        if (isset($_POST["search"])) {
        $name = $_POST['search'] ;
        $branch = $_POST['search'] ;
        $sql = "SELECT * FROM `drugs` WHERE `name` LIKE '%".$name."%'  OR `branch` LIKE '%".$branch."%' ";
        } else{

        $sql = "SELECT * FROM drugs";
        }
        if($result = mysqli_query($link, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
             
             while($row = mysqli_fetch_array($result))
               {
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
                    <td class="c025 p5 bl bt br cac fn14 cp" >
                    <a href="index.php " class="mr-3 viewBtn" title="View Record"  id="'.$row['id'].'" data-toggle="modal"><i class="fa fa-eye c011 m5" aria-hidden="true"></i></a>
                    <a href="index.php" class="mr-3 upBtn" title="Update Record" data-toggle="modal"><i class="fa fa-edit c012 m5" aria-hidden="true"></i></a>
                    <a href="index.php" class="mr-3 delBtn" title="Delete Record" data-toggle="modal"><i class="fa fa-trash c013 m5" aria-hidden="true"></i></a>                            
                    </td>
                </tr> 
            <tr>';
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
              echo '<td colspan="6" class="cfw p5 bl bt car">TOTAL </td>
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

    </div>
    </div>
</body>

</html>

<!-- Dynamic Bootstrap Modal with External URL-->


<!-- addModal -->
<div class="modal fade" id="adModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Create Pharmacy Record</h2>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >
                            ×</span></button>
                
            </div><h6>
            <div class="modal-body">

            </div></h6>
            <div class="modal-footer">
                
            </div>
        </div>
      
    </div>
</div>

<!--view Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">View Single Item Record</h2>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >
                            ×</span></button>
                
            </div><h6>
            <div class="modal-body" id="drug_detail">

            </div></h6>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
</div>

<!-- update Modal -->
<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Update A Single Record</h2>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >
                            ×</span></button>
                
            </div>

            <form action="update.php" method="post">
                <h6>
            <div class="modal-body">
        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">                   
                    
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label>Name</label>
                             <input type="text" name="name" id="name" class="form-control" placeholder="Enter drug Name">                           
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Enter drug code">                           
                        </div>
                        <div class="form-group">
                            <label>Batch</label>
                            <input type="text" name="batch" id="batch" class="form-control" placeholder="Enter drug batch">                        
                        </div>
                        <div class="form-group">
                            <label>Expiry_Date</label>
                            <input type="text" name="expiry_date" id="expiry_date" class="form-control" placeholder="Enter expiry_date">                           
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <input type="text" name="branch" id="branch" class="form-control" placeholder="Enter Branch Name">                           
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter drug quantity">                           
                        </div>
                        <div class="form-group">
                            <label>Allocated Quantity</label>
                            <input type="text" name="allocated" id="allocated" class="form-control" placeholder="Enter allocated Quantity">
                          
                        </div>                    
                   
                </div>
            </div>        
        </div>
    </div>

            </div></h6>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
           </form>
        </div>
      
    </div>
</div>

<!-- deleteModal -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Delete Single Item Record</h2>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" color="red">
                            ×</span></button>
                
            </div>
          <form action="delete.php " method="post"> 
            <h6>
            <div class="modal-body">
                <h2 class="mt-5 mb-3">Confirmation </h2>
                    
                        <div >
                            <input type="hidden" name="delete_id" id="delete_id">
                            <p><h5>Are you sure you want to delete the record?</h5></p>
                            <p>
                             
                                
                            </p>
                        </div>
               
           
            </div></h6>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                  <button type="submit" name="deletedata" class="btn btn-danger"> Yes Proceed </button>
            </div>
          </form>
        </div>
      
    </div>
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>  
    $(document).ready(function(){  
          $('.viewBtn').click(function(){  
               var drug_id = $(this).attr("id");  
               $.ajax({  
                    url:"read.php",  
                    method:"post",  
                    data:{drug_id:drug_id},  
                    success:function(data){  
                         $('#drug_detail').html(data);  
                         $('#viewModal').modal("show");  
                    }  
               });  
          });  
     });  
 </script>

<script>
        $(document).ready(function () {

            $('.upBtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#code').val(data[1]);
                $('#name').val(data[2]);
                $('#batch').val(data[3]);
                $('#expiry_date').val(data[4]);
                $('#branch').val(data[5]);
                $('#quantity').val(data[6]);
                $('#allocated').val(data[7]);
            });
        });
</script>

<script>
        $(document).ready(function () {

            $('.delBtn').on('click', function () {

                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

<script>
$('.adBtn').on('click',function(){
    $('.modal-body').load('create.php',function(){
        $('#adModal').modal({show:true});
    });
});
</script>