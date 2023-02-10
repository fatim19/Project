<html>
<?php
require_once 'head.php';
?>

<head>
    <link rel="stylesheet" href="css/profile.css" type="text/css"/>
    <link rel="stylesheet" href="css/Aboutus.css">
    <link rel="stylesheet" href="css/style2.css">
    <?php require_once 'check_login_custom.php'; ?>
    <?php require_once 'connect.php'; ?>
</head>

<body>

   
<?php
    $select = mysqli_query($conn, "SELECT * FROM provider_form");

    while($row = mysqli_fetch_assoc($select)){
?>
<div class="row">
    <div class="column">
      <div class="card">
        <?php
						if($row['gender'] == 'Male')
						echo '<img src="img/userman.jpg" class="pro-img" />';
						elseif($row['gender'] == 'Female')
						echo '<img src="img/userwomen.png" class="pro-img" />';
				?>
        <div class="container">
          <h2><?php echo $row['name']; ?></h2>
          <p class="title"><?php echo $row['major']; ?></p>
          <p>Phone:<?php echo $row['phone']; ?>
            <br>
            Email:<?php echo $row['email']; ?>
          </p>
          <br>
          <form method="POST" action="rent.php">
          <p><button class="button" name="provider" value="<?php echo $row['id']; ?>">Show</button></p>
          </form>
      </div>
    </div>
</div>
    

<?php
};
?>
  
  </body>
  </html>