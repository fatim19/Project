<?php

@include 'connect.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $quastion = mysqli_real_escape_string($conn, $_POST['quastion']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
       
     $error[] = 'user already exist!';

    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
  
        }else{
            $insert = "INSERT INTO user_form(name, email, phone, password, quastion) VALUES('$name', '$email', '$phone', '$pass', '$quastion')";
            mysqli_query($conn, $insert);
            header('location:index.php');
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-euiv="X-UA-Compatible"  content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Registration</title>
  
  <link rel="stylesheet" href="css/customersignup.css">
  <link rel="stylesheet" href="css/style2.css">
  
</head>
<body>

<nav class="nav"> 

        <div class="nav-header">
        
    <div class="nav-links">
       <ul> 
        
        
        <a><img src="img/Machinestation.png" class="logo" href="index2.html"></a>
        <li><a href="index2.html" class="split">Machines Station</a></li>
        <li><a href="login.html">Login</a></li>
        <li><div class="dropdown">
            <button class="dropbtn">Signup
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="serviceprovidersignup.html">Signup as a service provider</a>
              <a href="customersignup.html">Signup as a customer</a>
            </div>
          </li>
        <li><a href="service type.html">Services</a></li>
        <li><a href="catagory.html">catagory</a></li>
        <li><a href="FAQ.html">FAQ</a></li>
        <li><a href="About us.html">About Us</a></li>
        
    </ul> 
    </div>

  
</nav>

  <div class="form-container"> 

  <form action="" method="post">
    <h3> Customer Register<h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.' </span>';

            };
        };

        ?>

        <input type="text" name="name" required placeholder="Enter your name">
        <input type="email" name="email" required placeholder="Enter your email">
        <input type="phone" name="phone" required placeholder="Enter your phone">
        <input type="text" name="quastion" required placeholder="Enter your favorite color">
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="password" name="cpassword" required placeholder="Confirm password">
       
<input type="submit" name="submit" value="register now" class="form-btn">
<p> already have an account? <a href="login.php"> login now</a></p>

  </form>
  </div>

</body>
</html>