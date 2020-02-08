<?php 

require ("../database.php");
$query_products = "SELECT count(*) AS notif
                   FROM inspected
                   WHERE seen_status = 1";
  $statement2 = $connection->prepare($query_products);
  $statement2->execute();
  $orders = $statement2->fetchAll(PDO::FETCH_OBJ); 
   $i= 0;
    foreach($orders as $package):   
  $notify = $package->notif;
/*  $products = $package->NAME;*/
   $i++;

  echo ' <h3 style="display:block;" >'. $package->notif.'<br> </h3>';

  endforeach;



?>  