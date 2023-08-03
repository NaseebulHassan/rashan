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
                        <h4>Registered People</h4>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" >
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Gender</th>
                                <th>CNIC#</th>
                                <th>Martial Status</th>
                                <th>Mobile #</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </thead>
                            <tbody> 
                                <?php
                                    $sqlquery="SELECT * from rd_people";
                                    $runquery=mysqli_query($conn,$sqlquery);
                                    $cnt=1;
                                    while($row = mysqli_fetch_array($runquery)){
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['fname']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['cnic']; ?></td>
                                            <td><?php echo $row['martial_status']; ?></td>
                                            <td><?php echo $row['mobile1']; ?></td>
                                            <td><?php echo $row['address1']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td><a href="" class="btn btn-primary">Edit</a></td>
                                            
                                        </tr>

                                <?php   $cnt++; }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
       
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
