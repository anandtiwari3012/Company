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

// Process the form submission to modify a product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $attribute = $_POST['attribute'];

    // Validate form data (you should add more validation)
    if (empty($id) || empty($name) || empty($image_url) || empty($price) || empty($description) || empty($attribute)) {
        http_response_code(400); // Bad Request
        exit('All fields are required');
    }

    // Sanitize form data (you should add more sanitization)
    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $image_url = $conn->real_escape_string($image_url);
    $price = $conn->real_escape_string($price);
    $description = $conn->real_escape_string($description);
    $attribute = $conn->real_escape_string($attribute);

    // Perform database operation to modify the product
    $sql = "UPDATE products SET name = '$name', image_url = '$image_url', price = '$price', description = '$description', attribute = '$attribute' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        http_response_code(200); // OK
        exit();
    } else {
        http_response_code(500); // Internal Server Error
        exit("Error modifying product: " . $conn->error);
    }
}

$conn->close();
?>
