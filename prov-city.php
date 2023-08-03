<?php

  session_start();

include('dbconnection.php');
//  



if(isset($_POST["province"])){ 
    // Capture selected country
    $province = $_POST["province"];   
    $cities = $_POST["cities"];  
                 
    $query = mysqli_query($conn,"SELECT * from rd_city WHERE pid='$province'");
    $string='<option value="" >--Select city--</option>';
    echo $string;
    while($cate = mysqli_fetch_array($query)) {
        
      ?>
 
      <option  value="<?php echo $cate['id'] ?>" <?php if($cate['pid']==$province) echo "selected='selected'" ?>> <?php echo $cate['city_name'] ?> </option> 
   <?php }
    //echo $string;  
}

?>


