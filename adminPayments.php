<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.css"/>
 
        <title>Admin Bookings</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg light " id="mainNav">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <H4>Roomies</H4>
                <p><ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="adminUser.php">Users</a></li>
          <li class="nav-item"><a class="nav-link" href="adminHostel.php">Hostels</a></li>
          <li class="nav-item"><a class="nav-link" href="adminBookings.php">Bookings</a></li>
          <li class="nav-item"><a class="nav-link" href="adminPayments.php">Payment</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>  
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
      <h4 class="text-center"> Admin Payments</h4>
  <div class="container-fluid" style="margin-top: 10px;">
    <div class="row">
      <div class="container">
        <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-10">
         
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <table id="paymentTable" class="table" style="width:100%; ">
              <thead>
                <tr>
                    <th>Payment Id</th>
                    <th>Email</th>
                    <th>Booking_ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                   
                    
                </tr>
            </thead>
            <tbody>
              
            </tbody>
            </table>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript">
    $('#paymentTable').DataTable({
      //'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
'url':'fetch_payment.php',
'type':'post',

      },
      'fnCreateRow':function(nRow,aData,iDataIndex){

        $(nRow).attr('payment_ID', aData[0]);

      },
      'columnDefs':[{
        'target':[0,5],
        'orderable':false,
      }]
    });
    </script>
  </body>
</html>