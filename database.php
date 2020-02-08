<?php

$servername = "localhost";
$database = "trb_db";
$username = "root";
$password = "";
$connection = new PDO ("mysql:host=localhost;dbname=trb_db","root","");
$con = mysqli_connect($servername, $username, $password, $database);

?>