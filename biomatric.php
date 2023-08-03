
<?php 
session_start();
include('dbconnection.php');
if(!isset($_SESSION['email'])){
    header('location: index.php');
   }

$donationid=$_GET['id'];

$email=$_SESSION['email'];
//exit($email);
 $sql="select * from rd_users where email='$email'";
 $result=mysqli_query($conn,$sql);
 $fetch=mysqli_fetch_array($result);
 //$fetchrow=mysqli_num_rows($result);
 
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
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />  
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!-- <script src="assets/vendor/js/template-customizer.js"></script> -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <style>
        h5{
            background-color: green;color:white; height:50px; padding:15px;
        }
        input[type=checkbox] {
            margin: 4px 0 0;
            line-height: normal;
            width: 20px;
            height: 20px;
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
          <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                        <h2 class="card-title mb-sm-0 me-2">Rashan Donation Form</h2>
                        <div class="action-btns">
                        
                        </div>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <!-- 1. Delivery Address -->
                            <h5 class="mb-4">Biomatric Details</h5>
                            <?php
                                
                                $customerquery="SELECT * from rd_people where id=$donationid";
                                $runcustquery=mysqli_query($conn,$customerquery);
                                $getdata=mysqli_fetch_array($runcustquery);
                                ?>  
                            <div class="row ">
                            
                           
                            <input type="hidden" name="userid" value='<?php echo $fetch['uid'];  ?>' >
                            <input type="hidden" name="custid" value='<?php echo $getdata['id'];  ?>' >
                            <div class="col-md-6">
                                <label class="form-label" for="fullname">Left Thumb</label>
                                <input type="text" id="fullname" name="lthumb" value="" class="form-control"  required disabled/>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="fullname">Right Thumb</label>
                                <input type="text" id="fullname" name="rthumb" value="" class="form-control"  required disabled/>
                               
                            </div>
                            
                                <div class="row">
                                    <div class="col-md-12" >
                                        <br>
                                        <input type="submit" class="btn btn-primary" style="float:right" name="biomatric" value="Submit">
                                    </div>
                                            
                                </div>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
               </form>

  <!--/ Customer Table -->
        </div>     
          </div>
          <!-- / Content -->
        <?php include('footer.php'); ?>
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <!-- <script src="assets/vendor/libs/popper/popper.js"></script> -->
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="assets/vendor/libs/hammer/hammer.js"></script>
  <script src="assets/vendor/libs/i18n/i18n.js"></script>
  <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/dashboards-crm.js"></script>
    <!-- Vendors JS -->
    <script src="assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<!-- Flat Picker -->
<script src="assets/vendor/libs/moment/moment.js"></script>
<script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
 <!-- Main JS -->
  <script src="assets/js/main.js"></script>
  <!-- Page JS -->
  <script src="assets/js/tables-datatables-advanced.js"></script>
  <script>

      $(document).ready(function(){
        //alert("i am here");
      
              var selectedProvince = $(".province").val();
              var selectedCities= $('#cities').val();
              //alert(selectedDistrict);
              $.ajax({
                  type: "POST",
                  url: "prov-city.php",
                  data: { province : selectedProvince, cities: selectedCities} 
                  
              }).done(function(data){
               
                  $("#cities").html(data);
              });
         
              
            $(".province").change(function(){
              var selectedProvince = $(".province").val();
              var selectedCities= $('#cities').val();
              //alert(selectedDistrict);
              $.ajax({
                  type: "POST",
                  url: "prov-city.php",
                  data: { province : selectedProvince, cities: selectedCities} 
                  
              }).done(function(data){
               
                  $("#cities").html(data);
              });
            });
        });


      </script>

</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template-semi-dark/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2022 19:19:45 GMT -->
</html>
