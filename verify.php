<?php
if(isset($_GET['vkey'])){
    $vkey =$_GET['vkey'];

    $conn = mysqli_connect('localhost', 'root', '', 'roomies');

    //check connection
    if($conn === false){
       die("ERROR: Could not connect. "
           . mysqli_connect_error());
   }
   $sql="SELECT verified,vkey FROM user WHERE verified='Unverified' AND vkey='$vkey' LIMIT 1";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result)==1){
$update= "UPDATE user SET verified = 'Verified' WHERE vkey='$vkey' LIMIT 1";
$updated = mysqli_query($conn, $update);
 if($updated){
     $msg="Successful registration, please log in!";
     header('location:Registration.php');
 }else{
     echo 'Error'.mysqli_error($conn);
 }

   }else{
       echo"This account is already verified";
   }
}

?>