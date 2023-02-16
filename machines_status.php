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



<div class="container">

<form action="" method="post">
  <h3> dachboard <h3>

  <table class="table">
  <h3> Rent Machines Requests <h3>
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
       <input type="submit" name="<?php echo $id; ?>" class="btn" value="Reject">
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
<br><br><br><br><br><br>
<!--Machines information-->
<table class="table">
<h3> Services Provide Requests <h3>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Version</th>
      <th scope="col">Description</th>
      <th scope="col">Statuse</th>
    </tr>
  </thead>
  <tbody>
    <?php

$select = "SELECT * FROM add_machines";
$result = mysqli_query($conn, $select);
 if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row['id'];
       $name=$row['name'];
       $version=$row['version'];
       $description=$row['description'];
       $statuse=$row['statuse'];
       
       echo '<tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$version.'</td>
       <td>'.$description.'</td>
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
    $update = "UPDATE add_machines SET statuse ='".$_POST[$id]."' WHERE id = $id";
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