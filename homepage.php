<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.html');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Home Page</title>
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
                    <li class="nav-item"><a class="nav-link" href="hostel.html">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">About Us</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>

<div class="hero">


      <h1 style="margin-top: -5%;">Get the Best Students Accomodation at <br> Roomies
      <br>
      <a href="viewhostel.php"><button type="submit" class="btn btn-primary" style="margin:auto"> Available Hostels</button></a></h1>
        
</div>
<section class="sp-head">
  <div class="container">
    <article class="sp-head__content">
     <h1> ROOMIES PROVIDES THE BEST HOSTELS AND ACCOMODATION FOR STUDENTS IN CAMPUS. A COMMUNITY THAT PROVIDES ULTIMATE CAMPUS LIFE </h1>
    </article>
    <p style="text-align: center;" >
      "Campus life  can be seamless from start to finish"


    </p>
    </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">

        <div class="row no-gutters">


          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: 
          url('Images/students.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
           
            <h3 style="color: #233a77;text-align: left;" class="display-5 mb-0" >Hi There!</h3><br>
            <h4 class="lead mb-0" style="font-weight:700 ;">Your search for a hostel has come to an end...</h4>
              <p class="lead mb-0" style="text-align: justify;">Welcome to Roomies, search and get accomodation of your choice at your own comfort. 
                  Get to study, learn and connect with friends and peers. 
                  <br>
                  Join other students who are just like you to get the best campus experience.</p>
                  
                   <br><br><br><br><br>
        
          </div>

        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('Images/homepage2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <br>  <h3 style="color: #233a77;" class="display-5 mb-0" > Why Roomies?</h3>
            <p>
              <ul style="font-size: 22px;">
            
            <li class="lead mb-0">Roomies is a place you can easily find accomodation regardless of where you are.</li>  
            <li class="lead mb-0"> It is available for different universities and colleges.</li>  
            <li class="lead mb-0">Making things easier for students.</li>
            <li class="lead mb-0">There very many nationalities. I guarantee you won't fell left out.</li> 
            <li class="lead mb-0"> We value your happiness and we want you to enjoy your campus life.</li>
             <br>
          </ul></p>

          </div>
        </div>
        
    </section>
    <section class="sp-head">
      <div class="container">
        <article class="sp-head__content">
         <h1 class="display-5 mb-0" >Click here to check out the available hostels. <br> You won't regret :) </h1>
        </article>
        <br>
        <a href="hostel.html"><button type="submit" class="btn btn-primary"> Available Hostels</button></a>
        
        </div>
        </section>
    <footer style="color: white;text-align: center;" class="footer">
        
              <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
           
      </footer>
  
    </html>