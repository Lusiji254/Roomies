<?php
include('config.php');

$id = $_POST['id'];

$sql= "SELECT * FROM booking WHERE id='$id'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>