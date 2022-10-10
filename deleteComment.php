<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "miniproject";


    session_start();
    $uniqueId =  $_GET['uniqueID'] ?? "";

    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_select_db($conn, $dbname);


    //check if the user has admin status
    if($_SESSION['isAdmin'] == false){
        header('Location: commentsPage.php?adminOnly=Only ADMINS can access the DELETE command');
    }
    else{
        $query = "DELETE FROM COMMENTS WHERE ID = '$uniqueId'";
        $result = mysqli_query($conn, $query) or die("Unable to verify user because : " . mysqli_error());
        header('Location: commentsPage.php');
    }

    $conn->close();

?>