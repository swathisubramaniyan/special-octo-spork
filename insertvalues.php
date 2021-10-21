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

$sql = "INSERT INTO banking(name,email,amount) VALUES 
                                                      ('swathi','swathi@gmail.com','23000'),
                                                      ('dhanasekar','dhanasekar@gmail.com','20000'),
                                                      ('suganthi','sugu@gmail.com','14320'),
                                                      ('vihana','vihu@gmail.com','89000'),
                                                      ('avanthika','avanthi@gmail.com','50000'),
                                                      ('meenakshi','meenu@gmail.com','89000'),
                                                      ('Yamuna','yamu@gmail.com','67000'),
                                                      ('Vasuthra','vasu@gmail.com','89000'),
                                                      ('vijayalakshmi','viju@gmail.com','23000'),
                                                      ('Nithi','nithi@gmail.com','53000'),
                                                      ('Vinisha','vinik@gmail.com','10000'),
                                                      ('Uma','umak@gmail.com','90000'),
                                                      ('dharanika','dharn@gmail.com','34000')";
 
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>