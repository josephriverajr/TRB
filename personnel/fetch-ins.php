<?php
require ("../database.php");
$con = mysqli_connect($servername, $username, $password, $database);

$result = 'select * from inspected where status = 1';
  $statement = $connection->prepare($result);
      $statement->execute();
      $inspected = $statement->fetchAll(PDO::FETCH_OBJ);



echo "<table border='1'  class='table table-striped table-bordered table-hover' id='dataTables-example'>
<tr>

<th><b>Toda</b></td></th>
<th><b>Toda No.</b></td></th>
<th><b>Action</b></td></th>
";
   foreach($inspected as $package):

    echo "<tr id=".$package->userid.">";
    echo "<td >".$package->toda."</td>";
    echo "<td >".$package->toda_no."</td>";
 	  echo "<td ><a href='application_form_new.php?userid=".$package->userid."'>Select</a></td>";
    echo "</tr>";

echo "</table>";
 endforeach;
?>
