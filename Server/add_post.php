<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assigment";

$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO blog_posts (title, description, author) VALUES ('$title', '$description', '$author')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
}

$conn->close();
?>
