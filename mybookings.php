<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }
    unset($_SESSION['hostelId']);
    unset($_SESSION['hostelName']);
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
                    <li class="nav-item"><a class="nav-link" href="totalHostels.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="mypayment.php">Payments</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                    
                </ul></p>
                
            </div>
            <?php 
                echo $_SESSION['login_user'] 
                ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<h5 style="text-align: center;">My Bookings</h5>
<div class="row">
<div class="col-md-1"></div>
<table class=" col-md-10 table table-striped">
<thead>
    <tr>
      <th scope="col">Hostel Name</th>
      <th scope="col">Roomtype</th>
      <th scope="col">Amount</th>
      <th scope="col">Move in Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include('config.php');

    $student=$_SESSION['login_user'];

    $sql="SELECT * FROM booking WHERE booked_by='$student' ";
    $query = mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($query)){ ?>

      <tr>
        <td><?php echo $row['hostel_name']?></td>
        <td><?php echo $row['room_type']?></td>
        <td><?php echo $row['amount']?></td>
        <td><?php echo $row['move_in_date']?></td>
        <?php if( $row['status'] == 'Pending'){
            $s='primary';
            
        }elseif($row['status'] == 'Accepted'){
            $s='success';
        }else{
            $s='danger';
        } ?>
        <?php //$s = $row['status'] == 'Pending' ? 'primary' : 'success';?>
        <td><?php echo '<span class="badge bg-'. $s .'">'. $row['status'] .'</span>';?></td>

      </tr>
      
  </tbody>

</table>

<div class="col-md-1"></div>
<?php
      if( $row['status'] == 'Accepted'){?>
      <a type="button" role="button" href="payment.php" class="btn btn-primary"> Proceed to payment</a>
        <?php
      }else{
        ?>
        <div class=" row">
        <div class="col-md-4"></div>
<div  class=" col-md-8 alert alert-danger" role="alert">
 You cannot make payment until your booking is accepted
      </div>
    
        </div>
        
        <?php
      }
       } ?>
     

</div>

</body>
</html>