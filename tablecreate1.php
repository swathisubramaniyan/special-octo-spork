<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sparks_bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE banking (name varchar(15),email varchar(20),amount int)";

if ($conn->query($sql) === TRUE) {
  echo "Table banking created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>