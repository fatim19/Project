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
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php

$select = " SELECT * FROM user_form ";
$result = mysqli_query($conn, $select);
 if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row['id'];
       $name=$row['name'];
       $email=$row['email'];
       $phone=$row['phone'];
       $password=$row['password'];
       
       echo '<tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$email.'</td>
       <td>'.$phone.'</td>
       <td>'.$password.'</td>
       

     </tr>'; 
  }
 }
 
 
    ?>

  </tbody>
</table>

</form>
</div>

</body>
</html>