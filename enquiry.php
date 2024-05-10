<?php
// Connect to your database
$servername = "localhost"; // Change this to your database host
$username = "root";     // Change this to your database username
$password = "";     // Change this to your database password
$dbname = "assigment";  // Change this to your database name


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Insert the form data into your database
    $sql = "INSERT INTO inquiries (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Your inquiry has been submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
