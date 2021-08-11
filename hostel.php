<?php include('config.php')?>



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
                    <li class="nav-item"><a class="nav-link" href="homepage.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="hostel.html">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">About Us</a></li>
                </ul></p>
            </div>
        </div>
        <p style="text-align: end;top: 0;"><a href="Registration.html">Log Out</a></p>
</nav>
<div class="hero">        

     

    <div class="form-box">`
        <h3>Search, Find and Book from Anywhere</h3>
    </form>
    <form id="register" class="search" action="#" method="post">
        <label for="floatingInput">Location</label>
    <input type="location" class="form-control" id="floatingInput" placeholder="Where do you want to stay?">
    <label for="floatingInput">Maximum Price</label>
    <input type="maximumPrice" class="form-control" id="floatingInput" placeholder="Ksh">
    <label for="floatingInput">Hostel Type</label>
    <div class="input-group mb-3">
        <select class="form-select" id="inputGroupSelect02">
          <option selected ></option>
          <option value="1">Male</option>
          <option value="2">Female</option>
          <option value="3">Mixed</option>
        </select>
        </div>
        
    <button type="submit" class="btn btn-primary">Search</button>
          
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



<!-- HOSTEL DISPLAY DATA TRIAL -->
<div class="container py-5">
    <div class="row mt-4">
        <?php  
       
        $query="SELECT * FROM hostels";
        $query_run=mysqli_query($conn, $query);
        $check_hostels =mysqli_num_rows($query_run) > 0;
            if($check_hostels){
                while($row = mysqli_fetch_array($query_run))
                {

        ?>
        <div class="col-md-4 mt-3">
            <div class="card">
            <img src="uploads/<?php echo $row['pictures'];?>" width="260px" height="200px" alt="Hostel images">
                <div class="card-body">
                    <h4 style="text-align:center;"class="card-title">Hostel Name: <?php echo $row['hostel_name'];?></h4>
                    <p style="font-size:18px;"class="card-text"> Contact: <?php echo $row['hostel_owner'];?><br><?php echo $row['tel_number'];?></p>
                    <p style="font-size:18px;" class="card-text">Hostel Type: <?php echo $row['gender'];?>  </p>
                    <p style="font-size:18px;"class="card-text">Room types available: <?php echo $row['room_types'];?></p>
                    <p style="font-size:18px;"class="card-text">Amenities: <?php echo $row['amenities'];?></p>

                </div>
                </div>
            </div>
    <?php

                                  
                }
 
            }else{
                echo"No Hostels Found";
            }
        ?>


        

        
 
    </div>


</div>




    
  <section class="sp-head">
    <div class="container">
      <article class="sp-head__content">
       <h1>Click here to book a hostels. <br> Simple and Fast :) </h1>
      </article>
      <br>
      <a href="booking.html"><button type="submit" class="btn btn-primary"> Book Now</button></a>
      
      </div>
      </section>
  <footer style="color: white;text-align: center;" class="footer">
        
    <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
 
</footer>
</body>
</html>