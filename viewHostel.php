<?php
session_start();
if (!isset($_SESSION['login_user'])) {
  header('location:Registration.html');
} 
unset($_SESSION['hostelId']);
    unset($_SESSION['hostelName']);
include('config.php')?>



<!doctype html>
<html lang="en">
<head>
    <title>Hostel  Page</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="hostel.css">
    
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
        </div>
        <?php
        echo $_SESSION['login_user'] ?>
        <p style="text-align: end;top: 0;"><a href="Registration.html">Log Out</a></p>
</nav>
<div class="hero">        

     

    <div class="form-box">`
        <h3>Search, Find and Book from Anywhere</h3>
    </form>
    <form id="register" class="search" action="#" method="post">
        <label for="floatingInput">Location</label>
    <input type="text" class="form-control" id="floatingInput" name="location" placeholder="Where do you want to stay?">
    <label for="floatingInput">Maximum Price</label>
    <input type="maximumPrice" class="form-control" id="floatingInput"name="price" placeholder="Ksh">
    <label for="floatingInput">Hostel Type</label>
    <div class="input-group mb-3">
        <select class="form-select" id="inputGroupSelect02" name='gender'>
          <option selected ></option>
          <option value="Male"name='gender'>Male</option>
          <option value="Female" name='gender'>Female</option>
          <option value="Mixed" name='gender'>Mixed</option>
        </select>
        </div>
        
    <button type="submit" name="search" class="btn btn-primary">Search</button>
          
    </form>
  
    </div>
    </div>
    </div>

  <section class="showcase">
    <section class="sp-head">
        <div class="container">
          <article class="sp-head__content">
          <br><br> <h3> BELOW ARE SOME OF THE ROOM TYPES OFFERED BY OUR PARTNERED HOSTELS. </h3>
        <p>All room types are equally as good. Your preference is what matters.</p>  
        </article>
        
          </div>
          </section>
          <div class="container py-5">
    <div class="row mt-4">
     <?php
          
       
    if(isset($_POST['search'])){
$location=$_POST['location'];
$gender=$_POST['gender'];
$price=$_POST['price'];



       
        $query="SELECT * FROM `hostels` WHERE location ='$location' AND gender ='$gender' AND hostel_ID IN 
        (SELECT hostelID FROM `roomtypes` WHERE price <='$price')";
        $query_run=mysqli_query($conn, $query);
        $check_hostels =mysqli_num_rows($query_run) > 0;
            if($check_hostels){
                while($row = mysqli_fetch_array($query_run))
                {
                  $id=$row['hostel_ID'];
                  $name=$row['hostel_name'];
                  $_SESSION['hostelId']=$id;
                  $_SESSION['hostelName']=$name;
           
        ?>



<!-- HOSTEL DISPLAY DATA TRIAL -->
<div class="container py-5">
    <div class="row mt-4">
        
        <div class="col-md-4 mt-3">
            <div class="card">
            <img src="<?php echo $row['pictures'];?>" width="80%" height="200px" style="margin:auto;"alt="Hostel images">
                <div class="card-body">
                    <h4 style="text-align:center;"class="card-title">Hostel Name: <?php echo $row['hostel_name'];?></h4>
                    <p style="font-size:18px;"class="card-text"> Gender: <?php echo $row['gender'];?></p>
                    <p style="font-size:18px;" class="card-text">Location: <?php echo $row['location'];?>  </p>
                    <p style="font-size:18px;"class="card-text">Email: <?php echo $row['hostel_owner'];?></p>
                    <p style="font-size:18px;"class="card-text">Tel Number <?php echo $row['tel_number'];?></p>
                    <a href="hostelProfile.php?hostel=<?php echo $id;?>"><button type="submit" class="btn btn-primary"> View</button></a>
                </div>
                </div>
            </div>
    <?php

                                  
                }
              }
 
           
            
          }else{
          
  

            $sql="SELECT * FROM `hostels`";
              $sql_run=mysqli_query($conn, $sql);
          $check_hostel =mysqli_num_rows($sql_run) > 0;
              if($check_hostel){
                  while($row = mysqli_fetch_array($sql_run))
                  { $id=$row['hostel_ID'];
                    $name=$row['hostel_name'];
                    $_SESSION['hostelId']=$id;
                    $_SESSION['hostelName']=$name;
                

                    ?>
                    <!-- HOSTEL DISPLAY DATA TRIAL -->
  
          
          <div class="col-md-4 mt-3">
              <div class="card">
              <img src="<?php echo $row['pictures'];?>" width="80%" height="200px" style="margin:auto;"alt="Hostel images">
                  <div class="card-body">
                      <h4 style="text-align:center;"class="card-title">Hostel Name: <?php echo $row['hostel_name'];?></h4>
                      <p style="font-size:18px;"class="card-text"> Gender: <?php echo $row['gender'];?></p>
                      <p style="font-size:18px;" class="card-text">Location: <?php echo $row['location'];?>  </p>
                      <p style="font-size:18px;"class="card-text">Email: <?php echo $row['hostel_owner'];?></p>
                      <p style="font-size:18px;"class="card-text">Tel Number <?php echo $row['tel_number'];?></p>
                      <a href="hostelProfile.php?hostel=<?php echo $id;?>"><button type="submit" class="btn btn-primary"> View</button></a>
                  </div>
                  </div>
              </div>
              <?php
                  }
                }
              }
                ?>
        
           



        

</section>



</div>




    
  <section class="sp-head">
    <div class="container">
      <article class="sp-head__content">
       <h1>Click here to book a hostels. <br> Simple and Fast :) </h1>
      </article>
      <br>
      <a href="booking.php"><button type="submit" class="btn btn-primary"> Book Now</button></a>
      
      </div>
      </section>
  <footer style="color: white;text-align: center;" class="footer">
        
    <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
 
</footer>
</body>
</html>