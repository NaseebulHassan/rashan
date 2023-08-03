<?php
session_start();
include('../dbconnection.php');
if(isset($_POST['donate']))
	{
        $userid=$_REQUEST['userid'];
        $custid=$_REQUEST['custid'];
       $invid=$_REQUEST['product'];

       $runpeople=mysqli_query($conn,"SELECT * from rd_person_package where personid=$custid");
       $checkpeople=mysqli_num_rows($runpeople);
       //$check=count($checkpeople);
       // exit($checkpeople);

       if($checkpeople==NULL){ 

        for ($a = 0; $a < count($_POST['product']); $a++)
         {     
                
                $pid=$_REQUEST['product'][$a];
                //exit($pid);
                $invquery="SELECT * from rd_packages where pid=$pid";
                $run=mysqli_query($conn,$invquery);
                $fetchinv=mysqli_fetch_array($run);
                //$oldquantity=$fetchinv['quantity'];
                $title=$fetchinv['title'];
                // $type=$fetchinv['type'];
                // $newquantity=$oldquantity-$quantity;
                $query="INSERT INTO rd_person_package (personid,userid,package_id,description) 
                values($custid,$userid,$pid,'$title')";
                mysqli_query($conn,$query);      
                // $invupdatequery="UPDATE rd_inventory set quantity=$newquantity where id=$invid";
                // mysqli_query($conn,$invupdatequery.'$pid');
                $_SESSION['personid']=$custid;
                header('location: ../biomatric.php');

         }        
        }else{
                $_SESSION['error']="Data already Exist!";
                header('location: ../donation.php');  
        }
    }
?>