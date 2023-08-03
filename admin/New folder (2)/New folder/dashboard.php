
<?php 
error_reporting(0);
session_start();
include('../dbconnection.php');
if(!isset($_SESSION['email'])){
  header('location: ../index.php');
 }


?>

<!DOCTYPE html>


<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="assets/" data-template="vertical-menu-template-semi-dark">

  
<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template-semi-dark/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2022 19:18:48 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Rashan Donation </title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <?php include('../cssstyles.php'); ?>
<style>
        h5{
            background-color: green;color:white; height:50px; padding:15px;
        }
    </style>
</head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    <?php 
      include('sidebar.php')
    ?>

    <!-- Layout container -->
    <div class="layout-page">
    <?php 
    include('navbar.php')
    ?>
<!-- Navbar -->
      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">    
          <h5 class="mb-4">Registered People</h5>      
            <table id="example" class="display table table-responsive table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>CNIC</th>
                  <th>Gender</th>
                  <th>Mobile</th>
                  <th>Package</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
                  <?php
                  $sqlquery="SELECT * from v_person_package";
                  $runquery=mysqli_query($conn,$sqlquery);
                    $counter=1;
                  while($row=mysqli_fetch_array($runquery)){
                        
                      ?>
                       <tr>
                      <td><?php echo $counter;  ?></td>
                      <td><?php echo $row['name'];  ?></td>
                     
                      <td><?php echo $row['cnic'];  ?></td>
                      <td><?php echo $row['gender'];  ?></td>
                   
                      <td><?php echo $row['mobile1'];  ?></td>
                      <td><?php echo $row['1'].' '.$row['2'].' '.$row['3'].' '.$row['4'].' '.$row['5'];  ?></td>
                      <td><a href="biomatric.php?id=<?php echo $row['id']; ?>" class="btn btn-dark"><?= __('Biomatric')?></a></td>
                      </tr>
                    <?php
                    $counter++;
                  }
                  ?>
              
              </tbody>
            </table>

            
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php include('footer.php'); ?>          
          <!-- / Footer -->
        
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
  </div>
  <!-- / Layout wrapper -->

  
  

  
<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<?php include('../jsscripts.php'); ?>
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template-semi-dark/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2022 19:19:45 GMT -->
</html>
