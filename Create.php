   
<?php
include  'config.php';

if(isset($_POST['submit'])){
    $hostel_name=$_POST['hostel_name'];
    $hostel_owner=$_POST['hostel_owner'];
    $location=$_POST['location'];
    $room_types=$_POST['room_types'];
    $gender=$_POST['gender'];
    $tel_number=$_POST['tel_number'];
    $amenities=$_POST['amenities'];
    $pictures=$_FILES['pictures']['name'];
    $target="Images/".basename($pictures);
    
    if(!isset($_FILES['photo'])) {
      $error[] = "No photo selected !";
  }
    
    $sql="INSERT INTO `hostels` (`hostel_name`, `gender`, `location`, `tel_number`, `room_types`, `amenities`, `pictures`, `hostel_owner`) 
    VALUES ('$hostel_name', '$gender', '$location', '$tel_number', '$room_types', '$amenities', '$pictures', '$hostel_owner')";
    $result=mysqli_query($conn,$sql);
if($result){
      if(move_uploaded_file($_FILES['pictures']['tmp_name'],$target)){
            
    echo "Data inserted Succefully";
      }
}else{
    die(mysqli_error($conn));
}
      
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
              <H4>Add Hostel at Roomies</H4>
                <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="display.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hostelprofile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="hostel.html">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">About Us</a></li>
                </ul></p>
            </div>
        </div>
        <p style="text-align: end;top: 0;"><a href="Registration.html">Log Out</a></p>
</nav>
        
     <div class="container">

     <form method="post">
        <div class="form-group">
           <label >Hostel name</label>
           <input type="text" class="form-control" id="floatingInput" placeholder="Enter the hostel's name" name="hostel_name" >
     </div>
     <div class="form-group">
           <label >Hostel Owner</label>
           <input type="text" class="form-control" id="floatingInput" placeholder="Enter the hostel owner's name" name="hostel_owner" >
     </div>
     <div class="form-group">
           <label >Location</label>
           <input type="text" class="form-control"
           placeholder="Enter the hostel's location" name="location" >
     </div>
     <div class="form-group">
           <label >Room types</label>
           <input type="text" class="form-control"
           placeholder="Enter the room types available" name="room_types" >
     </div>
     <label for="floatingInput">Hostel Type</label>
     <div class="input-group mb-3">
          <select class="form-select" id="inputGroupSelect02" name="gender">
          <option selected ></option>
          <option value="1">Male</option>
          <option value="2">Female</option>
          <option value="3">Mixed</option>
          
        </select>
        
        </div>
     <div class="form-group">
           <label >Telephone Number</label>
           <input type="text" class="form-control"
           placeholder="Enter Phone number" name="tel_number"autocomplete="off" >
     </div>
     <div class="form-group">
           <label >Amenities</label>
           <input type="text" class="form-control"
           placeholder="Enter the hostel's Amenities" name="amenities" >
     </div>
     <div class="form-group">
           <label >Images</label>
           <input type="file" class="form-control" name="pictures" >
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