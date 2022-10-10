<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "miniproject";

    //User inputs
    session_start();
    $postID =   $_SESSION['post_id'] ?? "";
    $_author = $_SESSION['cmt_name'] ?? "";
    $_cmnt = $_POST['comment'] ?? "";

    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //preventing special characters from having an effect
    $author = mysqli_real_escape_string($conn, $_author);
    $cmnt = mysqli_real_escape_string($conn, $_cmnt);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //the comments also has its personal id
    $sql = "INSERT INTO COMMENTS (postID, DateTime, author, comment) VALUES ('$postID', CURRENT_TIMESTAMP, '$author', '$cmnt')";

    if ($conn->query($sql) === TRUE) {
        header('Location: commentsPage.php');
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>