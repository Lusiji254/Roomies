<?php 
include('config.php');


$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
$email=$_POST['email'];
$phone=$_POST['phonenumber'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$user_role=$_POST['role'];

$sql = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `phone_number`, `gender`, `password`, `user_role`) VALUES ('$first_name', '$last_name', '$email', '$phone', '$gender', '$password', '$user_role')";
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