
<?php

$dsn = 'mysql:host=localhost;dbname=trb_db';
$username = 'root';
$password = '';
$options = [];
try {
$con = new PDO($dsn, $username, $password, $options);
}
catch(PDOException $e) {
echo "Error";
}

$user_id = $_GET['user_id'];
$sql = "delete from user_account WHERE user_id=:user_id";
$statement = $con->prepare($sql);

   if ($statement->execute([':user_id' => $user_id ])) {
         header("Location: user_account.php");
   }
?>
