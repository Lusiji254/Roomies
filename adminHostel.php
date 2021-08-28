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
 
        <title>Admin Hostel</title>
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
          <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
                </ul></p>
            </div>
            <?php 
      echo $_SESSION['login_user'] ?>
        </div>
            
        <p style="text-align: end;top: 0;"><a href="logout.php">Log Out</a></p>
</nav>
<h4 class="text-center"> Hostel Management</h4>
        <div class="container-fluid">
          
    <div class="row">
      <div class="container">
        <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-10">
          <button type="button"  style="margin-bottom:40px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHostelModal">
     Add Hostel
</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <table id="hosteltable" class="table" style="width:100%; ">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Hostel Name</th>
                    <th>Gender</th>
                    <th>Location</th>
                    <th>Telephone</th>
                    <th>Amenities</th>
                    <th>Pictures</th>
                    <th>Hostel Owner</th>
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
   
    
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript">
    $('#hosteltable').DataTable({
      //'serverSide':true,
      'processing':true,
      'paging':true,
      'order':[],
      'ajax':{
'url':'fetch_hostel.php',
'type':'post',

      },
      'fnCreateRow':function(nRow,aData,iDataIndex){

        $(nRow).attr('id', aData[0]);

      },
      'columnDefs':[{
        'target':[0,5],
        'orderable':false,
      }]
    });
    </script>
<!--ajax for add hostel-->
<script type="text/javascript">
$(document).on('submit','#saveHostelForm',function(event){
  event.preventDefault();
  var hostelname =$('#inputHostelName').val();
  var gender =$('input[name= "gender"]').val();
  var location =$('#inputLocation').val();
  var telephone =$('#inputTelephone').val();
  var amenities =$('#inputAmenities').val();
  var picture =$('#inputPicture').val().split('.').pop().toLowerCase();
  var hostelowner =$('#inputHostelOwner').val();
 if(picture !=''){
   if(jQuery.inArray(picture,['gif','png','jpg','jpeg']) ==-1){
     alert("Invalid Image File");
     $('#inputPicture').val('');
     return false;
   }
 }

  if(hostelname !=''&& gender !=''&& location!=''&& telephone !=''&& roomtype !=''&& amenities !=''&& hostelowner !=''){

$.ajax({
  url:'addHostel.php',
  data:{hostelname:hostelname,gender:gender,location:location,telephone:telephone,roomtype:roomtype,amenities:amenities,hostelowner:hostelowner},
  type:'post',
  processData: false,
 contentType: false,
  success:function(data){


if(status =='success'){
  table = $('#hosteltable').DataTable();
  table.destroy();
  table.draw();
  alert("Hostel added successfully");
  $('#addHostelModal').modal('hide');
}
location.reload();
  }
});
  }
});

</script>

<!--Add hostel-->
<!-- Modal -->
<div class="modal fade" id="addHostelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Hostel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="saveHostelForm" action="javascript:void();" method="post">
      <div class="modal-body">
              <div class="mb-3 row">
            <label for="inputHostelName" class="col-sm-4 col-form-label">Hostel Name</label>
            <div class="col-sm-10">
              <input type="text" name="hostel" class="form-control" id="inputHostelName" value="" required>
            </div>
            <fieldset class="row mb-3">
          <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="gridRadios2f" value="F" required>
              <label class="form-check-label" for="gridRadios2f">
                Female
              </label>
            </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gridRadios2m" value="M">
                <label class="form-check-label" for="gridRadios2m">
                  Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gridRadios2M" value="Mixed">
                <label class="form-check-label" for="gridRadios2m">
                Mixed
                </label>
            </div>
          </div>
          
        </fieldset>
            <div class="mb-3 row">
            <label for="inputLocation" class="col-sm-4 col-form-label">Location</label>
            <div class="col-sm-10">
              <input type="text" name="location" class="form-control" id="inputLocation" value=""required>
            </div>
            <div class="mb-3 row">
            <label for="inputPhoneNumber" class="col-sm-4 col-form-label">Telephone</label>
            <div class="col-sm-10">
              <input type="tel" name="telephone" class="form-control" id="inputTelephone" value=""required>
            </div>
            <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-4 pt-0">Room Type</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="roomtype" id="gridCheckbox2S" value="Single Room" required>
              <label class="form-check-label" for="gridRadios2S">
               Single Room
              </label>
            </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roomtype" id="gridCheckbox2D" value="Double Room">
                <label class="form-check-label" for="gridCheckbox2D">
              Double Room
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roomtype" id="gridCheckbox2Q" value=" Quadruple Room">
                <label class="form-check-label" for="gridCheckbox2Q">
                Quadruple Room
                </label>
            </div>
          </div>
          
        </fieldset>
            <div class="mb-3 row">
            <label for="inputAmenities" class="col-sm-4 col-form-label">Amenities</label>
            <div class="col-sm-10">
              <input type="text" name="amenities" class="form-control" id="inputAmenities" value=""required>
            </div>
       
        <div class="mb-3 row">
          <label for="inputPicture">Picture</label>
          <input type="file" class="form-control-file" id="inputPicture">
        </div>
       <div class="mb-3 row">
            <label for="inputHostelOwner" class="col-sm-4 col-form-label">Hostel Owner</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="hostelOwner" id="inputHostelOwner" required>
            </div>
          </div>
         
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!--End Hostel modal-->
    </body>
    </html>