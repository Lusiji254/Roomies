<!doctype html>
<html lang="en">
  <head>
    <title>Registration Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Registration.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
  <body>
      <h1>ROOMIES</h1>
   
<div id="login_form" class="login_page">
  <div class="form-box">`
    <div ></div>
      <div id='btn1'>
    <button type='button'onclick='login()'class='toggle-btn'>Log In</button></div>
    <div id='btn2'>
    <button type='button'onclick='register()'class='toggle-btn'>Register</button>
        
    </div>
    

<form id="login" class="inputLogin" action="login.php" method="POST">
  <?php if(!isset($_SESSION)){
session_start();

  }
  if(isset($_SESSION['error'])){
  
    ?> 
    <div class="alert alert-danger"><?php echo $_SESSION['error']; ?> </div>
    <?php
    unset($_SESSION['error']);
    
      }
    ?>

   <label for="floatingInput">Email</label>
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"name="username">

  <label for="floatingPassword">Password</label>
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">

  <a ><button type="submit" class="btn btn-primary" name="login"> Log in</button></a>

  <br><br>
  <p style="text-align: center;font-size: 10pt;"><a href="Passwordreset.html">Forgot password?</a></p>

</form>
<form id="register" class="inputRegister" action="registrationAction.php" method="POST">
    <label for="floatingInput">First Name</label>
<input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" required>
    
    <label for="floatingInput">Last Name</label>
<input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" required>
    
    <label for="floatingInput">Email address</label>
<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>

<label for="floatingInput">Phone Number</label>
<input type="tel" class="form-control" id="floatingInput" placeholder="0712345678" name="phone" required>

<fieldset class="row mb-3">
  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
  <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
      <label class="form-check-label" for="gridRadios2">
        Female
      </label>
    </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Male">
        <label class="form-check-label" for="gridRadios2">
          Male
        </label>
    </div>
  </div>
  
</fieldset>

  <fieldset>
    <label for="floatingPassword">Password</label>
<input type="password" class="form-control" id="password" placeholder="Password" name="password" required minlength="6">

</fieldset>

<div class="form-grp">
	 <label for="floatingPassword">Confirm Password</label>
 <input type="password" class="form-control" id="confirm_password" placeholder="Password"name="pass_confirm" required minlength="6"><span style="margin-right:0px ;" id="message"></span>
 
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-4 pt-0">Role</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="user_role" id="gridRadios2" value="Hostel Owner" required>
        <label class="form-check-label" for="gridRadios2">
          Hostel Owner
        </label>
      </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_role" id="gridRadios2" value="Student">
          <label class="form-check-label" for="gridRadios2">
            Student
          </label>
      </div>
    </div>
    
  </fieldset>
 
 <button type="submit" class="btn btn-primary" name="submit" style="margin-bottom: 10px;">Submit</button>


</form>
</div>
</div>
<script>
var x=document.getElementById('login');
var y=document.getElementById('register');
varz=document.getElementById('btn');
    function register(){
    x.style.left='-400px';
    y.style.left='50px';
    z.style.left='110px';

}
function login(){
    x.style.left='50px';
    y.style.left='450px';
    z.style.left='0px';

}
</script>
</div>

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
<footer style="color: white;text-align: center;" class="footer">
        
        <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
     
    </footer>

</body>
</html>