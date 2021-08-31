<?php
include('../config.php');
if(isset($_GET['status'])){
  if($_GET['status']=='success'){
    echo "Payment Successfull";
    $form=unserialize($_GET['form']);

    print_r($form);
 $form['description'];



 $sql="INSERT INTO `payments` (`user_email`, `booking_ID`, `amount`, `status`) 
 VALUES ('".$form['email']."','".$form['reference']."','".$form['amount']."', 'paid')";
 
 //confirm whether password=password confirm
     if(mysqli_query($conn, $sql)){
header('location:../mypayment.php');

     }else{
       echo mysqli_error($conn);
     }




  } else {
    echo "Payment Failed";
  }
  }
 ?>
