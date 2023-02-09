<?php

@include 'connect.php';
require_once 'check_login_admin.php';
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
      <th scope="col">Price</th>
      <th scope="col">Time</th>
      <th scope="col">Statuse</th>
    </tr>
  </thead>
  <tbody>
    <?php

$select = " SELECT * FROM rent";
$result = mysqli_query($conn, $select);
 if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row['id'];
       $name=$row['name'];
       $price=$row['price'];
       $time=$row['time'];
       $statuse=$row['statuse'];
       
       echo '<tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$price.'</td>
       <td>'.$time.'</td>
       <td>';
       if(!empty($statuse))
        echo $statuse;
       elseif(empty($statuse))
       {
       ?>
       <form method="POST" action="machines_status.php">
       <input type="submit" name="<?php echo $id; ?>" value="Accept">
       <input type="submit" name="<?php echo $id; ?>" value="Reject">
       </form>
       <?php
        echo '</td>';   
        }
        echo '</tr>';

 if(isset($_POST[$id]))
 {
  echo $id;
    $update = "UPDATE rent SET statuse ='".$_POST[$id]."' WHERE id = $id";
    $upload = mysqli_query($conn,$update);
    header('location:machines_status.php');
 }
  }
 }
 
 
    ?>

  </tbody>
</table>

</form>
</div>

</body>
</html>