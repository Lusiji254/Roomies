<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>My Hostels</title>
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
                    <li class="nav-item"><a class="nav-link" href="hostelProfile.php">My Rooms</a></li>
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
<table class=" col-md-10 table table-striped">
<thead>
    <tr>
    <th>Hostel Id</th>
                    <th>Hostel Name</th>
                    <th>Gender</th>
                    <th>Location</th>
                    <th>Telephone</th>
                    <th>Amenities</th>
                    <th>Pictures</th>
                    <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include('config.php');

    $owner=$_SESSION['login_user'];

    $sql="SELECT * FROM hostels WHERE hostel_owner ='$owner' ";
    $query = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($query)){ ?>

      <tr>
      <td ><?php echo $row["hostel_ID"]?></td>
        <td><?php echo $row['hostel_name']?></td>
        <td><?php echo $row['gender']?></td>
        <td><?php echo $row['location']?></td>
        <td><?php echo $row['tel_number']?></td>
        <td><?php echo $row['amenities']?></td>
        <td><img src='<?php echo $row['pictures']?>'width="150px" height="150px"></td>
       
            
     <td> <a type="button"  class="btn btn-sm btn-primary" href="hostelEdits.php?hostel=<?php echo $row['hostel_ID'];?>">Edit</a>
     <a type="button"  class="btn btn-sm btn-primary" href="hostelbookings.php?hostel=<?php echo $row['hostel_ID'];?>">Bookings</a></td>

      </tr>
  <?php  }?>
  </tbody>
</table>

<div class="col-md-1"></div>


</div>



</body>
</html>