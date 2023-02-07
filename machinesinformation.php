<?php

@include 'connect.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $machine_version_year = mysqli_real_escape_string($conn, $_POST['version']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
   
    }
    $select = " SELECT * FROM add_machines";

      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Servisce provider</title>
    <link rel="stylesheet" href="css/machinesinformation.css">
    <link rel="stylesheet" href="css/profile.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>

<body>
		
		<div id="mySidenav" class="sidenav">
		<p class="logo"><span></span>Machines station</p>
    <a href="profile.php"class="icon-a"><i class="fa fa-home"></i>Home</a>
    <a href="profile.php"class="icon-a"><i class="fa fa-user icons"></i>Accounts</a>
	  <a href="machinesinformation.php"class="icon-a"><i class="fa fa-list-alt icons"></i>  Add your Service</a>
	  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i>Orders</a>

	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ </span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ </span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">

			<img src="images/user.png" class="pro-img" />
			<p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
		</div>
	</div>
		<div class="clearfix"></div>
	</div>

		<div class="clearfix"></div>
		<br/>
		
		
		
		</div>
		</div>

		
			
		<div class="clearfix"></div>
	</div>

   <div class="maa">

   <form action="add_machines" method="post">
    <?php
    ?>
<h1>Machine information</h1>

<p>Machine name</p>
<input type="text" placeholder="Enter Machine name" name="name"> 
<p>Machine version year</p>
<input type="text" placeholder="Enter version year" name="version">
<p>Short description about machine </p>
<input type="text" placeholder="Enter Short description" name="description">

<p>upload photo for your machine</p>
<input type="file" placeholder="upload photo machine">

<p></p><button>Submit</button></p>

  </form>

</body>
</html>