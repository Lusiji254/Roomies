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
$vkey = md5(time().$email);


//insert query
$sql="INSERT INTO `user` (`first_name`, `last_name`, `email`, `phone_number`, `gender`, `password`, `user_role`,`vkey`) 
VALUES ('$first_name','$last_name','$email', '$phone','$gender','$password','$user_role', '$vkey')";

//confirm whether password=password confirm
    if(mysqli_query($conn, $sql)){
        //echo "Registration suceessful";;
       // header('location:Registration.html');
                  //$msg = "Registration successful";
            //header('Location: Registration.html');
            //exit();
   //#############SEND EMAIL##########//
   $to = $email;
   $subject = "Email Verification for Roomies";
   $message ="<a href='http://localhost/Roomies/verify.php?vkey=$vkey'>Register account</a>";
   $headers = "From: lusijily@gmail.com \r\n";
   $headers .= "MIME-Version: 1.0"."\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

   if(mail($to,$subject,$message,$headers)){
       ini_set();
    header('location:thankyou.html');
   }

}
    } else{
        echo "ERROR: Hush! Sorry" .$sql. mysqli_error($conn);
    }
     

//close connection
mysqli_close($conn);

?>