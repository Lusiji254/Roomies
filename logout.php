<?php
   session_start();
   
   if(session_destroy()) {
     //echo $_SESSION['login_user'];
      header("Location: Registration.html");
   }
?>