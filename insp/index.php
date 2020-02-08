<?php
session_start();
$username1 = $_SESSION["username"];
/*$id = $_SESSION["id"]*/;
require ("../database.php");
$con = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['btn_submit_sum']))
{
  $toda_no = $_POST['toda_no'];
  $toda = $_POST['toda'];
  $insert = mysqli_query($con,"INSERT INTO inspected VALUES  (NULL, '".$toda_no."','".$toda."', '".$username1 ."', NOW() , 1, '1') ;") or die(mysqli_error($con));
  echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Inspector</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php require('navigation.php');  ?>
    <!-- Sidebar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tricycle Regulatory Board System (Franchise - New)</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- registration Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="registration.php">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Franchise</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Registration</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- renewal card -->
            <div class="col-xl-2 col-md-6 mb-4">
              <a href="renewal.php">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">FRANCHISE</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Renewal</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sync fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- new card -->
            <div class="col-xl-2 col-md-6 mb-4">
              <a href="" data-toggle="modal" data-target="#myModal">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Franchise</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">New</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- <button style="float: right; margin: 1% 0;" class="btn btn-success" data-toggle="modal" data-target="#myModal">New</button> -->

            <!-- Change Unit -->
            <div class="col-xl-2 col-md-6 mb-4">
              <a href="change_unit.php">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Change </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Unit</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-copy fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>


          <!-- Change Ownership -->
          <div class="col-xl-3 col-md-6 mb-4">
            <a href="change_ownership.php">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Change</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> Ownership</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>

        <!-- </div> -->

  <!-- </div> -->
</div>


          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
          $("#filter").on("click", function() {
              $("#myInput").toggle();
               
            });
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

          });
          });
          </script>
          <div style="float:right;">
          <button style=" margin: 1% 0;" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add new</button>
          <input id="myInput" type="text" placeholder="Search.." style="display: block;">
          </div>
          <!-- Content Row -->
         <div class="modal fade" id="myModal" role="dialog">
           <div class="modal-dialog" role="document">
             <div class="modal-content">

               <div class="modal-header">
                 <h4 class="modal-title">New Franchise</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>

               <div class="modal-body">
                <div id="requirements">

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id=" ">
                    <label class="form-check-label" for="defaultCheck1">
                     Requirements for New Applicant
                    </label>
                    <ul>
                      <li>Terminal Clearance</li>
                      <li>Barangay Clearance</li>
                      <li>OR-CR</li>
                      <li>Voters Certificate</li>
                      <li>Cedula</li>
                      <li>Drug Test (Operator)</li>
                    </ul>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id=" " >
                    <label class="form-check-label" for="defaultCheck1">
                     Checklist Complete
                   </label><br>
                    <ul style="width: 50%; float:left;">
                      <li>Head Light</li>
                      <li>Signal Light</li>
                      <li>Brake Light</li>
                      <li>Horn</li>
                      <li>Chain Cover</li>
                      <li>Wind Shield</li>
                      <li>Side Car Side Mirror</li>
                      <li>Side Mirror MC</li>
                      <li>Wind Shield</li>
                    </ul>
                    <ul style="width: 50%; float:left;">
                      <li>Sidecar Body</li>
                      <li>Trash Can</li>
                      <li>Side Car Light</li>
                      <li>Muffler Original</li>
                      <li>Fare Rate Sticker</li>
                      <li>Plate Sticker</li>
                      <li>City MCH Sticker</li>
                    </ul>
                  </div>

                </div>
              </div> <!--end modal body -->

              <div class="modal-footer">
                <form method="POST" id="application_form">
                  <div class="form-group row" style="float: left">
                    <div class="col-sm-12" style="margin-bottom: 2%;">
                      <input type="text" class="form-control" name="toda" placeholder="Toda" required>
                    </div>
                    <div class="col-sm-12" style="margin-bottom: 2%;">
                      <input type="number" class="form-control" name="toda_no" placeholder="Toda No" required>
                    </div>

                    <div class="col-sm-12" style="margin-bottom: 2%;">
                      <input type="text" class="form-control" name="inspector" value="<?php echo $username1; ?>" disabled>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <input type="submit" name="btn_submit_sum" id="btn_submit" value="Submit" class="btn btn-success" style="float: right; width: 50%;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                  </div>
                </form>
              </div>

            </div>  <!--end modal content -->
          </div>  <!-- end modal dialog -->
        </div>  <!--end content-flow -->
        <!-- </div> -->

      <script type="text/javascript">
        $( document ).ready(function() {
          console.log( "ready!" );
          var countChecked = function () {
            var n = $("#requirements input:not(:checked)").length;
            /*alert(n);*/
            if (n == 0) {
              $("button#requirements_next, #application_form, .modal-footer").css({
                "visibility": "visible",
                "height":"auto"
              });
            } else {
              $("button#requirements_next, #application_form, .modal-footer").css({
                "visibility": "hidden",
                "height":"50px"
              });
            }
          };
          countChecked();
          $("#requirements input[type=checkbox]").on("click", countChecked);
        });
      </script>

      <!-- <button style="float: right; margin: 1% 0;" class="btn btn-success" data-toggle="modal" data-target="#myModal">New</button> -->


      <?php
      $sql = 'select * from inspected where status = 1';
      $statement = $connection->prepare($sql);
      $statement->execute();
      $packages = $statement->fetchAll(PDO::FETCH_OBJ);
      ?>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-top:1%;">
        <thead>
          <tr>
            <th>Toda & Toda No.</th>
            <th>Inspected by</th>
            <th>Date and Time</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php foreach($packages as $package): ?>
            <tr id="<?= $package->user_id; ?>">
              <td data-target="fullname"><?= $package->toda;?>  <?= $package->toda_no;?> </td>
              <td data-target="fullname"> <?= $package->inspector;?> </td>
              <td data-target="fullname"> <?= $package->ins_date;?> </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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

</body>

</html>
