<?php

$servername = "localhost";
$database = "trb_db";
$username = "root";
$password = "";

 //Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
 //Check connection
/*
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());

}
echo "Connected successfully";
mysqli_close($conn);

*/

//$con = mysqli_connect('localhost','root','','trb_db');
$connection = new PDO ("mysql:host=localhost;dbname=trb_db","root","");
// $sql = 'select * from user_account where (Active IS NOT NULL or Active = 1) AND
      // (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1)';
$sql = 'select * from user_account where (Active IS NOT NULL or Active = 1) AND (Deleted IS NULL OR Deleted != 1) ORDER BY `user_account`.`user_id` DESC';

$statement = $connection->prepare($sql);
$statement->execute();
$packages = $statement->fetchAll(PDO::FETCH_OBJ);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Account</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body id="page-top">

 <?php
require('navigation.php');  ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tricycle Regulatory Board System (User Account)</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>


          </div>
      



          <!-- Content Row -->
          <div class="container">
            <div class="row">
              <div class="row" style="margin-top:1%;">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-top:1%;">
                  <thead>
                    <tr>
                      <th  style="text-align:Center;">User ID </th>
                      <th  style="text-align:Center;">Name</th>
                      <th  style="text-align:Center;">Phone</th>
                      <th  style="text-align:Center;">Username</th>
                      <!-- <th width="20%" >Password</th> -->
                      <th  style="text-align:Center;">Admin</th>
                      <th  style="text-align:Center;">Blocked</th>
                      <!-- <th  style="text-align:Center;">Active</th> -->
                      <!-- <th  style="text-align:Center;">Deleted</th> -->
                      <th  style="text-align:Center;">Verified</th>
                      <th  style="text-align:Center;">Edit</th>

                      <th  style="text-align:Center;">Delete</th>
                    </tr>
                 </thead>
                    <tbody>
                      <?php foreach($packages as $package): ?>
                      <?php
                          $test= $package->isAdmin;
                          // echo $test;
                          if ($test == 0)
                          {
                            $test1 = "User";

                          }
                          else if ($test == 1)
                          {
                            $test1 = "Admin";
                          }
                          else
                          {
                            $test1 = "Responder";
                          }

                          $verified = $package->verified;
                          if($verified !=0)
                          {
                            $verified1 ="verified";
                          }
                          else
                          {
                            $verified1 = "not yet verified";
                          }




                      ?>

                  <tr id="<?= $package->user_id; ?>">
                      <td data-target="first_name" hidden><?= $package->first_name;?></td>
                      <!-- <td data-target="middle_name" hidden><?= $package->middle_name;?></td> -->
                      <td data-target="last_name" hidden><?= $package->last_name;?></td>
                      <td data-target="phone" hidden><?= $package->phone_no;?></td>
                      <td data-target="username" hidden><?= $package->username;?></td>
                      <!-- <td data-target="password" hidden><?= $package->password;?></td> -->
                      <td data-target="isAdmin" hidden><?= $package->isAdmin;?></td>
                      <td data-target="isBlocked" hidden><?= $package->isBlocked;?></td>
                      <td data-target="active" hidden><?= $package->active;?></td>
                      <td data-target="deleted" hidden><?= $package->deleted;?></td>
                      <td data-target="verified" hidden><?= $package->verified;?></td>

                      <td data-target="user-id" style="text-align:Center;"><?= $package->user_id;?></td>
                      <td data-target="name"><?= $package->first_name .' '. $package->last_name; ?></td>
                      <td data-target="phone"><?= $package->phone_no;?></td>
                      <td data-target="username"><?= $package->username;?></td>
                      <!-- <td data-target="isAdmin1"><?php echo ''.$test1; echo '-'.$verified1; ?></td> -->
                      <td data-target="isAdmin" style="text-align:Center;"><?= $package->isAdmin;?></td>
                      <td data-target="isBlocked" style="text-align:Center;"><?= $package->isBlocked;?></td>
                      <!-- <td data-target="active" style="text-align:Center;"><?= $package->active;?></td> -->
                      <!-- <td data-target="deleted" style="text-align:Center;"><?= $package->deleted;?></td> -->
                      <td data-target="verified" style="text-align:Center;"><?= $package->verified;?></td>
                      <td style="text-align:Center;">
                        <!--<a href="addnewpackage.php?package_id=<?= $package->package_id ?>" class="fa fa-plus-square" style="margin: 5px;"}"></a> -->
                        <a onclick="return confirm('Are you sure you want to VERIFY this entry?')" href="verified.php?user_id=<?= $package->user_id; ?>"><i class="fas fa-edit"> Verify</i></a>
                        &nbsp;  &nbsp;
                        <a onclick="return confirm('Are you sure you want to BLOCKED this entry?')" href="blocked.php?user_id=<?= $package->user_id; ?>"><i class="fas fa-user-lock"> Block</i></a>
                        <!-- <a href="tel:<?= $package->phoneNumber;?>">call</a> -->
                      </td >




                      <td style="text-align:Center;"><a onclick="return confirm('Are you sure you want to DELETE this entry?')" href="delete_user_account.php?user_id=<?= $package->user_id; ?>"><i class="fas fa-trash-alt"></i></a>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>© 2020 Copyright TRB System</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>



