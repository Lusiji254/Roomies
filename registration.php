<?php

//create connection
 $conn = mysqli_connect('localhost', 'root', '', 'roomies');

 //check connection
 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

if(isset($_POST['submit'])){
//acquire data from the form by assigning them to variables
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$user_role=$_POST['user_role'];
$password_confirm=$_POST['pass_confirm'];

//insert query
$sql="INSERT INTO `user` (`first_name`, `last_name`, `email`, `phone_number`, `gender`, `password`, `user_role`) 
VALUES ('$first_name','$last_name','$email', '$phone','$gender','$password','$user_role')";

//confirm whether password=password confirm
    if(mysqli_query($conn, $sql)){
        //echo "<script>alert('Registration successful');</script>";;
       // header('location:Registration.html');
      
            $msg = "Registration successful";
            header('Location: Registration.html');
            exit();
}
    } else{
        echo "ERROR: Hush! Sorry" .$sql. mysqli_error($conn);
    }
     

//close connection
mysqli_close($conn);

?>