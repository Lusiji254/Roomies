<?php
include('config.php');

$ID = $_POST['id'];

$sql= "SELECT * FROM user WHERE id='$ID'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>