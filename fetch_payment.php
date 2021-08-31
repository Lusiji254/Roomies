<?php 
include('config.php');

$sql="SELECT * FROM payments";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if(isset($_POST['search']['value'])){

    $search_value = $_POST['search']['value'];
    $sql .="WHERE payment_ID like '%".$search_value."%'";
    $sql .="OR user_email like '%".$search_value."%'";
    $sql .="OR booking_ID like '%".$search_value."%'";
    $sql .="OR amount like '%".$search_value."%'";
    $sql .="OR date like '%".$search_value."%'";
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
    $subarray[]= $row['payment_ID'];
    $subarray[]= $row['user_email'];
    $subarray[]= $row['booking_ID'];
    $subarray[]= $row['amount'];
    $subarray[]= $row['date'];
    $s = $row['status'] == 'paid' ? 'success' : 'danger';
    $subarray[]=  '<span class="badge bg-'. $s .'">'. $row['status'] .'</span>';
   
    //$subarray[]= '<button type="button" id="'.$row['booking_ID'].'"  class="btn btn-sm btn-info editBtn">Edit</button>
     //<button type="button" data-user_status="'.$row['status'].'" data-id="'.$row['booking_ID'].'" class="btn btn-sm btn-danger disableBtn">Disable</button>';
     $data[]= $subarray;
     }

     $output=array(
        'data'=>$data,
        'recordsTotal'=>$count,
        'recordsFiltered'=>$filtered_rows,
    );
 
    echo json_encode($output);
    
 ?>