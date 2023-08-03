<?php
   error_reporting(0);
   session_start();
   include('dbconnection.php');   

 
    $title=$_POST["Title"];
    $quantity=$_POST["Quantity"];
    $desc=$_POST["Desc"];
    $querypackage="INSERT INTO rd_inventory(title, description, quantity) values('$title','$desc', $quantity)";
    $runpackage=mysqli_query($conn,$querypackage);
    $msg=$runpackage;

    $queryinv="INSERT into rd_inventory_history(title,description,quantity) values('$title','$desc',$quantity)";
    $runinv=mysqli_query($conn,$queryinv);


?>