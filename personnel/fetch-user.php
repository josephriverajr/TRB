<?php
//fetch.php;
if(isset($_POST["view"])){

	include("conn.php");
	if($_POST["view"] != ''){
		mysqli_query($conn,"update `new_user` set seen_status='1' where seen_status='0'");
	}

	$query=mysqli_query($conn,"select * from `new_user`");
	$output = '';

	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
	$output .= '
	
	<li>
		<a href="#">
		<input value="Name: '.$row['username'].'" id="name1" style="border-color:transparent; cursor:default ; background-color:#fff; "  disabled />
		<br>
		<input value="Contact: '.$row['fname'].'" id="contact" style="border-color:transparent; cursor:default ; background-color:#fff; " disabled />
		<br>
		<input value="Type: '.$row['lname'].'" id="type" style="border-color:transparent; cursor:default ; background-color:#fff; " disabled />
		</a>
		<a href = "user_account.php">view</a>
	</li>

	';
	}
	//echo "<script type='text/javascript'>alert('test');</script>";

	}
	else{
	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
	}

	$query1=mysqli_query($conn,"select * from `new_user` where seen_status='0'");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);

}
/*$output="test";*/
/*echo "<script type='text/javascript'>alert($data);</script>";*/
?>

