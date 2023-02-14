<?php

@include 'connect.php';
require_once 'check_login_provider.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $major = mysqli_real_escape_string($conn, $_POST['major']);
    $quastion = mysqli_real_escape_string($conn, $_POST['quastion']);
    $city = $_POST['city'];
    $gender = $_POST['gender'];

            $update = "UPDATE provider_form SET name = '$name', phone = '$phone', major = '$major', city = '$city', gender = '$gender', quastion = 'quastion' WHERE id = $_SESSION[id_provider]";
            mysqli_query($conn, $update);
            move_uploaded_file($provider_image_tmp_name, $provider_image_folder);
            header('location:profile_provider.php');
}

        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.' </span>';

            };
        };

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
         <?php
             $select = mysqli_query($conn, "SELECT * FROM provider_form WHERE id = $_SESSION[id_provider]");
             while($row = mysqli_fetch_assoc($select)){
                ?>
             <form action="" method="POST">
                 <h3>edit your profile<h3>

        <input type="text" name="name" value="<?php echo $row['name']; ?>" required placeholder="Enter your name" required>
        <input type="phone" name="phone" value="<?php echo $row['phone']; ?>" required placeholder="Enter your phone" required>
        <input type="phone" name="major" value="<?php echo $row['major']; ?>" required placeholder="Enter your major" required>
        <label for="city"><b>City</b></label>
        <select name="city" required>
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

  <select name="gender" required>
    <option value="Female">Female</option>
    <option value="Male">Male</option>
     
  </select>
        <input type="text" name="quastion" value="<?php echo $row['quastion']; ?>" required placeholder="Enter your favorite color" required>
        
        
<input type="submit" name="submit" value="Edit" class="form-btn">



  </form>
             <?php }
         ?>
    </div>

</body>
</html>