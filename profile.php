
<?php include('profileSession.php')?>

<!doctype html>
<html lang="en">
<head>
    <title>Profile  Page</title>
    
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="hostel.css">
    <style>
        .form-box{
            width: 800px;
            height: 400px;
            position: relative;
            margin: 2% auto;
            background:white;
            padding: 10px;
            overflow: hidden;
            left: 0%;
            top: -25px;
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
                <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul>
                <?php
            echo $_SESSION['login_user'];
            ?></p>
         </div>
        </div>
        

        <p style="text-align: end;top: 0;"><a href="Registration.html">Log Out</a></p>
</nav><br><br>
<?php


    $query="SELECT * FROM  `user` WHERE email='$_SESSION[login_user]'";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    //$row = mysqli_fetch_assoc($result); 
//echo"<img class='img-circle profile_img' src='images/".$_SESSION[pic]."'>";
    ?>
    <div class="row">
            <div clas="col-md-4 mt-1">
                <div class="card text-center sidebar" style="background-color:teal;color: black;
             height: 115%;
             width: 115%;">
                    <div class="card-body" >
                        <img src="Images/User.jpg" class="rounded-circle" width="150"alt="#">
                        <div class="mt-3" >
                            <h3><?php echo $row['first_name'];?> <?php echo $row['last_name'];?> </h3>
                                <a href="homepage.php"style="
             margin-left: 10px;
             display: block;
             color: black;
             padding-bottom: 10px;
             font-size: 26px;
             text-decoration: none;">Home</a>
                                <a href="UpdateProfile.php"style="
             margin-left: 10px;
             display: block;
             color: black;
             padding-bottom: 10px;
             font-size: 26px;
             text-decoration: none;"> Edit Profile</a>
                                
                                <a href="Registration.html"style="
             margin-left: 10px;
             display: block;
             color: black;
             padding-bottom: 10px;
             font-size: 26px;
             text-decoration: none;">Log Out</a>

                        </div>

                    </div>

                </div>



        </div>
    <div class="wrapper" >
        <?php
    //if(isset($_POST['submit']))
   // {
       // header('location:updateProfile.php');
     //  $_SESSION['login_user'] = $myusername;
      //header('Location: updateProfile.php');

        ?>
        
        
            



</div>

    
    <div class="form-box">
        <h3>My profile</h3><br>
        
        
<?php
echo "<table class='table'>";
echo "<tr>";
    echo "<td>";
    echo"<b> First Name:</b>";
    echo "</td>";

    echo "<td>";
    echo $row['first_name'];
    echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo"<b> Last Name:</b>";
    echo "</td>";

    echo "<td>";
    echo $row['last_name'];
    echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo"<b> Email:</b>";
    echo "</td>";

    echo "<td>";
    echo $row['email'];
    echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
    echo"<b> Phone Number:</b>";
    echo "</td>";

    echo "<td>";
    echo  $row['phone_number'];
    echo "</td>";
echo "</tr>";

echo "<tr>";
    echo "<td>";
    echo"<b> Gender:</b>";
    echo "</td>";

    echo "<td>";
    echo $row['gender'];
    echo "</td>";
echo "</tr>";

echo "<tr>";
    echo "<td>";
    echo"<b> User Role:</b>";
    echo "</td>";

    echo "<td>";
    echo $row['user_role'];
    echo "</td>";
echo "</tr>";

echo "<tr>";
    echo "<td>";
    echo"<b> Password:</b>";
    echo "</td>";

    echo "<td>";
    echo $row['password'];
    echo "</td>";
echo "</tr>";


echo "</table>";
?>

</div>
        </div>

        <div class="container">
            <form action="" method="POST">
            
            <button class="btn btn-primary" style="float:right;width:70px;" name="submit"> Edit</button>
            </form>

            </div>
   <br><br><br>
      <footer style="color: white;text-align: center;" class="footer">
        
    <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>
 
</footer>
</body>
</html> 