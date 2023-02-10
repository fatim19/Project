<?php

@include 'connect.php';
require_once 'check_login_provider.php';

if(isset($_POST['add_machine'])){

  $machine_name = $_POST['machine_name'];
  $machine_price = $_POST['machine_price']; 
  $machine_time = $_POST['machine_time']; 
  $machine_image = $_FILES['machine_image']['name'];
  $machine_image_tmp_name = $_FILES['machine_image']['tmp_name']; 
  $machine_image_folder = 'img/' .$machine_image;

  if(empty($machine_name) || empty($machine_price) || empty($machine_time) || empty($machine_image)){
     $message[] = 'please fill out all';
  }else{
    $insert = "INSERT INTO rent(id_p , name, price, time, image) VALUES('$_SESSION[id_provider]','$machine_name', '$machine_price', '$machine_time', '$machine_image')";
    $upload = mysqli_query($conn,$insert);
    if($upload){
        move_uploaded_file($machine_image_tmp_name, $machine_image_folder);
        $message[] = 'new rent machine added successfully';
        header('location:addrentmachine.php');
    }else{
        $message[] = 'could not add the product';

    }
  }

};

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM rent WHERE id = $id");
    header('location:addrentmachine.php');
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
    <div class="admin-machine-form-container">
         
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
           <h3> Add a new rent machine </h3>
           <input type="text" placeholder="Enter machine name" name="machine_name" class="box" required>
           <input type="number" placeholder="Enter machine price" name="machine_price" class="box" required>
           <input type="time" placeholder="Enter avaible time to rent" name="machine_time" class="box" required>
           <input type="file" accept="image/png, image/jpeg, image/jpg" name="machine_image" class="box" required>
           <input type="submit" class="btn1" name="add_machine" value="add a new machine">

         </form>
    
    </div>

    <?php

      $select = mysqli_query($conn, "SELECT * FROM rent");

    ?>

    <div class="machine-display">

      <table class="machine-display-table">

        <thead>
            <tr>
                <th>Machine image</th>
                <th>Machine name</th>
                <th>Machine price</th>
                <th>Machine time</th>
                <th>Machine statuse</th>
                <th colspan="2">action</th>
            </tr>
        </thead> 
        
        <?php
        
          while($row = mysqli_fetch_assoc($select)){

        ?>

            <tr>
                <td><img src="img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['statuse']; ?></td>
                <td>
                    <a href="rent_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i>Edit</a>
                    <a href="addrentmachine.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i>Delete</a>

            </tr>
            

        <?php   };  ?>


</div>
</body>
</html>