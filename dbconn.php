<?php
// $servername = "localhost";

// $username = "u861324589_aws_db_user";
// $password = "dbIocr@8832";
// $dbname = "u861324589_aws_db";
// $conn = new mysqli($servername, $username, $password, $dbname);
// // echo"successully connected";
// //Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }



$servername = "aws-db-ws.c6qbgmcbjeno.ap-south-1.rds.amazonaws.com";

$username = "wsadmin";
$password = "Wedding#2021";
$dbname = "wedding";
$conn = new mysqli($servername, $username, $password, $dbname);
// echo"successully connected";
// //Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
