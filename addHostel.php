<?php 
include('config.php');
include('function.php');



$hostelname =$_POST['hostelname'];
$gender =$_POST['gender'];
$location =$_POST['location'];
$telephone =$_POST['telephone'];
//$roomtype =$_POST['roomtype'];
$amenities =$_POST['amenities'];
$hostelowner =$_POST['hostelowner'];


//$picture ='' ;
//if($_FILES["inputPicture"]["name"]!= ''){

   // $picture = upload_image();
//}

$sql = "INSERT INTO `hostels` (`hostel_name`, `gender`, `location`, `tel_number`, `amenities`, `pictures`, `hostel_owner`) 
VALUES (, '$hostelname', '$gender', '$location', '$telephone', '$amenities', '$hostelowner');";
$query = mysqli_query($conn,$sql);
if($query==true){
    //$data = array();
    $data = array(
        'status'=>'success',
    );
    echo json_encode($data);
}else{
    $data = array(
        'status'=>'failed',
    );
    echo json_encode($data);  
}

?>