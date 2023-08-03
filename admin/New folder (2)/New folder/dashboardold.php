
<?php 
session_start();
include('../dbconnection.php');
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
    <?php include('../cssstyles.php'); ?>

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
  <!-- Customer Ratings -->
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Customer Ratings</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="customerRatings" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="customerRatings">
            <a class="dropdown-item" href="javascript:void(0);">Featured Ratings</a>
            <a class="dropdown-item" href="javascript:void(0);">Based on Task</a>
            <a class="dropdown-item" href="javascript:void(0);">See All</a>
          </div>
        </div>
      </div>
      <div class="card-body pb-0">
        <div class="d-flex align-items-center gap-3 mb-3">
          <h1 class="display-3 mb-0">4.0</h1>
          <div class="ratings">
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-warning"></i>
            <i class="bx bxs-star bx-sm text-lighter"></i>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <span class="badge bg-label-primary me-3">+5.0</span>
          <span>Points from last month</span>
        </div>
      </div>
      <div id="customerRatingsChart"></div>
    </div>
  </div>
  <!--/ Customer Ratings -->
  <!-- Overview & Sales Activity -->
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="card-title mb-0">Overview & Sales Activity</h5>
        <small class="card-subtitle">Check out each column for more details</small>
      </div>
      <div id="salesActivityChart"></div>
    </div>
  </div>
  <!--/ Overview & Sales Activity -->
  <div class="col-12 col-md-12 col-lg-4">
    <div class="row">
      <div class="col-sm-6 col-md-3 col-lg-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-semibold mb-1">Sessions</span>
            <h3 class="card-title mb-2">2,845</h3>
          </div>
          <div id="sessionsChart" class="mb-3"></div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="assets/img/icons/unicons/cube-secondary.png" alt="cube" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Order</span>
            <h4 class="card-title mb-2">$1,286</h4>
            <small class="text-danger fw-semibold"><i class='bx bx-down-arrow-alt'></i> -13.24%</small>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column">
                <div class="card-title mb-auto">
                  <h5 class="mb-0">Generated Leads</h5>
                  <small>Monthly Report</small>
                </div>
                <div class="chart-statistics">
                  <h3 class="card-title mb-1">4,230</h3>
                  <small class="text-success text-nowrap fw-semibold"><i class='bx bx-up-arrow-alt'></i> +12.8%</small>
                </div>
              </div>
              <div id="leadsReportChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header" style="background-color:#01446E;color:white;">Guided Information</h5>
  <div class="table-responsive text-nowrap">
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

  
  
<?php include('../jsscripts.php'); ?>
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template-semi-dark/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 May 2022 19:19:45 GMT -->
</html>
