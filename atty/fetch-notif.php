<?php 

require ("../database.php");
$query_products = "SELECT count(*) AS notif
                   FROM tricycle_operator
                   WHERE seen_status = 0 ";
  $statement2 = $connection->prepare($query_products);
  $statement2->execute();
  $orders = $statement2->fetchAll(PDO::FETCH_OBJ); 
   $i= 0;
    foreach($orders as $package):   
  $notify = $package->notif;
/*  $products = $package->NAME;*/
   $i++;

  echo ' <span style="display:block;" >'. $package->notif.'<br> </span>';

  endforeach;



?>  