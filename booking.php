<?php 
    session_start();
  
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="mybookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.php">About Us</a></li>
                </ul></p>
            </div>
        </div>
        <?php 
      echo $_SESSION['login_user'] ?>
        </div>
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
 </nav>
 <div class="hero">        

     

    <div class="form-box">`
        <h3>Book from Anywhere</h3>
    </form>
    
    <form id="register" class="search" action="bookingAction.php" method="post">
    <?php if(!isset($_SESSION)){
session_start();

  }
  if(isset($_SESSION['error'])){
  
    ?> 
    <div class="alert alert-danger"><?php echo $_SESSION['error']; ?> </div>
    <?php
    unset($_SESSION['error']);
    
      }
    ?>
  
    <input type="text" class="hostelid form-control" name="hostelid" id="hostelid" value=<?php echo $_SESSION['hostelId'];?> hidden>
    <label for="floatingInput">Hostel Name</label> 
    <input type="text" class="form-control" name="hostelname" value=<?php echo $_SESSION['hostelName'];?> readonly >
    <label for="floatingInput">Room Type</label>
    <div class="input-group mb-3">
    
      <?php
      include('config.php');
     $hostel= $_SESSION['hostelId'];
      $sql="SELECT roomtype FROM `roomtypes` WHERE hostelID = '$hostel'";
      $result=mysqli_query($conn,$sql);

      ?>
           <select class=" roomtype form-select" id="roomtype" name="roomtype" required>
        <option selected>Select a roomtype</option>
             <?php
             while($row=mysqli_fetch_assoc($result)){
               $roomtype=$row['roomtype'];
             echo $roomtype;
             ?>
             
             <option value="<?php echo $roomtype; ?>"><?php echo $roomtype; ?></option>
             <?php
             }
             ?>

           </select>

         </div>
   
   
    <label for="floatingInput">Amount</label>
    <input type="text" class="amount form-control" id="amount" name="amount"  placeholder="How much is your room?" >
    <label for="floatingInput">Checkin Date</label>
    <input type="date" class="form-control" name="date" placeholder="When do you want to check in?" required>
    <label for="floatingInput">Phone Number</label>
    <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
    <label for="floatingInput">Email</label>
    <input type="text" class="form-control" name="bookedby"value=<?php  echo $_SESSION['login_user']; ?> readonly>
        
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
    <script>
      $(document).ready(function(){

        $(".roomtype").change(function(){
var hostelId=$(".hostelid").val();
var roomtype=$(this).val();
$.ajax({
  url:"amount.php",
  method:"post",
  data:{hostelId:hostelId,roomtype:roomtype},
  success:function(data){
    console.log(data);
    $("#amount").val(data);
  }
});
        });
      });


    </script>

    <!--<script>
      function GetDetails(str){
        if(str.length==0){
          document.getElementById("amount").value="";
          return;
        }else{

          var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
  if(this.readyState==4 && this.status ==200){

      var myObj =JSON.parse(this.responseText);
      document.getElementById("amount").value =myObj[0];
  }
};

          xmlhttp.open("GET","amount.php?hostelid="+str,"roomtype="+str,true);
          xmlhttp.send();
        }
      }
      </script>-->

</body>
</html>