<?php
include('config.php');
$user_status=$_POST['user_status'];
$id=$_POST['id'];

if($_POST['action']=='change_status'){
    $status = '';
    if($_POST['user_status']== 'Active'){
        $status = 'Inactive';
    }else{
        $status = 'Active';  
    }
    $sql="UPDATE `user` SET `user_status` = '$status' WHERE `user`.`id` = '$id'";
    $query = mysqli_query($conn,$sql);
    //$result= mysqli_fetch_assoc($query);

    if(isset($query)){
        echo '<div class="alert alert-success">User status has been set to <strong>'.$status.'</strong></div>';
    }
}

?>