<?php
//insert.php

if(isset($_POST["first_name"]))
{


	$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
	$phone = mysqli_real_escape_string($conn, $_POST['type']);
  //$username = mysqli_real_escape_string($conn, $_POST['username']);
  //$isAdmin = mysqli_real_escape_string($conn, $_POST['isAdmin']);
  //$isBlocked = mysqli_real_escape_string($conn, $_POST['isBlocked']);
  //$verified = mysqli_real_escape_string($conn, $_POST['verified']);

	//mysqli_query($conn,"insert into `user_account` (first_name, last_name,phone,username,isAdmin,isBLocked,verified) values ('$first_name', '$last_name','$phone','$username','$isAdmin','$isBlocked','$verified')");

mysqli_query($conn,"insert into `user` (first_name, last_name,type) values ('$first_name', '$last_name','$type')");
}
?>
