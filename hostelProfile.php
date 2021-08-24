
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
  <script type="text/javascript" src="googlemap.js"></script>
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
                <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">About Us</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<?php
include 'config.php';

$id=$_GET['hostel'];

$sql="SELECT * FROM hostels WHERE hostel_ID='$id'";
$result=mysqli_query($conn,$sql);
$filtered_rows= mysqli_num_rows($result)>0;

while($row = mysqli_fetch_assoc($result)){
  $id=$row['hostel_ID'];
    $name=$row['hostel_name'];
    $_SESSION['hostelId']=$id;
    $_SESSION['hostelName']=$name;
                
    echo $row['hostel_name'];
    echo $row['gender'];
    echo $row['location'];
    echo $row['tel_number'];
    echo $row['amenities'];
    echo $row['pictures'];

}?>
<div class="row">
<div class="col-md-1"></div>
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
$query="SELECT * FROM roomtypes WHERE hostelID='$id'";
$answer=mysqli_query($conn,$query);
$filtered_row= mysqli_num_rows($answer)>0;

while($row = mysqli_fetch_assoc($answer)){?>
<tr>
    <td><?php echo $row['roomtype']?></td>
    <td><?php echo $row['price']?></td>
    <td><?php if($row['number']>0){
        echo '<span class="badge bg-success">Available</span>';
    }else{
        echo '<span class="badge bg-danger">Inavailable</span>';  
    }   
    }?></td>
</tr>

  </tbody>
</table>
</div>
<div class="container">
<div id="map">

</div>
</div>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClLSNOdhgaGkctOq69ph461ZXRGUs3W-E&callback=initMap">
</script>

<a href="booking.php"><button type="submit" class="btn btn-primary"> Book</button></a>
</body>
</html>