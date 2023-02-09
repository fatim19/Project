<?php
    session_start();
    if(empty($_SESSION['admin_email']))
    $_SESSION['admin_email'] = '';
    if($_SESSION['admin_email'] == $_SESSION['email'])
    {
    }
    else
    {
        echo 'Unauthorized entry!';
        header('location:logout.php');
        exit;
    }
?>