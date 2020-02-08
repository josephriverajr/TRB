<?php 


  require ("../database.php");
   $query = "UPDATE trb_db.inspected set  seen_status= 0 WHERE userid != 0";
  $statement2 = $connection->prepare($query);
  $statement2->execute();
  $orders = $statement2->fetchAll(PDO::FETCH_OBJ); 
 

echo "<script type='text/javascript'>window.location.href = 'new.php';</script>";


?>  