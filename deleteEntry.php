<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "miniproject";

    session_start();
    $uniqueId =  $_GET['idNum'] ?? "";

    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_select_db($conn, $dbname);

    //if not an admin 
    if($_SESSION['adminStatus'] == false){
        header('Location: viewBlog.php');
    }
    else{
        $query = "DELETE FROM POSTS WHERE ID = '$uniqueId'";
        $result = mysqli_query($conn, $query) or die("Unable to verify user because : " . mysqli_error());
        header('Location: viewBlog.php');
    }

    $conn->close();
?>