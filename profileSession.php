<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select email from user where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //$login_session = $row['username'];
   
   //if(!isset($_SESSION['login_user'])){
    if(isset($_POST['submit']))
    {
     header("location:updateProfile.php");
      die();
   }
   if(isset($_POST['submit1']))
    {
     header("location:updateHostelProfile.php");
      die();
   }

   
?>