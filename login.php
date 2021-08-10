<?php
   //include("config.php");
   //create connection
 $conn = mysqli_connect('localhost', 'root', '', 'roomies');

 //check connection
 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
     // $error="";
      $sql = "SELECT email FROM `user` WHERE email = '$myusername' AND password='$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header('location:homepage.php');
      }else if(!$row)
         {
             die(header("location:index.php?loginFailed=true&reason=password"));
         }
      }
   
?>