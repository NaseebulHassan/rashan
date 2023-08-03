
<?php 
session_start();
include('dbconnection.php');
?>

<!DOCTYPE html>


<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="assets/" data-template="vertical-menu-template-semi-dark">

  
<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template-semi-dark/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2022 19:18:48 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - CRM </title>
    
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

    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
<link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
<link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
<!-- Row Group CSS -->
<link rel="stylesheet" href="assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
<!-- Form Validation -->
<link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

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
            
            



<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header" style="background-color:#01446E;color:white;">Student's Information</h5>
  <div class="card-datatable table-responsive">
    <table class="dt-responsive table border-top">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>ID Number</th>
          <th>Status</th>
          <th>Curriculum</th>
          <th>Year</th>
          <th>Clinical Name</th>
          <th>Hospital</th>
          <th>Mobile</th>
          <th>Miles</th>
          <th>Street</th>
          <th>City</th>
      
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          <?php
                   $sql=mysqli_query($conn,"SELECT * FROM students");
                  // $fetch=mysqli_fetch_array($sql);
                 //  echo $cnt;

                 while($row = mysqli_fetch_array($sql)){

               
          ?>
        <tr>
          <td><strong><?php echo $row['id']; ?></strong></td>
          <td><?php echo $row['fname']; ?></td>
          <td>
          <?php echo $row['lname']; ?>
          </td>
          <td><?php echo $row['idnumber']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['curriculum']; ?></td>
          <td><?php echo $row['schoolyear']; ?></td>
          <td><?php echo $row['clinicalname']; ?></td>
          <td><?php echo $row['hospital']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['miles']; ?></td>
          <td><?php echo $row['street']; ?></td>
          <td><?php echo $row['city']; ?></td>  
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
       <?php
       }
       ?>
     
        
      </tbody>

    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

  <!--/ Customer Table -->
</div>

            
          </div>
          <!-- / Content -->

          
          

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      © <script>
      document.write(new Date().getFullYear())
      </script>
      , made with ❤️ by <a href="" target="_blank" class="footer-link fw-bolder">MrTech</a>
    </div>
    <div>
      
      <a href="" class="footer-link me-4" target="_blank">License</a>
      <a href="" target="_blank" class="footer-link me-4">More Themes</a>
      
      <a href="" target="_blank" class="footer-link me-4">Documentation</a>
      
      
      <a href="" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
      
    </div>
  </div>
</footer>
<!-- / Footer -->

          
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
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="assets/vendor/libs/hammer/hammer.js"></script>
  <script src="assets/vendor/libs/i18n/i18n.js"></script>
  <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script src="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>
<script src="assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
<script src="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
<script src="assets/vendor/libs/jszip/jszip.js"></script>
<script src="assets/vendor/libs/pdfmake/pdfmake.js"></script>
<script src="assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
<script src="assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
<!-- Flat Picker -->
<script src="assets/vendor/libs/moment/moment.js"></script>
<script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
<!-- Row Group JS -->
<script src="assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js"></script>
<script src="assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js"></script>
<!-- Form Validation -->
<script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/tables-datatables-basic.js"></script>
  
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template-semi-dark/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2022 19:19:45 GMT -->
</html>
