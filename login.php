<?php

@include 'connect.php';

session_start();

if(isset($_POST['submit'])){

   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    //user
    $select_user = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result_user = mysqli_query($conn, $select_user);

    //provider
    $select_provider = "SELECT * FROM provider_form WHERE email = '$email' && password = '$pass'";
    $result_provider = mysqli_query($conn, $select_provider);

    //admin
    $select_admin = "SELECT * FROM admin WHERE email = '$email' && password = '$pass'";
    $result_admin = mysqli_query($conn, $select_admin);

    if(mysqli_num_rows($result_user) > 0){
      $row = mysqli_fetch_array($result_user);
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['email'] = $email;
      $_SESSION['id_user'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      header('location:profile_user.php');
    }
    elseif(mysqli_num_rows($result_provider) > 0){
       $row = mysqli_fetch_array($result_provider);
       $_SESSION['provider_email'] = $row['email'];
       $_SESSION['email'] = $email;
       $_SESSION['id_provider'] = $row['id'];
       $_SESSION['provider_name'] = $row['name'];
       header('location:profile_provider.php');
  }
  elseif(mysqli_num_rows($result_admin) > 0){
      $row = mysqli_fetch_array($result_admin);
      $_SESSION['admin_email'] = $row['email'];
      $_SESSION['email'] = $email;
      $_SESSION['id_admin'] = $row['id'];
      $_SESSION['admin_name'] = $row['name'];
      header('location:admin.php');
}
  else
      $error[] = 'incorrect email or password!';
}
?>

<!DOCTYPE html>
<html lang="en">
  

<head>

<meta charset="UTF-8">
<meta http-euiv="X-UA-Compatible"  content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login form</title>
  
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
    <h3>Login now<h3>
    <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.' </span>';

            };
        };

        ?>
       
        <input type="email" name="email" required placeholder="Enter your email"> 
        <input type="password" name="password" required placeholder="Enter your password">
        <label for="Login as"><p>login as</p></label>
        <p> do you forget your password? <a href="edit_password.php"> reset now</a></p>
        <input type="submit" name="submit" value="login now" class="form-btn">
        
        <p> don't have an account? <a href="customer_register.php"> resgister now</a></p>



  </form>
  </div>

</body>
</html>