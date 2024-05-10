<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assigment";

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE blog_posts SET title='$title', description='$description', author='$author' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("error" => "Error updating record: " . $conn->error));
}

$conn->close();
?>
