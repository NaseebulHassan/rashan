
<?php 
session_start();
include('dbconnection.php');
if(!isset($_SESSION['email'])){
    header('location: ../index.php');
   }

$email=$_SESSION['email'];
//exit($email);
 $sql="select * from rd_users where email='$email'";
 $result=mysqli_query($conn,$sql);
 $fetch=mysqli_fetch_array($result);
 //$fetchrow=mysqli_num_rows($result);
 $userid=$fetch['uid'];

 $custid=$_REQUEST['custid'];
 $invid=$_REQUEST['product'];
 
if(isset($_POST['donate']))
{
//  $userid=$_REQUEST['userid'];
//  $custid=$_REQUEST['custid'];
//  $invid=$_REQUEST['product'];
 
 $quantity=$_REQUEST['quantity'];
 $amount=$_REQUEST['cash'];
 

 $invquery="SELECT * from rd_packages where id=$invid";
 $run=mysqli_query($conn,$invquery);
 $fetchinv=mysqli_fetch_array($run);
 $oldquantity=$fetchinv['quantity'];
 $title=$fetchinv['title'];
 $pkgtype=$fetchinv['pkgtype'];
 

 $query="INSERT INTO rd_order(userid,custid,invid,title,quantity,amount,pkgtype) 
 values($userid,$custid,$invid,'$title',$quantity,$amount,'$pkgtype')";
 //exit($query);
 mysqli_query($conn,$query);
 if($oldquantity!=0){
    $newquantity=$oldquantity-$quantity;
    $invupdatequery="UPDATE rd_inventory set quantity=$newquantity where id=$invid";
    mysqli_query($conn,$invupdatequery);
 }


}
$maxid="SELECT max(id) as maxorder from rd_order";
 $maxorder=mysqli_query($conn,$maxid);
 $fetchmaxorder=mysqli_fetch_array($maxorder);
 $maximumorder=$fetchmaxorder['maxorder'];
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
       
            @media print {
            
                #print {
                display: block;
                }
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
                    <div id="print">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <!-- 1. Delivery Address -->
                            <h5 class="mb-4">Rashan Recipient Details</h5>
                            <?php
                                    // if(isset($_SESSION["error"])){
                                    // $error = $_SESSION["error"];
                                    // echo "<span>$error</span>";
                                    // unset($_SESSION["error"]);
                                    // }
                                   
                                if(isset($_SESSION["success"])){
                                    $sucmsg = $_SESSION["success"];
                                    echo "<span>$sucmsg</span>";
                                    unset($_SESSION['success']);
                                }
                                $customerquery="SELECT o.id,c.name,c.fname,c.cnic,c.mobile1,i.title,o.quantity as orderquantity, o.amount,o.pkgtype from rd_order o
                                INNER join rd_customers c on o.custid=c.id
                                INNER JOIN rd_inventory i on o.invid=i.id 
                                and o.id=$maximumorder";
                                $runcustquery=mysqli_query($conn,$customerquery);
                                $getdata=mysqli_fetch_array($runcustquery);
                                ?>  
                            <div class="row ">
                            <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th><strong>Particulars</strong></th>
                                            <th><strong>Title</strong></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Receipt#:</strong></td>
                                                <td><?php echo $getdata['id'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Full Name</strong></td>
                                                <td><?php echo $getdata['name'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Father Name:</strong> </td>
                                                <td>  <?php echo $getdata['fname']; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>National ID#: </strong></td>
                                                <td><?php echo $getdata['cnic'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Mobile Number:</strong></td>
                                                <td><?php echo $getdata['mobile1'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Title:</strong></td>
                                                <td><?php echo $getdata['title'];  ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Type:</strong></td>
                                                <td><?php echo $getdata['pkgtype'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Quantity:</strong></td>
                                                <td><?php echo $getdata['orderquantity'];?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Cash:</strong></td>
                                                <td><?php echo $getdata['amount'];  ?> Rs</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Process By: <?php echo $fetch['name']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                              
                            </div>
                                    
                                
                            
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12" >
                        <br>
                        <button class="btn btn-primary" onclick="printDiv('print')" style="float:right; margin-right:150px">Print</button>
                        <!-- <input onclick="Print();" class="btn btn-primary" style="float:right" name="donate" value="Print"> -->
                    </div>
                            
                </div>
                </div>
                </div>
            </div>

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

  
  
<?php 

?>
  
<script>
    function printDiv(print) {
     var printContents = document.getElementById(print).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
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
