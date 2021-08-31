<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }
?><!doctype html>
<html lang="en">
<head>
    <title>Hostel home Page</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="display.css">
    
    
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
      echo $_SESSION['login_user'] 
      ?>
        </div>
        
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>

<div class="hero">


      <h1 style="margin-top: -5%;">Get Students Faster and at Anytime<br> Add information about your hostel <br>
      <a href="create.php"><button type="submit" class="btn btn-primary"> Add Hostel</button></a>
    </h1>
   
   
   
   

</div>
<section class="sp-head">
  <div class="container">
    <article class="sp-head__content">
     <h1> ROOMIES PROVIDES THE BEST PLATFORM TO SHOWCASE YOUR HOSTELS AND ACCOMODATION.  A COMMUNITY THAT HELPS YOU FIND STUDENTS FASTER </h1>
    </article>
    <p style="text-align: center;">
      "Showcase your hostel and what you offer with Roomies"


    </p>
    </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">

        <div class="row no-gutters">


          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image:url('Images/image.jpeg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
           
            <h3 style="color: #233a77;text-align: left;">Hi There!</h3><br>
            <h4>Welcome to Roomies...</h4>
              <p>You don't have to look for students to occupy your hostel. Roomies got you covered.
            Sit down, relax and Get students booking your hostel. <br>
                  Get ideas from other hostels and get to connect as well. 
                  <br>
                  Don't be left out add your hostel!</p>
                  
                   <br><br><br><br><br>
        
          </div>

        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('Images/singleroom.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <br>  <h3 style="color: #233a77;"> Why Roomies?</h3>
            <p>
              <ul style="font-size: 22px;">
            
            <li>Roomies is a place you can easily find students to book your hostel regardless of where you are.</li>  
            <li> It is available for different universities and colleges.</li>  
            <li>Making things easier and faster for hostel managers.</li>
            <li>The system is available 24/7 hence hostels can get clients anytime</li> 
            
             <br>
          </ul></p>

          </div>
        </div>
        
    </section>
    <section class="sp-head">
      <div class="container">
        <article class="sp-head__content">
         <h1>Click here to add information about your hostels. <br> Get clients faster :) </h1>
        </article>
        <br>
        <a href="create.php"><button type="submit" class="btn btn-primary "style="text-align:center;"> Add Hostel</button></a>
        
        </div>
        </section>
    <footer style="color: white;text-align: center;" class="footer">
        
              <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
           
      </footer>
  
    </html>