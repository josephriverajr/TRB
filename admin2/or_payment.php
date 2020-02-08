<?php
session_start();
$username1 = $_SESSION["username"];
/*$id = $_SESSION["id"]*/;
require ("../database.php");
$con = mysqli_connect($servername, $username, $password, $database);
$userid = $_GET['userid'];
/* echo $userid;*/
$sql_insp = 'select * from tricycle_operator where status = 1 and id_no = "'.$userid.'" ';

      $statement = $connection->prepare($sql_insp);
      $statement->execute();
      $or_payments = $statement->fetchAll(PDO::FETCH_OBJ);
foreach($or_payments as $package):
    $fname= $package->first_name;
    $mname= $package->middle_name;
    $lname= $package->last_name;
    $fullname= $lname .', '. $fname .' '.$mname;
    $house_no = $package->house_no;
    $street = $package->street;
    $barangay = $package->barangay;
    $city= $package->city;
    $full_add =  $house_no .' '. $street .' '.$barangay.' '.$city;
endforeach;

if(isset($_POST['btn_submit_sum']))
{



 $reg_fee = ' ';
  $mch = ' ';
  $reg_sticker = ' ';
  $petition = ' ';
  $confirmation = ' ';
  $inspection = ' ';
  $supervision = ' ';
  $fare_sticker = ' ';
  $plate_sticker = ' ';
  $total_amount = ' ';
    $others =' ';
  $sticker_no = ' ';

  $reg_fee = $_POST['reg_fee'];
  $mch = $_POST['mch'];
  $reg_sticker = $_POST['reg_sticker'];
  $petition = $_POST['petition'];
  $confirmation = $_POST['confirmation'];
  $inspection = $_POST['inspection'];
  $supervision = $_POST['supervision'];
  $fare_sticker = $_POST['fare_sticker'];
  $plate_sticker = $_POST['plate_sticker'];
  $total_amount = $_POST['total_amount'];
    $others = $_POST['others'];
  $sticker_no = $_POST['sticker_no'];


  $insert = mysqli_query($con,"INSERT INTO or_payments VALUES  (NULL, '".$userid."', '".$reg_fee."', '".$mch."', '".$reg_sticker."', '".$petition."', '".$confirmation."' , '".$inspection."', '".$supervision."', '".$fare_sticker."', '".$plate_sticker."', '".$others."', '".$total_amount."', '".$sticker_no."', NOW(), 1 );") or die(mysqli_error($con));
  $update = mysqli_query($con,"UPDATE tricycle_operator SET status = 2 WHERE id_no = '".$userid."';") or die(mysqli_error($con));
/*
  echo "INSERT INTO or_payments VALUES (NULL, '".$userid."', '".$reg_fee."', '".$mch."', '".$reg_sticker."', '".$petition."', '".$confirmation."' ,'".$inspection."', '".$supervision."', '".$fare_sticker."', '".$plate_sticker."', '".$others."', '".$total_amount."', '".$sticker_no."', NOW() );";*/
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

  <title>Admin2</title>

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
            <h1 class="h3 mb-0 text-gray-800">ORDER OF PAYMENTS</h1>
          </div>
          <div class="row" style="margin-top:1%;width: 100%; display: block !important;">
            <form method="POST" id="application_form">
              <div class="form-group row">
                <div class="col-sm-2">
                  <label style="margin-left:30%;">Name of Applicant:</label>
                </div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="toda" placeholder="Toda" value="<?php echo $fullname?>"  style="margin-left:0%;"disabled>
                </div>
                <br>
              </div>
              <div class="form-group row">
                <div class="col-sm-2">
                  <label style="margin-left:30%;">Address:</label>
                </div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="toda" placeholder="Toda" value="<?php echo $full_add?>" disabled>
                </div>
                <br>
              </div>
              <div class="form-group row">
                <div class="col-sm-8">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input checks" id="customCheck1" name="reg_fee" value="150">
                    <label class="custom-control-label " for="customCheck1" style="margin-left:30%; margin-top: 1%;">Registration Fee: </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label style="margin-left:60%; margin-top: 5%;">₱ 150.00</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="mch" value="100">
                    <label class="custom-control-label checks" for="customCheck2" style="margin-left:30%;">MCH Franchise Permit: </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label style="margin-left:60%">₱ 100.00</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="reg_sticker" value="200">
                    <label class="custom-control-label checks" for="customCheck3" style="margin-left:30%;">Registrion Sticker </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label style="margin-left:60%">₱ 200.00</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="petition" value="300">
                    <label class="custom-control-label checks" for="customCheck4" style="margin-left:30%;">Petition </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label style="margin-left:60%">₱ 300.00</label>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="confirmation" value="300">
                    <label class="custom-control-label checks" for="customCheck5" style="margin-left:30%;">Confirmation </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label style="margin-left:60%">₱ 300.00</label>
                </div>
              </div>

          <div class="form-group row">
            <div class="col-sm-8">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck6" name="inspection" value="500">
                <label class="custom-control-label checks" for="customCheck6" style="margin-left:30%;">Inspection </label>
              </div>
             </div>
             <div class="col-sm-2">
               <label style="margin-left:60%">₱ 500.00</label>
             </div>
            </div>

          <div class="form-group row">
            <div class="col-sm-8">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck7" name="supervision" value="1500">
                <label class="custom-control-label checks" for="customCheck7" style="margin-left:30%;">Supervision Fee </label>
              </div>
             </div>
        <div class="col-sm-2">
          <label style="margin-left:60%">₱ 1,500.00</label>
        </div>

            </div>


          <div class="form-group row">
            <div class="col-sm-8">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck8" name="fare_sticker" value="100">
                <label class="custom-control-label checks" for="customCheck8" style="margin-left:30%;">Fare Rate Sticker </label>
              </div>
             </div>
        <div class="col-sm-2">
          <label style="margin-left:60%">₱ 100.00</label>
        </div>

            </div>

                <div class="form-group row">
                  <div class="col-sm-8">
                    <div class="custom-control custom-checkbox mb-3">
                       <input type="checkbox" class="custom-control-input" id="customCheck9" name="plate_sticker" value="100">
                      <label class="custom-control-label checks" for="customCheck9" style="margin-left:30%;">Plate Sticker </label>
                    </div>
                   </div>
              <div class="col-sm-2">
                <label style="margin-left:60%;">₱ 100.00</label>
              </div>
            </div>

           <div class="form-group row">
             <div class="col-sm-8">
             </div>
             <div class="col-sm-2">
               <!-- <h4 style="text-align: center;">Total: ₱ <span id="tots">0.00</span></h4> -->
               <input type="text" name="total_amount"  class="form-control" id= "tots" placeholder="Total" readonly="" style="margin-left:0%;" >
             </div>
           </div>

           <div class="form-group row">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-8">
               <textarea class="form-control" name="others" placeholder="Others" style="margin-left:0%;"></textarea>
             </div>
           </div>

           <div class="form-group row">
             <div class="col-sm-2">
               <label style="margin-left:30%;">Sticker Number:</label>
             </div>
             <div class="col-sm-4">
               <input type="text" class="form-control" name="sticker_no" placeholder="Sticker Number">
             </div>
           </div>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
           <script type="text/javascript">
            var total = 0;
            $(document).on("click", ".custom-control-input", function() {
              if ($(this).prop('checked') == true) {
                total += Number($(this).attr("value"));
              } else if ($(this).prop('checked') == false) {
                total -= Number($(this).attr("value"));
              }
              $('#tots').val( total.toLocaleString() );
            });
           </script>
           <input type="submit" name="btn_submit_sum" id="btn_submit" value="Submit" class="btn btn-success"  style="margin-left: 70%; width: 170px; margin-bottom: 1%;">
           <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-bottom:1%;"><a href="http://localhost:8080/trb/admin2/"> Close</a></button>
          </form>
          </div>
        </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
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
