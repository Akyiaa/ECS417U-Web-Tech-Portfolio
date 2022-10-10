<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "miniproject";

    //User inputs
    $u_name = $_POST['u_name'] ?? "";
    $pass =  $_POST['pass'] ?? "";


    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        mysqli_select_db($conn, $dbname);
        //run the query to search for the username and password the match
        $query = "SELECT * FROM bloggers WHERE username = '$u_name' AND password = '$pass' ";
        $result = mysqli_query($conn, $query) or die("Unable to verify user because : " . mysqli_error());

        while($row = mysqli_fetch_assoc($result)) { 
            $blogger_name = $row['username'];
            $admin = $row['adminStatus']; 
        }

        if(isset($blogger_name)){
            //successful login
            session_start();
            $_SESSION['cmt_name'] = $blogger_name;

            if($admin == "true"){
                $_SESSION['isAdmin'] = true;
            }

            header('Location: commentsPage.php');
        }
        else{
            header('Location: commentLogin.php');
        }
    
        $conn->close();
    }
?>