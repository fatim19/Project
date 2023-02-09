<?php

@include 'connect.php';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $quastion = mysqli_real_escape_string($conn, $_POST['quastion']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select_provider = "SELECT * FROM provider_form WHERE email = '$email' && quastion = '$quastion'";
    $result_provider = mysqli_query($conn, $select_provider);

    $select_user = "SELECT * FROM user_form WHERE email = '$email' && quastion = '$quastion'";
    $result_user = mysqli_query($conn, $select_user);

    //provider
    while($row = mysqli_fetch_assoc($result_provider)){
        if(mysqli_num_rows($result_provider) > 0 && $quastion == $row['quastion'] && $pass == $cpass){
            $update = "UPDATE provider_form SET password = '$pass' WHERE email = '$email' && quastion = '$quastion'";
            mysqli_query($conn, $update);
           header('location:login.php');
        }
        elseif($pass != $cpass)
            $error[] = 'password not matched!';
        elseif($_POST['quastion'] != $row['quastion'])
            $error[] = 'quastion not matched!';
    }
        //user
        while($row = mysqli_fetch_assoc($result_user)){
        if(mysqli_num_rows($result_user) > 0 && $quastion == $row['quastion'] && $pass == $cpass){
            $update = "UPDATE user_form SET password = '$pass' WHERE email = '$email' && quastion = '$quastion'";
            mysqli_query($conn, $update);
            header('location:login.php');
        }
        elseif($pass != $cpass)
            $error[] = 'password not matched!';
        elseif($_POST['quastion'] != $row['quastion'])
            $error[] = 'quastion not matched!';
    }
}

        ?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-euiv="X-UA-Compatible"  content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset password</title>
  
  <link rel="stylesheet" href="css/customersignup.css">
  <link rel="stylesheet" href="css/style2.css">
  
</head>
<body>
  <div class="form-container"> 
    <div class="admin-machine-form-container">
             <form method="POST">
             <h3>Reset password<h3>
             <input type="email" name="email" required placeholder="Enter your email">
             <input type="text" name="quastion" required placeholder="Enter your favorite color">
             <input type="password" name="password" required placeholder="Enter your password">
             <input type="password" name="cpassword" required placeholder="Confirm password">
             <input type="submit" name="submit" value="Edit" class="form-btn">
             <p><a href="login.php">back to login</a></p>
             </form>
    </div>
</div>

</body>
</html>