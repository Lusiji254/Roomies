<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }
    include ('config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         
        <title>Admin Dashboard</title>
    </head>
    <body>
    <div class="container text-left">

<p style="text-align: end;"><?php
echo $_SESSION['login_user'] ?></p>
 <p style="text-align: end;"><a href="logout.php">Log Out</a></p>
</div>
        <div class="container-fluid" style="margin-top: 60px;" >
            <div class="row">
        <nav class="col-sm-2">
<div class="d-flex" id="wrapper">
   <!--side bar-->
   <div class="bg-white">
       <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
           <i class="fa fa-bed"></i> Roomies

       </div>
       <div class="list-group list-group-flush my-3">
           <a href="" class="list-group-item list-group-item-action bg-transparent second-text active">
               <i class="fas fa-tachometer-alt me-2"></i>Dashboard
           </a>
           <a href="profile.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
           <i class="fa fa-address-book me-2"></i>Profile
        </a>
        <a href="AdminPassReset.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-key me-2"></i>Password Reset
        </a>
           <a href="adminUser.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-users me-2"></i>Users
        </a>
        <a href="adminHostel.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-home me-2"></i>Hostels
        </a>
        <a href="adminBookings.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-bookmark me-2"></i>Bookings
        </a>
        <a href="adminPayments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-wallet me-2"></i>Payments
        </a>
       </div>
   </div>


</div>
        </nav>

        <div class="col-sm-9 col-md-10">
<div class="row">
   

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary">
        <div class="card-body bg-primary">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Registered Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                       
                
                            $query = "SELECT id FROM user ORDER BY id";  
                            $query_run = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h4> Total Users: '.$row.'</h4>';
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-primary text-uppercase mb-1">Total Registered Hostels</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                     
                
                            $query = "SELECT hostel_ID FROM hostels ORDER BY hostel_ID";  
                            $query_run = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h4> Total Hostels: '.$row.'</h4>';
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-bed fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-primary text-uppercase mb-1">Total Bookings Made</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                     
                
                            $query = "SELECT booking_ID FROM booking ORDER BY booking_ID";  
                            $query_run = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h4> Total Bookings: '.$row.'</h4>';
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-bookmark fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-primary text-uppercase mb-1">Total Payments Made</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                     
                
                            $query = "SELECT payment_ID FROM payments ORDER BY payment_ID";  
                            $query_run = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h4> Total Payments: '.$row.'</h4>';
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-credit-card fa-2x text-gray-300"></i>
                </div>
            </div>
      
    </div>
</div>
</div>
</div>
<div class="mx-5 mt-5 text-center">
    <p class="bg-dark text-white p-2">Users</p>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>User Status</th>
            </tr>
        </thead>
    <?php
    $sql="SELECT first_name, last_name, email, user_status FROM user";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){ ?>

        <tr>
        <td><?php echo $row['first_name']?></td>
          <td><?php echo $row['last_name']?></td>
          <td><?php echo $row['email']?></td>
          <?php
          $s = $row['user_status'] == 'Active' ? 'success' : 'danger';?>
          <td><?php echo  '<span class="badge bg-'. $s .'">'. $row['user_status'] .'</span>';?></td>
    <?php } ?>
</div>
        </div>

        </div>
</div>







        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>