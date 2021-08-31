   <?php
    session_start();
    if (!isset($_SESSION['login_user'])) {
      header('location:Registration.php');
    }

    include  'config.php';

    if (isset($_POST['submit'])) {

      $hostel_name = $_POST['hostel_name'];
      $hostel_owner = $_SESSION['login_user'];
      $location = $_POST['location'];
      //$room_types=$_POST['room_types'];
      $gender = $_POST['gender'];
      $tel_number = $_POST['tel_number'];
      $amenities = $_POST['amenities'];


      $picture_path = mysqli_real_escape_string($conn, 'Images/' . $_FILES['pictures']['name']);


      if (preg_match("!image!", $_FILES['pictures']['type'])) {

        if (copy($_FILES['pictures']['tmp_name'], $picture_path)) {

          $sql = "INSERT INTO `hostels` (`hostel_name`, `gender`, `location`, `tel_number`, `amenities`,`pictures`, `hostel_owner`) 
    VALUES ('$hostel_name', '$gender', '$location', '$tel_number','$amenities','$picture_path', '$hostel_owner')";
          $result = mysqli_query($conn, $sql);

          if ($result) {
            $checked_array = $_POST['roomtype'];
          
            foreach ($_POST['roomname'] as $key => $value) {

              if(in_array($_POST['roomname'][$key],$checked_array))
               {
                $roomname = $_POST['roomname'][$key];
                $price = $_POST['price'][$key];
                $number = $_POST['number'][$key];

                $hostel_id= mysqli_query($conn,"SELECT MAX(hostel_ID)as hostel_ID FROM hostels;");
                while ($row = mysqli_fetch_assoc($hostel_id)) {                               
                $query="INSERT INTO `roomtypes` ( `hostelID`,`roomtype`, `price`, `number`) 
                VALUES ('$row[hostel_ID]','$roomname', '$price', '$number');";
                $answer = mysqli_query($conn,$query);
               }
                }else{
                  echo "No hostel ID";
                }
              
              }
            }
            header('location:totalHostels.php');

          } else {
            die(mysqli_error($conn));
          }
        } else {
          echo "file upload failed";
        }
      } else {
        //echo "please upload jpg";
      }
    
    ?>
   <!doctype html>
   <html lang="en">

   <head>
     <title>Hostel Management</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- Required meta tags -->
     <link rel="stylesheet" href="hostel.css">


   <body>
     <nav class="navbar navbar-expand-lg navbar-light bg light " id="mainNav">
       <div class="container">

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           Menu
           <i class="fas fa-bars ms-1"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
           <H4>Add a Hostel at Roomies</H4>
           <p>
           <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
             <li class="nav-item"><a class="nav-link" href="display.php">Home</a></li>
             <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
             <li class="nav-item"><a class="nav-link" href="totalhostels.php">Hostels</a></li>
             <li class="nav-item"><a class="nav-link" href="HostelAboutUs.php">About Us</a></li>
           </ul>
           </p>
           
         </div>
         <?php
        echo $_SESSION['login_user'] 
        ?>
       </div>
      <p style="text-align: end;top: 0; font-size:20px;"><a href="logout.php">Log Out</a></p>
     </nav>

     <div class="container">

       <form method="post" action="Create.php" enctype="multipart/form-data">
         <div class="form-group">
           <label>Hostel name</label>
           <input type="text" class="form-control" id="floatingInput" placeholder="Enter the hostel's name" name="hostel_name" required>
         </div>
         <!--<div class="form-group">
           <label >Hostel Owner</label>
           <input type="text" class="form-control" id="floatingInput" placeholder="Enter the hostel owner's name" name="hostel_owner" required>
     </div>-->
         <div class="form-group">
           <label>Telephone Number</label>
           <input type="tel" class="form-control" placeholder="Enter Phone number" name="tel_number" autocomplete="off" required>
         </div>
         <div class="form-group">
           <label>Location</label>
           <input type="text" class="form-control" placeholder="Enter the hostel's location" name="location" required>
         </div>
         <label for="floatingInput">Hostel Type</label>
         <div class="input-group mb-3">
           <select class="form-select" id="inputGroupSelect02" name="gender" required>
             <option selected></option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
             <option value="Mixed">Mixed</option>

           </select>

         </div>

         <table class="table">
           <thead>
             <tr>
               <th></th>
               <th scope="col">Room Type</th>
               <th scope="col">Price (Ksh)</th>
               <th scope="col">Number of Rooms</th>
             </tr>
           </thead>
           <tbody>
             <tr>

             <td><input class="form-check-input" type="checkbox" name="roomtype[]"  value="Single Room"></td>
               <td>
                 <div class="form-check">
                   
                   <label class="form-check-label" >
                     Single room 
                   <input type="hidden" name="roomname[]" value="Single Room">
                    </label>
                 </div>
               </td>
               <td>
                 <input type="text" class="form-control" placeholder="Please Enter the Price of a single room" name="price[]" autocomplete="off">
               </td>
               <td>
                 <input type="text" class="form-control" placeholder="How many single rooms do you have?" name="number[]" autocomplete="off">

               </td>

             </tr>
             <tr>
             <td><input class="form-check-input" type="checkbox" name="roomtype[]" value="Double Room"></td>
               <td>
                 <div class="form-check">
                                     <label class="form-check-label">
                     Double Room </label>
                   <input type="hidden" name="roomname[]" value="Double Room">

                 </div>

               </td>
               <td>
                 <input type="text" class="form-control" placeholder="Please Enter the Price of a double room" name="price[]" autocomplete="off">
                  </td>
               <td>
                 <input type="text" class="form-control" placeholder="How many double rooms do you have?" name="number[]" autocomplete="off">

               </td>
             </tr>
             <tr>
             <td><input class="form-check-input" type="checkbox" name="roomtype[]"  value="Cluster Room"></td>
               <td>

                 <div class="form-check">
                 
                   <label class="form-check-label">
                     Cluster Room</label>
                   <input type="hidden" name="roomname[]" value="Cluster Room">

                 </div>

               </td>
               <td><input type="text" class="form-control" placeholder="Please Enter the Price of a cluster room" name="price[]" autocomplete="off">
                 </input> </td>
               <td>
                 <input type="text" class="form-control" placeholder="How many cluster rooms do you have?" name="number[]" autocomplete="off">
                 </input>
               </td>


             </tr>
             <tr>

               
               <td><input class="form-check-input" type="checkbox" name="roomtype[]"  value="Quadruple Room"></td>
               <td>
                 <div class="form-check">
                <label class="form-check-label">
                     Quadruple Room </label>
                   <input type="hidden" name="roomname[]" value="Quadruple Room">

                 </div>

               </td>
               <td><input type="text" class="form-control" placeholder="Please Enter the Price of a Quadruple Room" name="price[]" autocomplete="off">
                 </input> </td>
               <td>
                 <input type="text" class="form-control" placeholder="How many quadruple rooms do you have?" name="number[]" autocomplete="off">
                 </input>
               </td>


             </tr>
           </tbody>
         </table>



         <div class="form-group">
           <label>Hostel Description and Amenities</label>
           <input type="text" class="form-control" placeholder="Enter the hostel's Amenities" name="amenities" required>
         </div>
         <div class="form-group">
           <label>Images</label>
           <input type="file" class="form-control" name="pictures" accept="Images/*" required>
         </div><br>
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>
       </form>
     </div>
     <br>
     <footer style="color: white;text-align: center;" class="footer">

       <p class="text-muted small mb-4 mb-lg-0">&copy; Roomies 2021. All Rights Reserved.</p>

     </footer>

   </body>

   </html>