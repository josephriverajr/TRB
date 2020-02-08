<?php

//MySQLi Procedural
$conn = mysqli_connect('localhost','root','','trb_db');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
