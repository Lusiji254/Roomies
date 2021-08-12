<?php 
include('config.php');


$hostelname=$_POST['hostelname'];
$roomtype=$_POST['roomtype'];
$date=$_POST['date'];
$bookedby=$_POST['bookedby'];
$status=$_POST['bookingStatus'];


$sql = "INSERT INTO `booking` (`hostel`, `room_type`, `move_in_date`, `booked_by`, `status`) VALUES ('$hostelname', '$roomtype', '$date', '$bookedby', '$status');";
$query = mysqli_query($conn,$sql);
if($query==true){
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