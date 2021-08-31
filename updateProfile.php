
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
            <?php
     

             $user= $_SESSION['login_user'] ;
$sql="SELECT user_role FROM `user` WHERE email = '$user' ";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row['user_role']=='Hostel Owner'){
             ?>
                 <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="display.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="totalHostels.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
                <?php
            echo $_SESSION['login_user'];
            ?></p>
            <?php
            }elseif($row['user_role']=='Student'){?>

<p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
                <?php
            echo $_SESSION['login_user'];
            ?>
            <?php
            }else{
              ?>
                <p>
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="adminUser.php">Users</a></li>
          <li class="nav-item"><a class="nav-link" href="adminHostel.php">Hostels</a></li>
          <li class="nav-item"><a class="nav-link" href="adminBookings.php">Bookings</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
        </ul>
        </p>
      </div>
      <?php
      echo $_SESSION['login_user'];
       ?>
      <?php
            }
            ?>
           
        </div>
        

        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<div><h3>Edit Profile</h3></div><br>


<?php


    $query="SELECT * FROM  `user` WHERE email='$_SESSION[login_user]'";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    ?>

<div  class="form-box">
    
<form id="register" class="inputRegister" action="updateProfile.php" method="POST" enctype="multipart/form-data">
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

  <!--<fieldset>
    <label for="floatingPassword">Password</label>
<input type="text" class="form-control" id="password"  name="password" value="/*<?php echo $row['password'];?>" required minlength="6">

</fieldset>-->



<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-4 pt-0">User Role</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="user_role" id="gridRadios2" value="Hostel Owner" required>
        <label class="form-check-label" for="gridRadios2">
          Hostel Owner
        </label>
      </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_role" id="gridRadios2" value="Student"required>
          <label class="form-check-label" for="gridRadios2">
            Student
          </label>
      </div>
    </div>
    
  </fieldset>
 
 <button type="submit" class="btn btn-primary" name="update" style="margin-bottom: 10px;">Update</button>


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
    user_role='$_POST[user_role]' WHERE email='".$_SESSION['login_user']." ';";
$result=mysqli_query($conn,$sql);
//email='$_SESSION[login_user]'"
if($result)
    {
     ?>
     <script type="text/javascript">
     alert("Data Updated Sucessfully");
     window.location="profile.php";
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