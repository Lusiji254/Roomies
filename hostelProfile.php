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
      
      /*The width of the map should be 70%*/
      /*This is the width of the webpage*/
          width: 100%;
          text-align: center;
          margin-left: 2%%;
          height: 500px;
           border:1px solid blue; 
           top: 15px; 

              }
         .form-box{
            width: 380px;
            height: 500px;
            position: relative;
            margin: 2% auto;
            background:rgb(255, 255, 255) ;
            padding: 10px;
            overflow: hidden;
            text-align: left;
            left: 5%;
            top: 15px;
            }
              </style>
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
<<<<<<< HEAD
              <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
=======
                <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
>>>>>>> a5e1228fe7b3fc2bbcc5ea0f18326de4e083a5e0
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav> <br>
<br>


<section class="showcase">
<div class="container-fluid p-0">

<div class="row no-gutters">
<div class="col-lg-6 order-lg-2">
<?php
include 'config.php';

$id=$_GET['hostel'];

$sql="SELECT * FROM hostels WHERE hostel_ID='$id'";
$result=mysqli_query($conn,$sql);
$filtered_rows= mysqli_num_rows($result)>0;

$location="Nairobi";
while($row = mysqli_fetch_assoc($result)){
  $id=$row['hostel_ID'];
    $name=$row['hostel_name'];
    $_SESSION['hostelId']=$id;
    $_SESSION['hostelName']=$name;

    $location=$row['location'];
   ?>   
          
<img src="<?php echo $row['pictures'];?>" width="80%" height="450px" style="margin:auto;"alt="Hostel images">
<?php
}?>
</div>

<div class="col-lg-6 order-lg-1 my-auto showcase-form" >
    <div class="form-box">
    <?php

$id=$_GET['hostel'];

$sql="SELECT * FROM hostels WHERE hostel_ID='$id'";
$result=mysqli_query($conn,$sql);
$filtered_rows= mysqli_num_rows($result)>0;

$location="Nairobi";
while($row = mysqli_fetch_assoc($result)){
  $id=$row['hostel_ID'];
    $name=$row['hostel_name'];
    $_SESSION['hostelId']=$id;
    $_SESSION['hostelName']=$name;

    $location=$row['location'];
   ?>             
    <h3> <?php echo $row['hostel_name']; ?> Hostel</h3> <br>
   <p>Gender: <?php echo $row['gender'];?></p>
   <p>Location: <?php echo $row['location'];?></p>
  <p>Telephone Number: 0<?php echo $row['tel_number'];?></p>
   <p>Amenities: <?php echo $row['amenities'];?></p>
   
    <?php
}?> <br><br>



       
    </div>
    </div>
    </section>
    <?php

$id=$_GET['hostel'];

$sql="SELECT * FROM hostels WHERE hostel_ID='$id'";
$result=mysqli_query($conn,$sql);
$filtered_rows= mysqli_num_rows($result)>0;

$location="Nairobi";
while($row = mysqli_fetch_assoc($result)){
  $id=$row['hostel_ID'];
    $name=$row['hostel_name'];
    $_SESSION['hostelId']=$id;
    $_SESSION['hostelName']=$name;

    $location=$row['location'];
                


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

<div>
<a href="booking.php"><button type="submit" class="btn btn-primary" style="margin-left:45%;"> Book</button></a>
</div> <br><br>
    <div class="container">
<div id="map">
</div>
</div>
<script type="text/javascript" src="googlemap.js"></script>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd1JxsBzPGjhusEs2PK4kP-ZxGllebT6A"></script>
<script>initMap('<?php echo $location; ?>')</script>

    <br><br>
<footer style="color: white;text-align: center;" class="footer">
        
        <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
     
    </footer>

</body>
</html>