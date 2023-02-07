<?php


@include 'connect.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

  $machine_name = $_POST['machine_name'];
  $machine_price = $_POST['machine_price']; 
  $machine_time = $_POST['machine_time']; 
  $machine_image = $_FILES['machine_image']['name'];
  $machine_image_tmp_name = $_FILES['machine_image']['tmp_name']; 
  $machine_image_folder = 'img/' .$machine_image;

  if(empty($machine_name) || empty($machine_price) || empty($machine_time) || empty($machine_image)){
     $message[] = 'please fill out all';
  }else{
    $update = "UPDATE rent SET name='".$machine_name."', price='".$machine_price."', time='".$machine_time."', image='".$machine_image."'
    WHERE id = ".$id."";
    $upload = mysqli_query($conn,$update);
    if($upload){
        move_uploaded_file($machine_image_tmp_name, $machine_image_folder);
    }else{
        $message[] = 'could not add the product';

    }
  }

};


?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-euiv="X-UA-Compatible"  content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add rent machines</title>
  <link rel="stylesheet" href="css/addrentmachine.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>

<?php

if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}

?>

<div class="container">
    <div class="admin-machine-form-container centered">

    <?php 

    $select = mysqli_query($conn, "SELECT * FROM rent WHERE id = $id");
    while($row = mysqli_fetch_assoc($select)){

    

    ?>
         
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
           <h3> update the machine </h3>
           <input type="text" placeholder="Enter machine name" value="<?php $row['name']; ?>" name="machine_name" class="box">
           <input type="number" placeholder="Enter machine price" value="<?php $row['price']; ?>" name="machine_price" class="box">
           <input type="time" placeholder="Enter avaible time to rent" value="<?php $row['time']; ?>" name="machine_time" class="box">
           <input type="file" accept="image/png, image/jpeg, image/jpg" name="machine_image" class="box">
           <input type="submit" class="btn" name="update_machine" value="update machine">
           <a href="addrentmachine.php" class="btn">Go back</a>

         </form>

         <?php }; ?>
    
    </div>


</body>
</html>