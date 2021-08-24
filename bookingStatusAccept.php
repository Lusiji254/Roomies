<?php
include('config.php');

  $booked_by=$_GET['hostel'];
    $sql="UPDATE `booking` SET `status` = 'Accepted' WHERE `booking`.`booked_by` = '$booked_by'";
    $query = mysqli_query($conn,$sql);
    //$result= mysqli_fetch_assoc($query);

    if(isset($query)){
        //echo '<div class="alert alert-success">Booking status has been set to <strong>Accepted</strong></div>';
    header('location:hostelbookings.php');
    }else{
        echo 'no';
    }

?>