<?php
        
    session_start();

    //unset all session variable
    $_SESSION = array();
 
    session_destroy();

    if(isset($_SERVER['REFERER']) && $_SERVER['REFERER'] !== ''){
    } else{
      header('Location:index.php');
    }

    exit();
?>