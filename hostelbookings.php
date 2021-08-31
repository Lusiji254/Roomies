<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
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
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<div class="row">
<div class="col-md-1"></div>
<table class=" col-md-10 table table-striped auto-index">
<thead>
    <tr>

      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Roomtype</th>
      <th scope="col">Amount</th>
      <th scope="col">Move in Date</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
     
    </tr>
  </thead>
  <tbody>
    <?php 
    include('config.php');
   

    $hostel=$_GET['hostel'];

    $sql="SELECT * FROM booking WHERE hostel='$hostel' ";
    $query = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($query)){ ?>

      <tr>
      <td hidden><?php echo $row['hostel']?></td>
        <td><?php echo $row['booked_by']?></td>
        <td><?php echo $row['phone']?></td>
        <td><?php echo $row['room_type']?></td>
        <td><?php echo $row['amount']?></td>
        <td><?php echo $row['move_in_date']?></td>
        <?php
        if($row['status'] == 'Pending'){
          $s='primary';

        }elseif($row['status'] == 'Accepted'){
          $s='success';
        }else{
          $s='danger';
        }?>
        <td><?php echo '<span class="badge bg-'. $s .'">'. $row['status'] .'</span>';?></td>
        <td>
        <!--<a type="button" name="accept" class="btn btn-sm btn-success" href="bookingStatusAccept.php?id=<?php echo $_GET['hostel'] ?>&&hostel=<?php echo $row['booked_by'];?>" >Accept</a>
        <a type="button" name="deny" class="btn btn-sm btn-danger"  href="bookingStatusDeny.php?id=<?php echo $_GET['hostel'] ?>&&hostel=<?php echo $row['booked_by'];?>">Deny</a>-->
        <?php 
        
        if($row['status'] == 'Pending'){?>
        <a type="button" name="accept" class="btn btn-sm btn-success" href="bookingStatusAccept.php?id=<?php echo $_GET['hostel'] ?>&&hostel=<?php echo $row['booked_by'];?>" >Accept</a>
     <a type="button" name="deny" class="btn btn-sm btn-danger"  href="bookingStatusDeny.php?id=<?php echo $_GET['hostel'] ?>&&hostel=<?php echo $row['booked_by'];?>">Deny</a>
     <?php 
     
     ;}elseif($row['status'] == 'Accepted'){?>
      <a type="button" name="deny" class="btn btn-sm btn-danger"  href="bookingStatusDeny.php?id=<?php echo $_GET['hostel'] ?>&&hostel=<?php echo $row['booked_by'];?>">Deny</a>
      <?php 
      ;}else{ ?> <a type="button" name="accept" class="btn btn-sm btn-success" href="bookingStatusAccept.php?id=<?php echo $_GET['hostel'] ?>&&hostel=<?php echo $row['booked_by'];?>">Accept</a>
      <?php ;}
       ?>
    </td>

      </tr>
      <?php }?>
  </tbody>
</table>


 

</div>

<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br>
<footer style="color: white;text-align: center;" class="footer">
        
        <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
     
    </footer>
</body>
</html>