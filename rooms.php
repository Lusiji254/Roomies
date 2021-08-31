<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.html');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>My Bookings</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <link rel="stylesheet" href="homepage.css">
    <style> #map {
  height: 400px;
  /* The height is 400 pixels */
  width: 60%;
  /* The width is the width of the web page */
  border:1px solid blue;
}</style>
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
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="totalHostels.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<div class="row">
<div class="col-md-1"></div>
<form action="" method="post" style="position:relative;">
<table class=" col-md-10 table table-striped auto-index">
<thead>
    <tr>

      
      <th scope="col">Roomtype</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      
     
    </tr>
  </thead>
  <tbody>
<?php
include('config.php');
   

$hostel=$_GET['hostel'];

$query="SELECT * FROM roomtypes WHERE hostelID='$hostel'";
$answer=mysqli_query($conn,$query);
$filtered_row= mysqli_num_rows($answer)>0;

while($row = mysqli_fetch_assoc($answer)){?>
<tr>
    <td><?php echo $row['roomtype']?></td>
    <td>
    <input type="text" class="form-control" placeholder="Please Enter the Price of a single room" value="<?php echo $row['price']?>" name="price[]" autocomplete="off">
    </td>
    <td>
    <input type="text" class="form-control" placeholder="How many single rooms do you have?"  value="<?php echo $row['number']?>" name="number[]" autocomplete="off">
    </td>
   
</tr>
<?php
}?>



  </tbody>

</table>
</div>

<a type="button"  class="btn btn-sm btn-primary" href=" ">Edit</a>
</form>
</body>
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
