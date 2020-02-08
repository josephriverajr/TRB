<?php
require ("../database.php");
$con = mysqli_connect($servername, $username, $password, $database);

$result = 'select * from tricycle_operator';
  $statement = $connection->prepare($result);
      $statement->execute();
      $payments = $statement->fetchAll(PDO::FETCH_OBJ);   

   

echo "

<table border='1'  class='table table-striped table-bordered table-hover' id='dataTables-example' >
<tr>

<th><b>Toda</b></td></th>
<th><b>Toda #</b></td></th>
<th><b>Full Name</b></td></th>
<th><b>Full Address</b></td></th>
<th><b>Status</b></td></th>
<th><b>Action</b></td></th>
";
   foreach($payments as $package):   
      $fname= $package->first_name;
      $mname= $package->middle_name;
      $lname= $package->last_name;
      $fullname= $lname .', '. $fname .' '.$mname;
      $house_no = $package->house_no;
      $street = $package->street;
      $barangay = $package->barangay;
      $city= $package->city;                          
      $full_add =  $house_no .' '. $street .' '.$barangay.' '.$city;
            $stats= $package->status;

    if($stats == 1)
      {
        $new_stat= "Waiting for OR";
        $display = "none ;"; 
        $display1 = "inline-block ;"; 
      }
      else if($stats == 5)
      {
        $new_stat= "Sent to treasury";
        $display = "inline-block ;"; 
        $display1 = "none ;"; 
      }
    echo "<tr id=".$package->id_no.">";
    echo "<td >".$package->toda."</td>";
    echo "<td >".$package->toda_no."</td>";
    echo "<td >".$fullname."</td>";
    echo "<td >".$full_add."</td>";
     echo "<td >".$new_stat."</td>";
  echo "<td ><a href='../treasury/or_payment.php?userid=".$package->id_no."' style= display:".$display."'>To pdf  </a><a href='or_payment.php?userid=".$package->id_no."' style='margin-left: 2%; display:".$display1."'> Action</a></td>";
    echo "</tr>";


 endforeach;
 echo "</table>";
?>