<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/Aboutus.css">
</head>
<body>
<nav class="nav"> 

<div class="nav-header">

<div class="nav-links">
<ul> 

<form action="connect.php" method="post">
<a href="index.php"><img src="img/Machinestation.png" class="logo" href="index2.html"></a>
<li><a href="FAQ.php">FAQ</a></li><?php
    if(empty($_SESSION['email']))
    {
      echo '
      <li><a href="login.php">Login</a></li>
      <li><div class="dropdown">
      <button class="dropbtn">Signup<i class="fa fa-caret-down"></i>
      ';
    }
    elseif(!empty($_SESSION['email']))
    {
      echo '<li><a href="logout.php">Logout</a></li>';
    }
?>
<!-- start profile -->

<!-- end profile -->
    </button>
    <div class="dropdown-content">
      <a href="serviceprovidersignup.php">Signup as a service provider</a>
      <a href="customer_register.php">Signup as a customer</a>
    </div>
  </li>
  <li><a href="service.php">Our service providers</a></li>
</form>

</ul> 
</div>


</nav>
</body>
</html>