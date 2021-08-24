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
      $sql = "SELECT * FROM `user` WHERE email = '$myusername' AND password='$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

  echo"wrong password";
}     
if($row['verified']=='Verified'){
if($row['user_status']=='Active' ){
         if($row['user_role'] == "A")
    {
      $_SESSION['login_user'] = $myusername;
        header('Location: adminUser.php');
    }
    else if($row['user_role'] == "S")
    {
      $_SESSION['login_user'] = $myusername;
        header('Location: homepage.php');

    }else if($row['user_role'] == "H"){

      $_SESSION['login_user'] = $myusername;
        header('Location: display.php');
    }
   }else{
      echo "You account has been disabled,please contact the admin";
     // echo'<script>()</script>';
   }
  }else{
    echo "You account is not verified. A verfication email was sent to ".$row['email'].". Please verify to log in.";
  }
    
    
      
   
?>