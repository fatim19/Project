<?php

@include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-euiv="X-UA-Compatible"  content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Homepage</title>
  
  <link rel="stylesheet" href="css/admin_homepage.css">
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

<div class="container">

<form action="" method="post">
  <h3> dachboard <h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php

$select = " SELECT * FROM user_form ";
$result = mysqli_query($conn, $select);
 if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row['id'];
       $name=$row['name'];
       $email=$row['email'];
       $phone=$row['phone'];
       $password=$row['password'];
       
       echo '<tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$email.'</td>
       <td>'.$phone.'</td>
       <td>'.$password.'</td>
       

     </tr>'; 
  }
 }
 
 
    ?>

  </tbody>
</table>

</form>
</div>

</body>
</html>