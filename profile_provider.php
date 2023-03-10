<!Doctype HTML>
	<html>
		
	<head>
		<title></title>
		<link rel="stylesheet" href="css/profile.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <?php
		session_start();
		if(!empty($_SESSION['provider_email']))
		{
		}
		else
		{
			echo 'Unauthorized entry!';
			header('location:logout.php');
			exit;
		}
		require_once 'connect.php';
		?>
	</head>
	<body>
		<?php
				$select = mysqli_query($conn, "SELECT * FROM provider_form where id = '$_SESSION[id_provider]'");
                while($row = mysqli_fetch_assoc($select)){
				?>
				    <div id="mySidenav" class="sidenav">
					<p class="logo"><span></span>Machines station</p>
					<a href="index.php"class="icon-a"><i class="fa fa-home"></i>Home</a>
					<a href="edit_profile_provider.php"class="icon-a"><i class="fa fa-user icons"></i>   Profile</a>
					<a href="machinesinformation.php"class="icon-a"><i class="fa fa-plus-circle"></i>  Add your Service</a>
					<a href="addrentmachine.php"class="icon-a"><i class="fa fa-plus-circle"></i> Add rent Machines</a>
					<a href="orders_provider.php"class="icon-a"><i class="fa fa-shopping-bag icons"></i>Orders</a>
					<a href="index.php"class="icon-a"><i class="fa fa-sign-out"></i>Log out</a>


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
						    if($row['gender'] == 'Male')
							echo '<img src="img/userman.jpg" class="pro-img" />';
							elseif($row['gender'] == 'Female')
							echo '<img src="img/userwomen.png" class="pro-img" />';
						?>
					<p><?php echo $row['name']; ?><span><?php echo $row['major']; ?></span></p>
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

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
					<script>

                    $(".nav").click(function(){
						$("#mySidenav").css('width','70px');
						$("#main").css('margin-left','70px');
						$(".logo").css('visibility', 'hidden');
						$(".logo span").css('visibility', 'visible');
						$(".logo span").css('margin-left', '-10px');
						$(".icon-a").css('visibility', 'hidden');
						$(".icons").css('visibility', 'visible');
						$(".icons").css('margin-left', '-8px');
						$(".nav").css('display','none');
						$(".nav2").css('display','block');
					});

					$(".nav2").click(function(){
						$("#mySidenav").css('width','300px');
						$("#main").css('margin-left','300px');
						$(".logo").css('visibility', 'visible');
						$(".icon-a").css('visibility', 'visible');
						$(".icons").css('visibility', 'visible');
						$(".nav").css('display','block');
						$(".nav2").css('display','none');
					});

					</script>
				<?php
				}
		?>
	</body>
	</html>