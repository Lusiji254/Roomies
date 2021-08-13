<?php 
    session_start();
    if(!isset($_SESSION['login_user'])){
      header('location:Registration.html');
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
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminUser.php">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminHostel.php">Hostels</a></li>
                    <li class="nav-item"><a class="nav-link" href="adminBookings.php">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>  
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
      <h4 class="text-center"> Admin Bookings</h4>
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-10">
          <button type="button"  style="margin-bottom:40px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal">
     Add Booking
</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <table id="bookingtable" class="table" style="width:100%; ">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Hostel Name</th>
                    <th>Room Type</th>
                    <th>Move In date</th>
                    <th>Booked by</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
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
      <!--Add booking-->
      <div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveBookingForm" action="javascript:void();" method="post">
          <div class="modal-body">
            <div class="mb-3 row">
              <label for="inputHostelname" class="col-sm-4 col-form-label">Hostel Name</label>
              <div class="col-sm-10">
                <input type="text" name="hostelName" class="form-control" id="inputHostelName" value="" required>
              </div>
              <div class="mb-3 row">
                <label for="inputRoomType" class="col-sm-4 col-form-label">Room Type</label>
                <div class="col-sm-10">
                  <input type="text" name="roomType" class="form-control" id="inputRoomType" value="" required>
                </div>
                <div class="mb-3 row">
                  <label for="inputDate" class="col-sm-4 col-form-label">Move in Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="inputDate" class="form-control" id="inputDate" value="" required>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputBookedBy" class="col-sm-4 col-form-label">Booked by</label>
                    <div class="col-sm-10">
                      <input type="email" name="bookedBy" class="form-control" id="inputBookedBy" value="" required>
                    </div>
                    <div class="mb-3 row">
                    <label for="inputStatus" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <input type="text" name="status" class="form-control" id="inputStatus" value="" required>
                    </div>
                    
                    </fieldset>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
        </form>
      </div>
    </div>
  </div>

       <!--End add booking-->
       <!--Edit booking-->
<div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editBookingForm" action="javascript:void();" method="post">
            <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="trid" name="trid" value="">
              <div class="mb-3 row">
                <label for="inputHostelname" class="col-sm-4 col-form-label">Hostel Name</label>
                <div class="col-sm-10">
                  <input type="text" name="hostelName" class="form-control" id="_inputHostelName" value="" required>
                </div>
                <div class="mb-3 row">
                  <label for="inputRoomType" class="col-sm-4 col-form-label">Room Type</label>
                  <div class="col-sm-10">
                    <input type="text" name="roomType" class="form-control" id="_inputRoomType" value="" required>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputDate" class="col-sm-4 col-form-label">Move in Date</label>
                    <div class="col-sm-10">
                      <input type="date" name="inputDate" class="form-control" id="_inputDate" value="" required>
                    </div>
                    <div class="mb-3 row">
                      <label for="inputBookedBy" class="col-sm-4 col-form-label">Booked by</label>
                      <div class="col-sm-10">
                        <input type="email" name="bookedBy" class="form-control" id="_inputBookedBy" value="" required>
                      </div>
                      <div class="mb-3 row">
                      <label for="inputStatus" class="col-sm-4 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <input type="text" name="status" class="form-control" id="_inputStatus" value="" required>
                      </div>
                      
                      </fieldset>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
        </form>
      </div>
    </div>
  </div>
  <!--end edit booking-->
   
    
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript">
    $('#bookingtable').DataTable({
      //'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
'url':'fetch_booking.php',
'type':'post',

      },
      'fnCreateRow':function(nRow,aData,iDataIndex){

        $(nRow).attr('booking_ID', aData[0]);

      },
      'columnDefs':[{
        'target':[0,5],
        'orderable':false,
      }]
    });
    </script>
    <!--update booking-->
    <script type="text/javascript">
    $(document).on('submit', '#saveBookingForm', function(event) {
      event.preventDefault();
      var hostelname = $('#inputHostelName').val();
      var roomtype = $('#inputRoomType').val();
      var date = $('#inputDate').val();
      var bookedby = $('#inputBookedBy').val();
      var bookingStatus = $('#inputStatus').val();
      

      if ( hostelname != '' &&  roomtype != '' && date != '' && bookedby != '' && bookingStatus!= '') {

        $.ajax({
          url: 'addBooking.php',
          data: {
            hostelname:hostelname,
            roomtype:roomtype,
            date:date,
            bookedby:bookedby,
            bookingStatus:bookingStatus
          },
          type: 'post',
          success: function(data) {

            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              table = $('#bookingtable').DataTable();
              alert("Booking added successfully");
              $('#addBookingModal').modal('hide');
            }
            location.reload();
          }
        });
      }
    });
   
    $(document).ready(function(){
    $(document).on('click', '.editBtn', function(event) {
         var id = $(this).attr('booking_ID');

         $('#editBookingModal').show();
      $.ajax({
        url: 'get_single_booking.php',
        data:{id:id},
        type: "post",
        success: function(data) {

         data= JSON.parse(data);
          $('id').val(data.id);
          $('_inputHostelName').val(data.id);
          $('_inputRoomType').val(data.id);
          $('_inputDate').val(data.id);
          $('_inputBookedBy').val(data.id);
          $('_inputStatus').val(data.id);
             
        }
        

      });
    });
  });
    </script>


  </body>
</html>