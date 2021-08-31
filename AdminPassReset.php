<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }

    include("config.php");

    // ENTER A NEW PASSWORD
    if (isset($_POST['reset'])){
    
        $email=$_POST['email'];
      $new_pass = md5(mysqli_real_escape_string($conn, $_POST['new_pass']));
      //$new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);
      $sql = "UPDATE `user` SET `password` = '$new_pass' WHERE `user`.`email` = '$email'";
          $results = mysqli_query($conn, $sql);
          if($results){
            echo '<script>alert("Password Reset was successful!")</script>'   ;   
          header('location: adminhome.php');
        }
    }     

    

?>

<!doctype html>
<html lang="en">
<head><title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="Registration.css">

</head>    
<body>
<nav class="navbar navbar-expand-lg navbar-light bg light " id="mainNav">
    <div class="container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <H4>Roomies</H4>
        <p>
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="adminUser.php">Users</a></li>
          <li class="nav-item"><a class="nav-link" href="adminHostel.php">Hostels</a></li>
          <li class="nav-item"><a class="nav-link" href="adminBookings.php">Bookings</a></li>
          <li class="nav-item"><a class="nav-link" href="adminPayments.php">Payment</a></li>
        </ul>
        </p>
      </div>
      <?php
      echo $_SESSION['login_user'] ?>
    </div>

    <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
  </nav>
  
    <div style="width: 350px;height:500px;top: 90px;" class="form-box">`
    <form style="top: 60px;" id="login" class="inputLogin" action=" " method="POST">
        <h2>Reset Password</h2><br>
        <label for="floatingInput">Email</label>
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
      
        <label for="floatingPassword">New Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="new_pass" required>
        <label for="floatingPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" placeholder="Password" name="new_pass_c" required>
        <span style="margin-right:0px ;" id="message"></span><br>

        <button style="width:150px;
            margin: 35px auto;
            position: relative;
            border-radius: 40px;" type="submit" class="btn btn-primary" name="reset"> Reset Password</button>
            
</form>
</div>`
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    var password = document.querySelector('#password');
    var cpassword = document.querySelector('#confirm_password');
  
    $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
      var u_times = document.querySelector('.u_times');
      var u_check = document.querySelector('.u_check');
  
  
      $('#message').html('Matching').css('color', 'green');
      password.style.border='2px solid green';
      cpassword.style.border='2px solid green';
    
      
    } else {
      $('#message').html('Not Matching').css('color', 'red');
      password.style.border='2px solid red';
      cpassword.style.border='2px solid red';
     }
      })
  </script>
</body>

</html>
