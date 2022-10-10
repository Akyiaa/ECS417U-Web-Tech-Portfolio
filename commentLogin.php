<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Comment</title>
    <link rel="stylesheet" href="reset.css" type="text/css"/>
    <link rel="stylesheet" href="commentLogin_style.css" type="text/css">
</head>
<body>

    <?php 
        session_start();
        $_SESSION['post_id'] =  $_GET['idNum'] ?? "";

        //if user is already logged in
        if(isset($_SESSION['cmt_name']))
        {
            header('Location: commentsPage.php');
        }
    ?>

    <header>
        <figure>
            <img src="logo.png" alt="Fiona Ampofo Logo" width="100px">
        </figure>

        <h1>Login to Comment</h1>

    </header>


    <form id="comment_login" action="loginFormComment.php" method="post">

        <h3>Login</h3>
        
        <div class="data_2">
            <label for="name"><b>Username</b></label><br>
            <input type="text" name="u_name" required><br>
        </div>

        <div class="data_2">
            <label for="psw"><b>Password</b></label><br>
            <input type="password" name="pass" minlength="3" required><br>
        </div>
        
        <br>
        <div id="inner-btn">
            <button type="submit" >LOGIN</button>
        </div>
    </form>
    

    <nav id="formLinks">
        <a href="index.php">BACK TO MAIN PAGE</a>
        <a href="viewBlog.php">BACK TO VIEW BLOG</a>
    </nav>

</body>
</html>