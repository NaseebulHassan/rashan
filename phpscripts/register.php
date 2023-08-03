<?php

session_start();
include('../dbconnection.php');

// $name=$_POST['name'];
// $email=$_POST['email'];
// $pass=$_POST['password'];
  // if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']))
  if(isset($_POST['register']))
  {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['password'];
            
            $mesg="Password Changed Successfully";
           
           // $query="SELECT * FROM User_Info where stuemail='$email'";
            $sql=mysqli_query($conn,"SELECT * FROM icept_users where email='$email'");
            $cnt=mysqli_num_rows($sql);
          //  echo $cnt;
           // exit($cnt);
            if($cnt > 0)
            {
              $error ="Email already exist! Please try another.";
              $_SESSION["error"]= $error; 
              $_SESSION["email"];
              header("location: ../register.php");
              //   echo '<script> 
              //   alert("User already register with this email!")
              //   window.location= "register"
              //  </script>';   
                
            }
            else{
            
            $query1="INSERT INTO icept_users(name,email,password) VALUES ('$name','$email','$pass')";
            $sql1=mysqli_query($conn,$query1);
             $_SESSION["error"]= $error; 
            header('location: ../index.php');
                     
              }
            }

       

            if(isset($_POST['updatepass']))
            {
              $email=$_REQUEST['Uemail'];
              $pass=$_REQUEST['Upassword'];
                //exit($pass);
              $query1="UPDATE icept_users SET UPassword='$pass' where UID='$email'";
              $sql1=mysqli_query($conn,$query1) ;
            // exit($sql1);
              $_SESSION['msgs']=$mesg;
              header('location: changepass');
        
             
              }
          
         

        if(isset($_POST['updatepassword'])){

          $email=$_REQUEST['Uemail'];
          $pass=$_REQUEST['Upassword'];
          $sql=mysqli_query($conn,"SELECT * FROM icept_users where stuemail='$email' and UID='$email'");
          if(mysqli_num_rows($sql)==1)
          {
            $query1="UPDATE icept_users SET UPassword='$pass' where UID='$email'";
              $sql1=mysqli_query($conn,$query1) ;
            // exit($sql1);
              
              header('location: login');
          }
        }

        
 
  
?>  