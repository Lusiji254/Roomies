<?php

include('config.php');

if(isset($_POST['hostelId'])&& isset($_POST['roomtype'])){


    $hostelID=$_POST['hostelId'];
    $roomtype=$_POST['roomtype'];

    $query=mysqli_query($conn,"SELECT price FROM roomtypes WHERE hostelID='$hostelID' AND roomtype='$roomtype'");
    while($row=mysqli_fetch_assoc($query)){
        $price=$row['price'];
      }
echo $price;
}





/*$hostelID=$_REQUEST['hostelid'];
$roomtype=$_REQUEST['roomtype'];
echo $roomtype;
echo $hostelid;

if($hostelID!=''&& $roomtype!=''){
$query=mysqli_query($conn,"SELECT price FROM roomtypes WHERE hostelID='$hostelID' AND roomtype='$roomtype'");
$row = mysqli_fetch_assoc($query);
$price=$row['price'];

}
$result=array("$price");
$jsonprice=json_encode($result);
echo $jsonprice;*/
?>