<!--
<script type="text/javascript">
function loadDoc() {
  setInterval(function(){
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);

 }
 loadDoc();
</script>
-->



<!-- 
<script type = "text/javascript">
    $(document).ready(function(){
      function load_unseen_notification(view = '')
      {
    $.ajax({
      url:"fetch.php",        // ../../responder/fetch.php
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {

      $('.dropdown-menu').html(data.notification);
      if(data.unseen_notification > 0){
         x.play();

      $('.count').html(data.unseen_notification);
      $(document).ready(function() {
      setInterval(function() {
    /*    cache_clear()*/
      }, 5000);
      });

      function cache_clear() {
      window.location.reload(true);
        }


      }
      else
      {
        x.pause();
      }

      }

    });

  }

  load_unseen_notification();

  $('#add_form').on('submit', function(event){
    event.preventDefault();
    if($('#first_name').val() != '' && $('#last_name').val() != ''  && $('#phone').val() != '' && $('#username').val() != '' && $('#isAdmin').val() != '' && $('#isBlocked').val() != '' && $('#verified').val() != ''){
    var form_data = $(this).serialize();
    $.ajax({
      url:"addnew.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
      $('#add_form')[0].reset();
      load_unseen_notification();
      }
    });
    }
    else{
      alert("Enter Data First");
    }
  });

  $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
  });

  setInterval(function(){
    load_unseen_notification();;
  }, 5000);

});
</script>



<script>
  $(document).ready(function(){

  function load_unseen_notification(view = '')
  {
    $.ajax({
      url:"fetch-user.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data)
      {

      $('.dropdown-menu1').html(data.notification);
      if(data.unseen_notification > 0){


      $('.count1').html(data.unseen_notification);
      $(document).ready(function() {

      });
      }


      }

    });

  }

  load_unseen_notification();

  $('#add_form').on('submit', function(event){
    event.preventDefault();
    if($('#email').val() != '' && $('#firstname').val() != ''  && $('#lastname').val() != ''){
    var form_data = $(this).serialize();
    $.ajax({
      url:"addnew.php",
      method:"POST",
      data:form_data,
      success:function(data)
      {
      $('#add_form')[0].reset();
      load_unseen_notification();
      }
    });
    }
    else{
      alert("Enter Data First");
    }
  });

  $(document).on('click', '.dropdown-toggle1', function(){
  $('.count1').html('');
  load_unseen_notification('yes');
  });



});


$(document).ready(function() {
    $( "li.dropdown1" ).click(function() {
    $( "ul.dropdown-menu1" ).toggle();



    })

});
</script>
 -->