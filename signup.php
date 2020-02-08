<?php

$con = mysqli_connect('localhost','root','','trb_db');
$password ='';
  if(isset($_POST['btn_submit']))
    {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      //$month = $_POST['month'];
      //$day = $_POST['day'];
      //$year = $_POST['year'];
      //$gender = $_POST['gender'];
      $phone_no = $_POST['phone_no'];
      $email_address = $_POST['email_address'];
      $password = $_POST['password'];
      $isAdmin = "0";
      $isBlocked ="0";
      $active = "1";
      $deleted = "0";
      $verified = "0";
      $insert = mysqli_query($con,"INSERT INTO trb_db.user_account VALUES(NULL,'".$fname."' ,'".$lname."', '".$phone_no."' ,'".$email_address."' ,'".$password."', '".$isAdmin."' ,'".$isBlocked."' ,'".$active."' ,'".$deleted."' ,'".$verified."');") or die(mysqli_error($con));
      $message = "Thank you for registering. The System Administrator will email you when your request is already validated.";
      echo "<script type='text/javascript'>alert('$message');</script>";

    
      $insert2 = mysqli_query($con,"INSERT INTO trb_db.new_user VALUES(NULL,'".$email_address."','".$fname."' ,'".$lname."', 0);") or die(mysqli_error($con));
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>TRB Signup</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<style>
  footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: red;
    color: white;
    /* text-align: center; */
  }
</style>

</head>

<body>
  <nav class="red" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo white-text">TRB</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php" class="white-text">Back</a></li>
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Login</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  <div class="container">
    <section id="signUp" class="section section-signUp scrollspy">
      <div class="container">
        <h4 class="header center blue-text">Sign up a new Account</h4>
        <div class="row">
          <!--<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 20px 32px 20px; border: 1px solid #EEE; align-center">-->
          <form class="col s12" id="reg-form" method="POST">
            <center><h5>Please fill out this form</h5></center>
            <div class="row">
              <div class="input-field col s6 m6">
                <input id="fname" name="fname" type="text" class="validate" required>
                <label for="fname">First Name</label>
              </div>
              <div class="input-field col s6 m6">
                <input id="lname" name="lname" type="text" class="validate" required>
                <label for="lname">Last Name</label>
              </div>

              <div class="input-field col s12 m12">
                <input type="email" name="email_address" id='email_address'  onkeyup =" emailExist();" class="validate" required>
                <label for="email">Email Adress</label>
                <span id="success_message" class=" " style="font-size: 8pt; color:red; display: none;"></span>
              </div>

              <div class="input-field col s6 m16">
                <input id="password" type="password" name="password" class="validate" minlength="8" required>
                <label for="password">Password</label>
              </div>

              <div class="input-field col s6 m6">
                <input id="phone_no" type="text" class="validate" name="phone_no" onblur="phoneExist();"  onkeypress="return isNumber(event);"  minlength="11" maxlength="11" required>
                <label for="phone_no">Phone Number</label>
                <span id="success_message1" class=" " style="font-size: 8pt; color:red; display: none;"></span>
              </div>
            </div>



      <div class="input-field col s12 right-align" id="enable">
        <button class="btn btn-large btn-register waves-effect waves-light blue" id="Register"  name="btn_submit" >Register
          <i class="material-icons right">send</i>
        </button>
          <a href="JavaScript:Void(0);"  class="btn btn-large btn-register waves-effect waves-light blue" id="Register-alert" onclick="Register_alert();" style="display: none" >
            Register
            <!-- <i class="material-icons right">send</i> -->
          </a>
          <input type="reset" id="reset" class="btn-flat blue-text waves-effect"/>
      </div>

    </form>
    </div>
  </div>
  </section>
</div>



<footer class="page-footer blue">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">City Government of San Juan</h5>
              <p class="grey-text text-lighten-4">Pinaglaban cor P. Narciso St. Barangay Corazon de Jesus,</p>
              <p class="grey-text text-lighten-4">San Juan City, Metro Manila Philippines</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Made by</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Atong Francisco</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Julios Sagadal</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Lourdes Santiago</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Richard Abraham</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">

          <a class="grey-text text-lighten-4 right" href="#!">© 2020 Copyright TRB System</a>
          </div>
        </div>
</footer>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    </body>
  </html>
