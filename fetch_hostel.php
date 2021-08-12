<?php 
include('config.php');

$sql="SELECT * FROM hostels";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if(isset($_POST['search']['value'])){

    $search_value = $_POST['search']['value'];
    $sql .="WHERE hostel_ID like '%".$search_value."%'";
    $sql .="OR hostel_name like '%".$search_value."%'";
    $sql .="OR gender like '%".$search_value."%'";
    $sql .="OR location like '%".$search_value."%'";
    $sql .="OR tel_number like '%".$search_value."%'";
    $sql .="OR room_types like '%".$search_value."%'";
    $sql .="OR amenities like '%".$search_value."%'"; 
    $sql .="OR pictures like '%".$search_value."%'"; 
    $sql .="OR hostel_owner like '%".$search_value."%'"; 
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
    $subarray[]= $row['hostel_ID'];
    $subarray[]= $row['hostel_name'];
    $subarray[]= $row['gender'];
    $subarray[]= $row['location'];
    $subarray[]= $row['tel_number'];
    $subarray[]= $row['room_types'];
    $subarray[]= $row['amenities'];
    $subarray[]= $row['pictures'];
    $subarray[]= $row['hostel_owner'];
    $subarray[]= '<a href="javascript:void();" id="'.$row['hostel_ID'].'" class="btn btn-sm btn-info editBtn">Edit</a> <a href="javascript:void();" data-id="'.$row['hostel_ID'].'" class="btn btn-sm btn-danger">Disable</a>';
     $data[]= $subarray;
     }

     $output=array(
        'data'=>$data,
        'recordsTotal'=>$count,
        'recordsFiltered'=>$filtered_rows,
    );
 
    echo json_encode($output);
    
 ?>