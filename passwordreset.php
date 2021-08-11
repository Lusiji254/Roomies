<?php
$conn = mysqli_connect('localhost', 'root', '', 'roomies');

//check connection
if($conn === false){
   die("ERROR: Could not connect. "
       . mysqli_connect_error());
}
//include("config.php");
// ENTER A NEW PASSWORD
if (isset($_POST['reset'])) {
    $email=$_POST['email'];
  $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);
  $sql = "UPDATE `user` SET `password` = '$new_pass' WHERE `user`.`email` = '$email'";
      $results = mysqli_query($conn, $sql);
      if($results){
        echo "new password set";
      }
      header('location: Registration.html');
    }
  ?>