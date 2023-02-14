<!Doctype HTML>
<html>
<?php
require_once 'profile_user.php';
?>
<?php 
    ob_start();
?>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/profile.css" type="text/css"/>
        <link rel="stylesheet" href="css/admin_homepage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <?php
		if(!empty($_SESSION['user_email']))
		{
		}
		else
		{
			echo 'Unauthorized entry!';
			header('location:login.php');
			exit;
		}
		require_once 'connect.php';
		?>
	</head>

    <body>
    <div id="main">

<div class="head">
<div class="container">
     <section class="Rent">
     <table class="table">
     <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">ID Provider</th>
      <th scope="col">ID User</th>
      <th scope="col">ID Rent</th>
      <th scope="col">ID Machine</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Price</th>
      <th scope="col">Statuse</th>
    </tr>
  </thead>
  <tbody>
<?php
  $select = "SELECT * FROM orders";
  $result = mysqli_query($conn, $select);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $id_p=$row['id_p'];
        $id_user=$row['id_user'];
        $id_rent=$row['id_rent'];
        $id_machines=$row['id_machines'];
        $name=$row['name'];
        $time=$row['time'];
        $price=$row['price'];
        $statuse=$row['statuse'];
       
       echo '
       <tr>
       <th scope="row">'.$id.'</th>
       <td>'.$id_p.'</td>
       <td>'.$id_user.'</td>
       <td>'.$id_rent.'</td>
       <td>'.$id_machines.'</td>
       <td>'.$name.'</td>
       <td>'.$time.'</td>
       <td>'.$price.'</td>
       <td>'.$statuse.'</td>
       </tr>';
  }
 }
?>
      </tbody>
     </table>

     <br><br><br><br><br><br><br>
     <?php
         $count = 0;
         $total = 0;
         $x = FALSE;
         $select = "SELECT * FROM orders WHERE statuse = 'Confirmation'";
         $result = mysqli_query($conn,$select);
         while($row=mysqli_fetch_assoc($result)){
          $x = TRUE;
          $total += $row['price'];
          $count++;
         }
          if($x)
          {
            $x++;
            ?>
                <table class="table">
                <tr>
                <th>Number of products</th>
                <th>Total</th>
                <th>Pay</th>
                </tr>
                <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $total; ?></td>
                <td><a href="Payment.php">Go to pay</a></td>
                </tr>
                </table>
            <?php
          }
     ?>
     <thead>
    </body>
    <?php
    ob_end_flush();
    ?>
</html>