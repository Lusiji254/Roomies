<?php
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }

?>
<!doctype html>
<html lang="en">
<head>
    <title>Pay Rent</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="homepage.css">

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
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
            </div>
            <?php
      echo $_SESSION['login_user']; ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<body>
<div class="container">
    <h5 style="text-align:center; "> Payment Form<h5>
<form action="checkout/" method="post"><?php

   include('config.php');
   $query="SELECT u.first_name,u.last_name,b.booking_ID,b.room_type,b.amount,b.booked_by,b.phone FROM  `booking` b
   LEFT JOIN user u ON u.email=b.booked_by 
    WHERE b.booked_by='$_SESSION[login_user]'";
   $result=mysqli_query($conn, $query);
   $row = mysqli_fetch_assoc($result);
?>
<div class="form-group row">
    <div class="col">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name'];?>"  required>
    </div>
    <div class="col">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name'];?>" required >
    </div>
  </div>
    <div class="form-group row">
      <div class="col">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['booked_by'];?>"  required>
      </div>
      <div class="col">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'];?>"  required>
      </div>
      </div>
      <div class="form-group row">
        <div class="col">
          <label for="roomtype">Room Type</label>
          <input type="text" class="form-control" id="roomtype" value="<?php echo $row['room_type'];?>"  >
        </div>
        <div class="col">
          <label for="reference">Ref No.</label>
          <input type="reference" class="form-control" id="reference" name="reference" value="<?php echo $row['booking_ID'];?>"  >
        </div>
        </div>
        <div class="form-group row">
          <div class="col">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $row['amount'];?>" required>
            <input type="text" name="type" value="MERCHANT" readonly="readonly" hidden/>
          </div>
            <div class="col">
              <label for="roomtype">Purpose</label>
              <input type="text" class="form-control" id="roomtype"  name="description" value="Rent Deposit"  >
            </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-md">Pay</button>
          </div>
          <?php if(isset($_GET['status'])&&$_GET['status']=='cancelled'){
            ?>
            <div class="form-group">
              <p class="label label-danger">Payment Cancelled. Please try again</p>
            </div>
            <?php
          } ?>

</form>
</div>
</body>
</html>
