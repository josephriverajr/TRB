<?php
session_start();
$username1 = $_SESSION["username"];
require ("../database.php");
$userid = $_GET['userid'];


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Board</title>

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
            <h1 class="h3 mb-0 text-gray-800">Tricycle Regulatory Board System (Administrator - Board)</h1>
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
              <a href="new.php">
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

        </div>

              <div class="container">
            <div class="row">
              <div class="row" style="margin-top:1%;width: 100%; display: block !important;">
            <form method="POST" id="application_form">

          <?php


$result = ' SELECT *
          FROM user_account
          WHERE deleted != 5
          AND verified = 1
          AND user_id = '.$userid.';';
$statement = $connection->prepare($result);
$statement->execute();
$edit = $statement->fetchAll(PDO::FETCH_OBJ);   
foreach($edit as $package):
        $acct_type =$package->isAdmin;

        if ($acct_type == 1) {
          # code...
          $acct_type = 'Admin 1';
        }
        else if ($acct_type == 2) {
          # code...
          $acct_type = 'Inspector';
        }
        else if ($acct_type == 3) {
          # code...
          $acct_type = 'Admin 2';
        }
        else if ($acct_type == 4) {
          # code...
          $acct_type = 'Atty';
        }
        else{
           $acct_type = 'treasury';
        }
if(isset($_POST['btn_submit_sum']))
{

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_no = $_POST['phone_no'];
$username = $_POST['username'];
$password = $_POST['password'];
$isAdmin = $_POST['isAdmin'];
$result = mysqli_query($con, "UPDATE user_account SET first_name='$first_name', last_name='$last_name', phone_no='$phone_no' , username='$username' , password='$password' , isAdmin='$isAdmin' WHERE user_id='$userid'  ");
if($result)
{
  echo "<script type='text/javascript'>alert('data updated');</script>";
  echo "<script type='text/javascript'>window.location.href = 'user_account.php';</script>";
}

}

                      ?>
            <div class="form-group row">

              <div class="col-sm-6">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?= $package->first_name;?>" >
              </div>
              
       
              <div class="col-sm-6">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?= $package->last_name;?>"  >
              </div>
           
            </div>

            <div class="form-group row">

              <div class="col-sm-6">
                <input type="text" class="form-control" name="phone_no" placeholder="House no" value="<?= $package->phone_no;?>" >
              </div>
                
              <div class="col-sm-6">
                <input type="email" class="form-control" name="username" placeholder="Street" value="<?= $package->username;?>">
              </div>
               
            </div>
             <div class="form-group row">

              <div class="col-sm-6">
                <input type="password" class="form-control" name="password" placeholder="Barangay" value="<?= $package->password;?>">
              </div>

              <div class="col-sm-6">
                <select class="form-control" name="isAdmin" >
                  <option value="<?= $package->isAdmin;?>" ><?php echo $acct_type; ?></option>
                  <option value="1" >Admin 1</option>
                  <option value="2" >Inspector</option>
                  <option value="3" >Admin 2 </option>
                  <option value="0" >Treasury </option>
                  <option value="4" >Atty </option>
                </select>
              </div>

            </div>  

              <?php   endforeach; ?>


            </div>

            <center>

            <input type="submit" name="btn_submit_sum" id="btn_submit" value="Submit" class="btn btn-success" style="float: unset; width: 150px; margin-right: 30px;">
              <input type="reset" value="Reset" style="float: unset; width: 150px; height: 40px; border: 0px;">


            </center>


         </form>
  </div>
  </section>
</div>



    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    </body>
  </html>
