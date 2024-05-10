<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assigment";

$id = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM blog_posts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("error" => "Error deleting record: " . $conn->error));
}

$conn->close();
?>
