<?php
        
    session_start();

    //unset all session variable
    //$_SESSION = array(); //OR
    unset($_SESSION['cmt_name']);
    unset($_SESSION['post_id']);
    unset($_SESSION['isAdmin']);
   //unset($_SESSION['uniqueId']);

   
    if(isset($_SERVER['REFERER']) && $_SERVER['REFERER'] !== ''){
    } else{
      header('Location: viewBlog.php');
    }

    exit();
?>