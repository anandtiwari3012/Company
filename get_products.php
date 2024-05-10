<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assigment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT id, name, image_url, price FROM products";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
}

// Convert array to JSON and output
echo json_encode($products);

$conn->close();
?>
