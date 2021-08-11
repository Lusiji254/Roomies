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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.css" />

  <title>Admin User</title>
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
  <h4 class="text-center"> User Management</h4>
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <button type="button" style="margin-bottom:40px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
              Add User
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <span id="message"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <table id="datatable" class="table" style="width:100%; ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Password</th>
                  <th>User Role</th>
                  <th>User Status</th>
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



  <!--Add user-->
  <!-- Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveUserForm" action="javascript:void();" method="post">
          <div class="modal-body">
            <div class="mb-3 row">
              <label for="inputFirstname" class="col-sm-4 col-form-label">First Name</label>
              <div class="col-sm-10">
                <input type="text" name="firstName" class="form-control" id="inputFirstName" value="" required>
              </div>
              <div class="mb-3 row">
                <label for="inputLastname" class="col-sm-4 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="lastName" class="form-control" id="inputLastName" value="" required>
                </div>
                <div class="mb-3 row">
                  <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail" value="" required>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPhoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="tel" name="phoneNumber" class="form-control" id="inputPhoneNumber" value="" required>
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
                      </div>

                    </fieldset>

                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="inputPassword" required>
                      </div>
                    </div>
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-4 pt-0">Role</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" id="gridRadios2h" value="H" required>
                          <label class="form-check-label" for="gridRadios2h">
                            Hostel Owner
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" id="gridRadios2s" value="S">
                          <label class="form-check-label" for="gridRadios2s">
                            Student
                          </label>
                        </div>
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
  <!--End User modal-->
  <!--Edit User-->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editUserForm" action="javascript:void();" method="post">
          <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
            <input type="hidden" id="trid" name="trid" value="">
            <div class="mb-3 row">
              <label for="inputFirstname" class="col-sm-4 col-form-label">First Name</label>
              <div class="col-sm-10">
                <input type="text" name="_firstName" class="form-control" id="_inputFirstName" value="" required>
              </div>
              <div class="mb-3 row">
                <label for="inputLastname" class="col-sm-4 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" name="_lastName" class="form-control" id="_inputLastName" value="" required>
                </div>
                <div class="mb-3 row">
                  <label for="_inputEmail" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="_email" class="form-control" id="_inputEmail" value="" required>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPhoneNumber" class="col-sm-4 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="tel" name="_phoneNumber" class="form-control" id="_inputPhoneNumber" value="" required>
                    </div>
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="_gender" id="_gridRadios2f" value="F" required>
                          <label class="form-check-label" for="gridRadios2f">
                            Female
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="_gender" id="_gridRadios2m" value="M">
                          <label class="form-check-label" for="gridRadios2m">
                            Male
                          </label>
                        </div>
                      </div>

                    </fieldset>

                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="_password" id="_inputPassword" required>
                      </div>
                    </div>
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-4 pt-0">Role</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="_role" id="_gridRadios2h" value="H" required>
                          <label class="form-check-label" for="gridRadios2h">
                            Hostel Owner
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="_role" id="_gridRadios2s" value="S">
                          <label class="form-check-label" for="gridRadios2s">
                            Student
                          </label>
                        </div>
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


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
  <script type="text/javascript">
    $('#datatable').DataTable({
      //'serverSide':true,
      'processing': true,
      'paging': true,
      'order': [],
      'ajax': {
        'url': 'fetch_user.php',
        'type': 'post',

      },
      'fnCreateRow': function(nRow, aData, iDataIndex) {

        $(nRow).attr('id', aData[0]);

      },
      'columnDefs': [{
        'target': [0, 5],
        'orderable': false,
      }]
    });
  </script>

  <script type="text/javascript">
    $(document).on('submit', '#saveUserForm', function(event) {
      event.preventDefault();
      var firstname = $('#inputFirstName').val();
      var lastname = $('#inputLastName').val();
      var email = $('#inputEmail').val();
      var phonenumber = $('#inputPhoneNumber').val();
      var gender = $('input[name= "gender"]').val();
      var password = $('#inputPassword').val();
      var role = $('input[name= "role"]').val();

      if (firstname != '' && lastname != '' && email != '' && phonenumber != '' && gender != '' && password != '' && role != '') {

        $.ajax({
          url: 'addUser.php',
          data: {
            firstname: firstname,
            lastname: lastname,
            email: email,
            phonenumber: phonenumber,
            gender: gender,
            password: password,
            role: role
          },
          type: 'post',
          success: function(data) {

            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              table = $('#datatable').DataTable();
              alert("User added successfully");
              $('#addUserModal').modal('hide');
            }
          }
        });
      }
    });
  $(document).ready(function(){
    $(document).on('click', '.editBtn', function(event) {
         var id = $(this).attr('id');

         $('#editUserModal').show();
      
    });
  });
  $(document).on('click','.disableBtn',function(){
    var id = $(this).data('id');
    var user_status =$(this).data('user_status');

    var action = 'change_status';
    $('#message').html('');
    if(confirm("Are you sure you want to change user status?")){

      $.ajax({
        url:'disable_user.php',
        type:'post',
        data:{id:id,user_status:user_status,action:action},
        success:function(data){
        
          $('#message').html(data);
          
                 }
        
    }); 
  }   
  });
  </script>

</body>

</html>