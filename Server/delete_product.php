<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assigment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission to delete a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product ID from the form
    $id = $_POST['id'];

    // Validate product ID (you should add more validation)
    if (empty($id)) {
        http_response_code(400); // Bad Request
        exit('Product ID is required');
    }

    // Perform database operation to delete the product
    $sql = "DELETE FROM products WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        http_response_code(200); // OK
        exit();
    } else {
        http_response_code(500); // Internal Server Error
        exit("Error deleting product: " . $conn->error);
    }
}

$conn->close();
?>
