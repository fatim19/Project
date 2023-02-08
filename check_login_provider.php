<?php
    session_start();
    if(empty($_SESSION['provider_email']))
    $_SESSION['provider_email'] = '';
    if($_SESSION['provider_email'] == $_SESSION['email'])
    {
    }
    else
    {
        echo 'Unauthorized entry!';
        header('location:login.php');
        exit;
    }
?>