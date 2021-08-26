<?php 
    session_start();
  
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.html');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Booking  Page</title>
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
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
            </div>
        </div>
        <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="Registration.html">Log Out</a></p>
</nav>
<div class="hero">        

     

    <div class="form-box">`
        <h3>Book from Anywhere</h3>
    </form>
    <form id="register" class="search" action="bookingAction.php" method="post">
  
    <input type="text" class="form-control" name="hostelid" value=<?php echo $_SESSION['hostelId'];?>hidden >
     
    <input type="text" class="form-control" name="hostelname" value=<?php echo $_SESSION['hostelName'];?> hidden >
    <label for="floatingInput">Room Type</label>
    <input type="text" class="form-control" name="roomtype" placeholder="What room do you want?" required>
    <label for="floatingInput">Checkin Date</label>
    <input type="date" class="form-control" name="date" placeholder="When do you want to check in?" required>
   
    <input type="text" class="form-control" name="bookedby"value=<?php  echo $_SESSION['login_user']; ?> hidden>
        
    <button type="submit" name="submit" class="btn btn-primary">Book</button>
          
    </form>
    </div>
    </div>
    </div>
    <section class="sp-head">
        <div class="container">
          <article class="sp-head__content">
           <h1>Click here to Make payments. <br> Simple and Fast :) </h1>
          </article>
          <br>
          <a href="#"><button type="submit" class="btn btn-primary"> Make Payments</button></a>
          
          </div>
          </section>
          <footer style="color: white;text-align: center;" class="footer">
        
            <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
         
    </footer>
</html>