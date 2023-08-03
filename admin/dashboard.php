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
                <div class="col-md-3">
                    <div class="card" >
                        
                        <div class="card-body" style="background-color:#325D88 ; height:100px; font-size:18pt; text-align:center;color:white;">
                            <?php 
                                $query="select count(*) as total from rd_users";
                                $result=mysqli_query($conn,$query);
                                $fetch=mysqli_fetch_array($result);
                                $countrPerson=$fetch['total'];
                            ?>
                         <h3> <?php echo  $countrPerson;  ?></h3>
                            <p>Total Users</p>
                        </div>
                        <div class="card-header">
                            <a href="#">Full Details</a>
                        </div>
                    </div>
                </div>
                        <!-- Card end -->
                            <!-- Card start -->
                <div class="col-md-3">
                    <div class="card" >
                        
                        <div class="card-body" style="background-color:#29ABE0 ; height:100px; font-size:18pt; text-align:center;color:white;">
                        <?php 
                                $query="select count(*) as total from rd_people";
                                $result=mysqli_query($conn,$query);
                                $fetch=mysqli_fetch_array($result);
                                $countrPerson=$fetch['total'];
                            ?>
                        <h3> <?php echo  $countrPerson;  ?></h3>
                            <p>Total Person Registered</p>
                        </div>
                        <div class="card-header">
                        <a href="people.php">Full Details</a>
                        </div>
                    </div>
                </div>
                        <!-- Card end -->
                            <!-- Card start
                <div class="col-md-3">
                    <div class="card" >
                        
                        <div class="card-body" style="background-color:#222222 ; height:100px; font-size:18pt; text-align:center;color:white;">
                            <h3>1234</h3>
                            <p>Total Person Registered</p>
                        </div>
                        <div class="card-header">
                            Full Details
                        </div>
                    </div>
                </div>
                        <!-- Card end -->
                            <!-- Card start -->
                <!-- <div class="col-md-3">
                    <div class="card" >
                        
                        <div class="card-body" style="background-color:#D9534F ; height:100px; font-size:18pt; text-align:center;color:white;">
                            <h3>1234</h3>
                            <p>Total Person Registered</p>
                        </div>
                        <div class="card-header">
                            Full Details
                        </div>
                    </div>
                </div> -->
                        <!-- Card end -->
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
