<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "miniproject";

    //User inputs
    $uname = $_POST['name'] ?? "";
    $pass1 =  $_POST['psw'] ?? "";


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
        $query = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass1' ";
        $result = mysqli_query($conn, $query) or die("Unable to verify user because : " . mysqli_error());

        while($row = mysqli_fetch_assoc($result)) { 
            $name = $row['username']; 
            $id = $row['ID'];
        }

        if(isset($name)){
            //successful login
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['name'] = $name;

            //Admin is set to id of 2 by default
            if($id == 2){
                $_SESSION['adminStatus'] = true;
            }

            header('Location: addPost.html');
        }
        else{
            header('Location: index.php?LogIn="Incorrect Details. Please try again."');
        }
    
        $conn->close();
    }
?>