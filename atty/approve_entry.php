
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

$userid = $_GET['userid'];
$sql = "UPDATE tricycle_operator SET status = 5 WHERE id_no=:userid";
$statement = $con->prepare($sql);

   if ($statement->execute([':userid' => $userid ])) {
         header("Location: index.php");
        
   }

?>
