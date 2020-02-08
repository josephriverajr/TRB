
<?php
session_start();
$username1 = $_SESSION["username"];
/*$id = $_SESSION["id"]*/;
require ("../database.php");
$con = mysqli_connect($servername, $username, $password, $database);
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Treasury</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php require('nav.php');  ?>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tricycle Regulatory Board System (Treasury)</h1> 
      
            
          </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
       
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTables-example tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

          });
          });
          </script>
          <div style="float: right;">
          <input id="myInput" type="text" placeholder="Search.." style="display: ;">
          </div>
          <?php
require ("../database.php");
$con = mysqli_connect($servername, $username, $password, $database);

$result = ' SELECT *
            FROM tricycle_operator
            INNER JOIN or_payments ON tricycle_operator.id_no = or_payments.id_no;';
  $statement = $connection->prepare($result);
      $statement->execute();
      $payments = $statement->fetchAll(PDO::FETCH_OBJ);   

   
     /*       WHERE tricycle_operator.status = 2

*/

echo "<table border='1'  class='table table-striped table-bordered table-hover' id='dataTables-example' style='display:none;' >
<tr>

<th><b>Toda</b></td></th>
<th><b>Toda #</b></td></th>
<th><b>Full Name</b></td></th>
<th><b>Full Address</b></td></th>
<th><b>Total</b></td></th>
<th><b>Status</b></td></th>
<th><b>Actions</b></td></th>
";
   foreach($payments as $package):   
      
      $fname= $package->first_name;
      $mname= $package->middle_name;
      $lname= $package->last_name;
      $fullname= $lname .', '. $fname .' '.$mname;
      $house_no = $package->house_no;
      $street = $package->street;
      $barangay = $package->barangay;
      $city= $package->city;                          
      $full_add =  $house_no .' '. $street .' '.$barangay.' '.$city;
      $stats= $package->status;
      if($stats == 2)
      {
        $new_stat= "Waiting for payment";
      }
      else if($stats == 5)
      {
        $new_stat= "Paid";
      }
/*      $amount = number_format($package->total_amount,2);*/
    echo "<tr id=".$package->id_no.">";
    echo "<td >".$package->toda."</td>";
    echo "<td >".$package->toda_no."</td>";
    echo "<td >".$fullname."</td>";
    echo "<td >".$full_add."</td>";
    echo "<td >".$package->total_amount."</td>";
    echo "<td >".$new_stat."</td>";
  echo "<td ><a href='or_payment.php?userid=".$package->id_no."'></a>
   <a onclick='myFunction()' id='sss' href='approve_entry.php?userid=".$package->id_no." '>To Admin / Atty</a>
      </td>";
  
 endforeach;
 echo "</table>";
?>
<script type="text/javascript">
  
  function myFunction() {  
    var txt;
  var r = confirm("Press a button!");
    if (r == true) {
     /*document.getElementById("sss").href = "https://www.w3schools.com";*/
  } else {
    document.getElementById("sss").href = "#";

  
}}
</script>
         <div class="fetch-payments" >
          </div>
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
