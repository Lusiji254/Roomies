<?php 
include('config.php');

$sql="SELECT * FROM user";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if(isset($_POST['search']['value'])){

    $search_value = $_POST['search']['value'];
    $sql .="WHERE first_name like '%".$search_value."%'";
    $sql .="OR last_name like '%".$search_value."%'";
    $sql .="OR email like '%".$search_value."%'";
    $sql .="OR phone_number like '%".$search_value."%'";
    $sql .="OR gender like '%".$search_value."%'";
    $sql .="OR password like '%".$search_value."%'";
    $sql .="OR user_role like '%".$search_value."%'"; 
    $sql .="OR user_status like '%".$search_value."%'"; 
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
    $subarray[]= $row['id'];
    $subarray[]= $row['first_name'];
    $subarray[]= $row['last_name'];
    $subarray[]= $row['email'];
    $subarray[]= $row['phone_number'];
    $subarray[]= $row['gender'];
    $subarray[]= $row['password'];
    $subarray[]= $row['user_role'];
    $s = $row['user_status'] == 'Active' ? 'success' : 'danger';
    $btnColor = $row['user_status'] == 'Active' ? 'danger' : 'success';
    $d = $row['user_status'] == 'Active' ? 'Disable' : 'Enable';
    $subarray[]=  '<span class="badge bg-'. $s .'">'. $row['user_status'] .'</span>';
    $subarray[]= '<button type="button" id="'.$row['id'].'" data-bs-toggle="modal" data-bs-target="#editUserModal" class="btn btn-sm btn-info editBtn">Edit</button>
     <button type="button" data-user_status="'.$row['user_status'].'" data-id="'.$row['id'].'" class="btn btn-sm btn-'. $btnColor .' disableBtn">'. $d .'</button>';
     $data[]= $subarray;
     }

     $output=array(
        'data'=>$data,
        'recordsTotal'=>$count,
        'recordsFiltered'=>$filtered_rows,
    );
 
    echo json_encode($output);
    
 ?>