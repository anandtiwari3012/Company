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

// Process the form submission and add the product to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $attribute = $_POST['attribute'];

    // Validate form data (you should add more validation)
    if (empty($name) || empty($image_url) || empty($price) || empty($description) || empty($attribute)) {
        http_response_code(400); // Bad Request
        exit('All fields are required');
    }

    // Sanitize form data (you should add more sanitization)
    $name = $conn->real_escape_string($name);
    $image_url = $conn->real_escape_string($image_url);
    $price = $conn->real_escape_string($price);
    $description = $conn->real_escape_string($description);
    $attribute = $conn->real_escape_string($attribute);

    // Perform database operation to add the product
    $sql = "INSERT INTO products (name, image_url, price, description, attribute) VALUES ('$name', '$image_url', '$price', '$description', '$attribute')";
    if ($conn->query($sql) === TRUE) {
        http_response_code(200); // OK
        exit();
    } else {
        http_response_code(500); // Internal Server Error
        exit("Error adding product: " . $conn->error);
    }
}

$conn->close();
?>
