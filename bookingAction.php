<?php 
   session_start();
include('config.php');


if(isset($_POST['submit'])){

$hostel_ID=$_POST['hostelid'];
$hostelname=$_POST['hostelname'];
$roomtype=$_POST['roomtype'];
$amount=$_POST['amount'];
$date=$_POST['date'];
$phone=$_POST['phone'];
$bookedby= $_POST['bookedby'] ;

$stmt="SELECT * FROM `booking` WHERE booked_by='$bookedby'";
$result=mysqli_query($conn,$stmt);
if($row=mysqli_fetch_assoc($result)>0){
    $_SESSION['error']= " You cannot make another booking. You already have 1 existing booking.";
    header('Location: booking.php'); 

    ?>
    <!doctype html>
<html lang="en">
<head>
    <title>My Bookings</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="homepage.css">
    
</head>    
<body>
    <div class="row">
<div  class=" col-md-2"></div>
    <div  class=" col-md-8 alert alert-danger" style="margin-top: auto;" role="alert">
    You cannot make another booking. You already have 1 existing booking.<a href="mybookings.php">Check your bookings</a>
      </div>
      <div  class=" col-md-2"></div>
</div>
</body>
    <?php

}else{
$sql = "INSERT INTO `booking` (`hostel`,`hostel_name`, `room_type`,`amount`,`move_in_date`,`phone`, `booked_by`, `status`)
                       VALUES ('$hostel_ID','$hostelname', '$roomtype','$amount', '$date','$phone','$bookedby','Pending')";
$query = mysqli_query($conn,$sql);

if($query){
    header('Location:mybookings.php');
    unset($_SESSION['hostelId']);
    unset($_SESSION['hostelName']);
}else{
    echo mysqli_error($conn);
}

}


}
?>