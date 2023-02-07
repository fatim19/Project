<?php

@include 'connect.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
   

    $select = " SELECT * FROM provider_form WHERE email = ' $email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
       
     $error[] = 'user already exist!';

    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
  
        }else{
            $insert = "INSERT INTO provider_form(name, email, phone, city, gender, password) VALUES('$name', '$email', '$phone', '$city', '$gender', '$pass')";
            mysqli_query($conn, $insert);
            header('location:profile.php');
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
  <title>provider Registration</title>
  
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
              <a href="serviceprovidersignup.php">Signup as a service provider</a>
              <a href="customer_register.php">Signup as a customer</a>
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
    <h3>Service provider Register<h3>
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
        <label for="city"><b>City</b></label>
        <select name="city">
        <option value="Riyadh">Riyadh</option>
  <option value="Jeddah">Jeddah</option>
  <option value="Al-Ahsa">Al-Ahsa</option>
  <option value="Dammam">Dammam</option>
  <option value="Al khobar">Al khobar</option>
  <option value="Al Qatif">Al Qatif</option>
  <option value="Mecca">Mecca</option>
  <option value="Medina">Medina</option>
  <option value="Hail">Hail</option>
  <option value="Taif">Taif</option>
  <option value="Tabuk">Tabuk</option>
  <option value="Al Kharj">Al Kharj</option>
  <option value="Najran">Najran</option>
  <option value="Yanbu">Yanbu</option>
  <option value="Abha">Abha</option>
  <option value="Arar">Arar</option>
  <option value="Jazan">Jazan</option>
  <option value="Sakaka">Sakaka</option>
  <option value="Al Bahah">Al Bahah</option>
  <option value="Abha">Abha</option>
  <option value="Arar">Arar</option>
  <option value="Abqaiq">Abqaiq</option>
      </select>
      <label for="gender"><b>Gender</b></label>

  <select name="gender">
    <option value="Female">Female</option>
    <option value="Male">Male</option>
     
  </select>
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="password" name="cpassword" required placeholder="Confirm password">
        
        
<input type="submit" name="submit" value="register now" class="form-btn">
<p> already have an account? <a href="login.php"> login now</a></p>



  </form>
  </div>
  <div class="footer">
    <div class="col-1">
        <h3>Machines Station</h3>
        @2022 Machines Station. All rights reseved
    </div>
    <div class="col-1"></div>
    <div class="col-1"></div>

</div>

</body>
</html>