<?php
session_start();
$msg =" ";

            if(isset($_POST['signin']))
            {
            $con = mysqli_connect('localhost','root','','trb_db');
              $username = $_POST['log_username'];
              $password = $_POST['log_password'];

              $result =  mysqli_query($con,'select * from trb_db.user_account where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="1" AND (Active IS NOT NULL or Active = 1) AND
               (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
              $result1 =mysqli_query($con,'select * from trb_db.user_account where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="3" AND (Active IS NOT NULL or Active = 1) AND
                (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
              $result2 = mysqli_query($con,'select * from trb_db.user_account where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="2" AND (Active IS NOT NULL or Active = 1) AND
                (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
              $result3 = mysqli_query($con,'select * from trb_db.user_account where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="0" AND (Active IS NOT NULL or Active = 1) AND
                (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
              $result4 = mysqli_query($con,'select * from trb_db.user_account where username ="'.$username.'" and password ="'.$password.'" and isAdmin ="4" AND (Active IS NOT NULL or Active = 1) AND
                  (Deleted IS NULL OR Deleted != 1) AND (IsBlocked IS NULL OR IsBlocked !=1) ');
              if (mysqli_num_rows($result)==1)
              {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                 echo "<script type='text/javascript'>window.location.href = 'personnel/index.php';</script>";
                 exit();
              }
             else if (mysqli_num_rows($result1)==1)
              {
               $_SESSION['username'] = $username;
               $_SESSION['password'] = $password;
               /* header('Location: public/index.php');*/
                echo "<script type='text/javascript'>window.location.href = 'admin2/index.php';</script>";
                exit();
              }
                 else if (mysqli_num_rows($result2)==1)
              {
               $_SESSION['username'] = $username;
               $_SESSION['password'] = $password;

                echo "<script type='text/javascript'>window.location.href = 'insp/index.php';</script>";
                exit();
              }
              else if (mysqli_num_rows($result3)==1)
              {
               $_SESSION['username'] = $username;
               $_SESSION['password'] = $password;

                echo "<script type='text/javascript'>window.location.href = 'treasury/index.php';</script>";
                exit();
              }
              else if (mysqli_num_rows($result4)==1)
              {
               $_SESSION['username'] = $username;
               $_SESSION['password'] = $password;

                echo "<script type='text/javascript'>window.location.href = 'atty/index.php';</script>";
                exit();
              }
              else
              {
                  //echo "<script>alert('Incorrect Password');</script>";
                  //header('Location: index.php ');
                  echo "<script type='text/javascript'>alert('Invalid')</script>";
            }

            }
            /*
            $username1 = $_SESSION["username"];
             if (isset($username1))
            echo "<script type='text/javascript'>window.location.href = 'public/index.php';</script>";
            */


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>TRB Home</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<!--
  <style>
    footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: red;
      color: white;
    }
  </style>
-->


</head>

<body>
  <nav class="red" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo white-text">TRB</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="signup.php" class="white-text">Sign up</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="login.php">Sign up</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h2 class="header center blue-text">City Government of San Juan</h2>
      <div class="row center">
        <h4 class="header col s12 light">Tricycle Regulatory Board</h4>
      </div>
      <div class="row center">
        <form method="POST">
                      <div class="col s3">
                      </div>
                      <div class='col s6 center'>
                        <div class='input-field col s6'>
                          <input class='validate' type='email' id='emailSignIn' name="log_username" />
                          <label for='email'>Enter your email</label>
                        </div>
                        <div class='input-field col s6'>
                          <input class='validate' type='password' id='passwordSignIn' name="log_password"/>
                          <label for='password'>Enter your password</label>
                        </div>
                      <!-- <a href="#" id="signin" class="btn-large waves-effect waves-light blue">Get Started</a> -->
                      <button name='signin' class='col s12 btn btn-large waves-effect blue'>Login</button>
                      </div>
                      <div class="col s3">
                      </div>
        </form>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">message</i></h2>
            <h5 class="center">Mandate</h5>
            <p class="light">Processing of application and renewal of motorized tricycle.</p>
          </div>
        </div>



        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">gps_fixed</i></h2>
            <h5 class="center">Mission</h5>
            <p class="light">On our  city’s good governance, we are in mission to discipline, monitor and regulate all vehicle service within our premisses and for the safety of our commuter. </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">remove_red_eye</i></h2>
            <h5 class="center">Vision</h5>
            <p class="light">A fully operational transport service providing an exceptional at most professional manner to every commuter by implementing the power mandate by this office.</p>
          </div>
        </div>


      </div>

    </div>
    <br><br>
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
