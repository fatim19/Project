<?php
    session_start();
    if(empty($_SESSION['user_email']))
    $_SESSION['user_email'] = '';
    if($_SESSION['user_email'] == $_SESSION['email'])
    {
    }
    else
    {
        echo 'Unauthorized entry!';
        header('location:login.php');
        exit;
    }
?>