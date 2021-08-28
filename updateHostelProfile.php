
<?php include('profileSession.php')?>

<!doctype html>
<html lang="en">
<head>
    <title>Update Profile  Page</title>
    
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="updateProfile.css">
    
    
</head> 

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg light " id="mainNav">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <H4>Roomies</H4>
                <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="display.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="HOProfile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="totalHostels.php">Hostels</a></li>
           <li class="nav-item"><a class="nav-link" href="HostelAboutUs.php">About Us</a></li>
                </ul>
                
         </div>
         <?php
            echo $_SESSION['login_user'];
            ?>
        </div>
        

        <p style="text-align: end;top: 0;"><a href="Registration.html">Log Out</a></p>
</nav>
<div><h3>Edit Profile</h3></div><br>


<?php


    $query="SELECT * FROM  `user` WHERE email='$_SESSION[login_user]'";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    ?>

<div  class="form-box">
    
<form id="register" class="inputRegister" action="updateHostelProfile.php" method="POST" enctype="multipart/form-data">
    <label for="floatingInput">First Name</label>
<input type="text" class="form-control" id="floatingInput"  name="first_name" value="<?php echo $row['first_name'];?>" required>
    
    <label for="floatingInput">Last Name</label>
<input type="text" class="form-control" id="floatingInput"  name="last_name" value="<?php echo $row['last_name'];?>"required>
    
    <label for="floatingInput">Email address</label>
<input type="email" class="form-control" id="floatingInput"  name="email" value="<?php echo $row['email'];?>" required>

<label for="floatingInput">Phone Number</label>
<input type="tel" class="form-control" id="floatingInput"  name="phone_number" value="<?php echo $row['phone_number'];?>" required>

<fieldset class="row mb-3">
  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
  <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="F">
      <label class="form-check-label" for="gridRadios2">
        Female
      </label>
    </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="M">
        <label class="form-check-label" for="gridRadios2">
          Male
        </label>
    </div>
  </div>
  
</fieldset>

  <fieldset>
    <label for="floatingPassword">Password</label>
<input type="text" class="form-control" id="password"  name="password" value="<?php echo $row['password'];?>" required minlength="6">

</fieldset>



<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-4 pt-0">User Role</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="user_role" id="gridRadios2" value="H" required>
        <label class="form-check-label" for="gridRadios2">
          Hostel Owner
        </label>
      </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_role" id="gridRadios2" value="S"required>
          <label class="form-check-label" for="gridRadios2">
            Student
          </label>
      </div>
    </div>
    
  </fieldset>
 
 <button type="submit1" class="btn btn-primary" name="update" style="margin-bottom: 10px;">Update</button>


</form>
</div>
</div>



<?php
if(isset($_POST['update'])){
  
    //acquire data from the form by assigning them to variables
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $user_role=$_POST['user_role'];
    
    $sql="UPDATE `user` SET first_name ='$_POST[first_name]', last_name='$_POST[last_name]', 
    email='$_POST[email]', phone_number='$_POST[phone_number]', gender='$_POST[gender]', 
    password='$_POST[password]', user_role='$_POST[user_role]' WHERE email='".$_SESSION['login_user']." ';";
$result=mysqli_query($conn,$sql);
//email='$_SESSION[login_user]'"
if($result)
    {
     ?>
     <script type="text/javascript">
     alert("Data Updated Sucessfully");
     window.location="HOProfile.php";
     </script>
     <?php
   }

}

  ?>
        
<footer style="color: white;text-align: center;" class="footer">
        
    <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
 
</footer>

</body>
</html>