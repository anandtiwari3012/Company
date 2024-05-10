<?php
// Database connection details
$servername = "localhost"; // Change this to your database host
$username = "root";     // Change this to your database username
$password = "";     // Change this to your database password
$dbname = "assigment";  // Change this to your database name

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch inquiries from the database
$sql = "SELECT * FROM inquiries";
$result = $conn->query($sql);

// Store inquiries in an array
$inquiries = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $inquiries[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return inquiries as JSON
header('Content-Type: application/json');
echo json_encode($inquiries);
?>
