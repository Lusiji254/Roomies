<?php

include("config.php");

// ENTER A NEW PASSWORD
if (isset($_POST['reset'])){

    $email=$_POST['email'];
  $new_pass = md5(mysqli_real_escape_string($conn, $_POST['new_pass']));
  //$new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);
  $sql = "UPDATE `user` SET `password` = '$new_pass' WHERE `user`.`email` = '$email'";
      $results = mysqli_query($conn, $sql);
      if($results){
            
      header('location: Registration.php');
    }
}  
  ?>