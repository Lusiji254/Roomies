<?php 
include('config.php');

$sql="SELECT * FROM booking";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if(isset($_POST['search']['value'])){

    $search_value = $_POST['search']['value'];
    $sql .="WHERE hostel like '%".$search_value."%'";
    $sql .="OR room_type like '%".$search_value."%'";
    $sql .="OR move_in_date like '%".$search_value."%'";
    $sql .="OR booked_by like '%".$search_value."%'";
    $sql .="OR status like '%".$search_value."%'";
   
}

if(isset($_POST['order']))
{
    $column = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .="ORDER BY '".$column."' ".$order;
}

$data = array();

$run_query = mysqli_query($conn,$sql);
$filtered_rows= mysqli_num_rows($run_query);

while($row = mysqli_fetch_assoc($run_query)){
    $subarray = array();
    $subarray[]= $row['booking_ID'];
    $subarray[]= $row['hostel'];
    $subarray[]= $row['room_type'];
    $subarray[]= $row['move_in_date'];
    $subarray[]= $row['booked_by'];
    $subarray[]= $row['status'];
    $subarray[]= '<button type="button" id="'.$row['booking_ID'].'"  class="btn btn-sm btn-info editBtn">Edit</button>
     <button type="button" data-user_status="'.$row['status'].'" data-id="'.$row['booking_ID'].'" class="btn btn-sm btn-danger disableBtn">Disable</button>';
     $data[]= $subarray;
     }

     $output=array(
        'data'=>$data,
        'recordsTotal'=>$count,
        'recordsFiltered'=>$filtered_rows,
    );
 
    echo json_encode($output);
    
 ?>