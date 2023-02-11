<?php

@include 'connect.php';
require_once 'check_login_provider.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $machine_version_year = mysqli_real_escape_string($conn, $_POST['version']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    // $machine_image = $_FILES['machine_image']['name'];
    // $machine_image_tmp_name = $_FILES['machine_image']['tmp_name']; 
    // $machine_image_folder = 'img/' .$machine_image;
   
	if(empty($name) || empty($machine_version_year) || empty($description)){
		$message[] = 'please fill out all';
	 }else{
	   $insert = "INSERT INTO add_machines(id_p , name, version, description, price) VALUES('$_SESSION[id_provider]','$name', '$machine_version_year', '$description', '$price')";
	   $upload = mysqli_query($conn,$insert);
	   if($upload){
		//    move_uploaded_file($machine_image_tmp_name, $machine_image_folder);
		   $message[] = 'new machine added successfully';
		   header('location:machinesinformation.php');
	   }else{
		   $message[] = 'could not add the product';
   
	   }
	 }

    }
      

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
		<a href="index.php"class="icon-a"><i class="fa fa-home"></i>Home</a>
		<a href="edit_profile_provider.php"class="icon-a"><i class="fa fa-user icons"></i>   Profile</a>
		<a href="machinesinformation.php"class="icon-a"><i class="fa fa-plus-circle"></i>  Add your Service</a>
		<a href="addrentmachine.php"class="icon-a"><i class="fa fa-plus-circle"></i> Add rent Machines</a>
	    <a href="orders_provider.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i>Orders</a>


	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ </span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ </span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">
			<?php
			    $select = mysqli_query($conn, "SELECT * FROM provider_form where id = '$_SESSION[id_provider]'");
                while($row = mysqli_fetch_assoc($select)){
				if($row['gender'] == 'Male')
				echo '<img src="img/userman.jpg" class="pro-img" />';
				elseif($row['gender'] == 'Female')
				echo '<img src="img/userwomen.png" class="pro-img" />';
			?>
			    <p><?php echo $row['name']; ?><span><?php echo $row['major']; ?></span></p>
				<?php
				}
			?>
			
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

   <form action="machinesinformation.php" method="post">
    <?php
    ?>
<h1>Machine information</h1>

<p>Machine name</p>
<input type="text" placeholder="Enter Machine name" name="name" required> 
<p>Machine version year</p>
<input type="text" placeholder="Enter version year" name="version" required>
<p>Short description about machine </p>
<input type="text" placeholder="Enter Short description" name="description" required>
<p>Price </p>
<input type="text" placeholder="Enter price" name="price" required>

<!-- <p>upload photo for your machine</p>
<input type="file" accept="image/png, image/jpeg, image/jpg" name="machine_image" required> -->
<p></p><button name="submit">Submit</button></p>

  </form>

</body>
</html>