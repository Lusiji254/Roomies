<?php 
include('config.php');
include('function.php');



$hostelname =$_POST['hostelname'];
$gender =$_POST['gender'];
$location =$_POST['location'];
$telephone =$_POST['telephone'];
$roomtype =$_POST['roomtype'];
$amenities =$_POST['amenities'];
$hostelowner =$_POST['hostelowner'];


$picture ='' ;
if($_FILES["inputPicture"]["name"]!= ''){

    $picture = upload_image();
}

$sql = "INSERT INTO `hostels` (`hostel_name`, `gender`, `location`, `tel_number`, `room_types`, `amenities`, `pictures`, `hostel_owner`) VALUES (, '$hostelname', '$gender', '$location', '$telephone', '$roomtype', '$amenities', '$picture', '$hostelowner');";
$query = mysqli_query($conn,$sql);
if($query==true){
    $data = array();
}

?>