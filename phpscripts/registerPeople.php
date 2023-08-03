<?php
error_reporting(0);
session_start();
include('../dbconnection.php');
if(!isset($_SESSION['email'])){
  header('location: ../index.php');
 }

  if(isset($_POST['addstudent']))
  {
            $userid=$_REQUEST['userid'];
            $name=$_REQUEST['name'];
            $fname=$_REQUEST['fname'];
            $gender=$_REQUEST['gender'];
            $cnic=$_REQUEST['cnic'];
            $martial_status=$_REQUEST['martial_status'];
            $dob=$_REQUEST['dob'];
            $email=$_REQUEST['email'];
            $mobile1=$_REQUEST['mobile1'];
            $mobile2=$_REQUEST['mobile2'];
            $country=$_REQUEST['country'];
            $province=$_REQUEST['province'];
            $city=$_REQUEST['city'];
            $address1=$_REQUEST['address1'];
            $address2=$_REQUEST['address2'];
         
            $file_name=$_FILES['image']['name'];
            $file_size=$_FILES['image']['size'];
            $file_store= "../assets/customerphotos/";
            $new_name = $cnic.'_'.$file_name;
           // exit($file_name);
            $path=$file_store.$new_name;  
         
            $sql=mysqli_query($conn,"SELECT * FROM rd_people where cnic='$cnic'");
            $cnt=mysqli_num_rows($sql);
          //  echo $cnt;
           // exit($cnt);
            if($cnt > 0)
            {
              $error ="CNIC Already Exists.";
              $_SESSION["error"]= $error; 
              header("location: ../registerPeople.php");            
            }
            else{
             if(!empty($_FILES['image']['name'])){
                if ($_FILES["image"]["size"] <2000000) {
                  move_uploaded_file($_FILES['image']['tmp_name'],$path);
                }
             }
              
            $query1="INSERT INTO rd_people(name,fname,gender,cnic,martial_status,dob,email,mobile1,mobile2,country,province,city,address1,address2,photo,registerby)
            VALUES ('$name','$fname','$gender','$cnic','$martial_status','$dob','$email','$mobile1','$mobile2','$country','$province','$city','$address1','$address2','$file_name',$userid)";
            $sql1=mysqli_query($conn,$query1);
            $success="Data Saved Successfully!";
             $_SESSION["success"]= $success; 
             $_SESSION["cnic"]=$cnic;
            header('location: ../donation.php');
                     
              }
       }
 
?>  