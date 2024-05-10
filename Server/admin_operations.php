<?php
// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $content = $_POST["content"];
    
    // Connect to MySQL database
    $mysqli = new mysqli("localhost", "root", "", "assigment");

    // Check connection
    if($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Insert blog into database
    $sql = "INSERT INTO blogs (title, content) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    
    if($stmt->execute()) {
        echo "Blog added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close connection
    $stmt->close();
    $mysqli->close();
}
?>
