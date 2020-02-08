<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trb_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM new_user";
$result = $conn->query($sql);

//echo $result->num_rows;
//echo "New User Request";

if ($result->num_rows > 0) {
    // output data of each row
    echo "New User Request";
} else {
    echo "0 request";
}


/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Notification: " . $row["first_name"];
    }
} else {
    echo "0 results";
}
*/
$conn->close();
?>
