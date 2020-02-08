<?php 


  require ("../database.php");
   $query = "UPDATE trb_db.tricycle_operator set  seen_status= 0 WHERE id_no != 0";
  $statement2 = $connection->prepare($query);
  $statement2->execute();
  $orders = $statement2->fetchAll(PDO::FETCH_OBJ); 
 

echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";


?>  