<?php
include('config.php');


    $booked_by=$_GET['hostel'];
      $sql="UPDATE `booking` SET `status` = 'Denied' WHERE `booking`.`booked_by` = '$booked_by'";
      $query = mysqli_query($conn,$sql);
      //$result= mysqli_fetch_assoc($query);
  
      if(isset($query)){
          header('location:hostelbookings.php?hostel='.$_GET["id"].'');
      }
    

?>