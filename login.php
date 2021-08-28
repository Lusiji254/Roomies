<?php
   //include("config.php");
   //create connection
   if(!isset($_SESSION)){
    session_start();
    
      }
 $conn = mysqli_connect('localhost', 'root', '', 'roomies');

 //check connection
 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
  // session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword =md5( mysqli_real_escape_string($conn,$_POST['password'])); 
     // $error="";
      $sql = "SELECT * FROM `user` WHERE email = '$myusername' AND password='$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      
      echo $mypassword;
      echo $row['password'];

if($mypassword==$row['password']){
if($row['verified']=='Verified'){
if($row['user_status']=='Active' ){
         if($row['user_role'] == "Admin")
    {
      $_SESSION['login_user'] = $myusername;
        header('Location: adminhome.php');
    }
    else if($row['user_role'] == "Student")
    {
      $_SESSION['login_user'] = $myusername;
        header('Location: homepage.php');

    }else if($row['user_role'] == "Hostel Owner"){

      $_SESSION['login_user'] = $myusername;
        header('Location: display.php');
    }
   }else{

     $_SESSION['error']= "You account is inactive. Kindly contact the admin.";
    header('Location: Registration.php'); 

   }
  }else{
    $_SESSION['error']= "You account is not verified. A verfication email was sent to ".$row['email'].". Please verify to log in.";
    header('Location: Registration.php');

  } 
}else{
  $_SESSION['error']= "wrong password";
  header('Location: Registration.php');
}
}
    
 
      
   
?>