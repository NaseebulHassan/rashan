<?php
session_start();
error_reporting(0);
include('../dbconnection.php');
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];	

		$error="User Name or Password is Incorrect!";
		$errorver= "Please Activate your account before login! Check your Email.";
		$sql = "SELECT * from rd_users where email='$email' and password ='$password'";
	//	exit($sql);
		$result = mysqli_query($conn,$sql);
		$usertype=mysqli_fetch_array($result);
		$row= mysqli_num_rows($result);
		$type=$usertype['usertype'];
	//	echo $row;
	//	exit($row);
		if ($row==1)
			{
					
					if($type=='Admin'){
						$_SESSION['email']=$email;
						header("location: ../dashboard.php");
					}  
					  
			}
			else 
			{
				
				$_SESSION["error"]= $error; 
				header("location: ../index.php"); 
			}
	}
	else
	{
		// $_SESSION["error"]= $error;   
		header("location: ../index.php");
	}

?>