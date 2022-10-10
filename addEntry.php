<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "miniproject";


//User imputs
$_title = $_POST['title'] ?? "";
$_body = $_POST['subject'] ?? "";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

//preventing special characters from having an effect
$title = mysqli_real_escape_string($conn, $_title);
$body = mysqli_real_escape_string($conn, $_body);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO POSTS (DATETIME, title, body) VALUES (CURRENT_TIMESTAMP, '$title', '$body')";

if ($conn->query($sql) === TRUE) {
    header('Location: viewBlog.php');
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
