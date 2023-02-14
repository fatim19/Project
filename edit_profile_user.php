<?php

@include 'connect.php';
require_once 'check_login_custom.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $quastion = mysqli_real_escape_string($conn, $_POST['quastion']);

    $update = "UPDATE user_form SET name = '$name', phone = '$phone', quastion = '$quastion' WHERE id = $_SESSION[id_user]";
    mysqli_query($conn, $update);
    header('location:profile_user.php');
}

        ?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-euiv="X-UA-Compatible"  content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit profile</title>
  
  <link rel="stylesheet" href="css/customersignup.css">
  <link rel="stylesheet" href="css/style2.css">
  
</head>
<body>
  <div class="form-container"> 
    <div class="admin-machine-form-container">
         <?php
             $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = $_SESSION[id_user]");
             while($row = mysqli_fetch_assoc($select)){
                ?>
             <form action="" method="post">
             <h3> Edit Your Profile<h3>
             <input type="text" name="name" value="<?php echo $row['name']; ?>" required placeholder="Enter your name">
             <input type="phone" name="phone" value="<?php echo $row['phone']; ?>" required placeholder="Enter your phone">
             <input type="phone" name="quastion" value="<?php echo $row['quastion']; ?>" required placeholder="Enter your favorite color">
             <input type="submit" name="submit" value="Edit" class="form-btn">
             </form>
        <?php }
         ?>
    </div>
</div>

</body>
</html>