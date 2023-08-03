<?php  
    error_reporting(0);
    session_start();
    include('dbconnection.php');
    $email=$_SESSION['email'];
    if(!isset($_SESSION['email'])){
     header('location: index.php');
    }
    include('lang.php');
    $query="select * from rd_users where email='$email'";
    $result=mysqli_query($conn,$query);
    $fetch=mysqli_fetch_array($result);
    //$username="";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rashan Donation</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
        


    </head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <?php include('sidebar.php'); ?>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <?php include('navbar.php'); ?>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="row" style="margin-top: 50px;">
                    <!-- Card start -->
                <div class="card">
                    <div class="card-header" style="background-color: green; color:aliceblue">
                    <h4>Current Inventory</h4>
                       
                    </div>
                   
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-10">
                          
                            </div>
                            <div class="col-md-2">
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Add Inventory
                                </button>
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-bordered" >
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                
                            </thead>
                            <tbody> 
                                <?php
                                    $sqlquery="SELECT * from rd_inventory";
                                    $runquery=mysqli_query($conn,$sqlquery);
                                    while($row = mysqli_fetch_array($runquery)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['pid']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            
                                        </tr>

                                <?php    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="addinventory.php" method="post">
            <div class="form-group">
                <label for="">Title</label>
                <select name="title"  id="title" class="form-control" required>
                  
                    <option value="Flour 20kg">Flour 20Kg</option>
                    <option value="Ghee 5Kg">Ghee 5Kg</option>
                    <option value="Suger 5Kg">Suger 5Kg</option>
                    <option value="Cash 1000Rs">Cash 1000Rs</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="desc" id="desc" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="" required>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  class="btn btn-primary addinv">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/scripts.js"></script>
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.addinv', function(e){
                e.preventDefault();
                
                   var  title=$('#title').val();
                    var quantity= $('#quantity').val();
                   var desc = $('#desc').val();
                 
                //alert(pkgtitle);
                console.log(title);
                console.log(quantity);
                console.log(desc);
                $.ajax({
                    type:"POST",
                    url:"addinventory.php",
                    
                    data:{Title: title, Quantity: quantity, Desc: desc},
                    // console.log(data),
                    success: function(data){
                    

                        location.reload();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

        $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
</script>
</body>
</html>
