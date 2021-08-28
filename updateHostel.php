<?php
include 'config.php';

if(isset($_POST['update'])){
        $hostelID=$_POST['hostel_ID'];
        $hostelName=$_POST['hostel_name'];
        $gender=$_POST['gender'];
        $location=$_POST['location'];
        $telnumber=$_POST['tel_number'];
        $amenities=$_POST['amenities'];
        $picture_path = mysqli_real_escape_string($conn, 'Images/' . $_FILES['pictures']['name']);


      if (preg_match("!image!", $_FILES['pictures']['type'])) {

        if (copy($_FILES['pictures']['tmp_name'], $picture_path)) {
          $sql = "UPDATE `hostels` SET `hostel_name`='$hostelName', `gender`='$gender', `location`='$location', `tel_number`='$telnumber', `amenities`='$amenities',`pictures`='$picture_path' WHERE hostel_ID='$hostelID'"; 
         
                $result = mysqli_query($conn, $sql);
                if($result){
                   header('location:HOProfile.php');
                }

      }
    }
  }
  ?>