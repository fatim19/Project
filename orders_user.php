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
      <!-- machines -->
     <table class="table">
     <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Description</th>
      <th scope="col">Statuse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
  $select = "SELECT DISTINCT o.id, o.name, o.time, o.statuse, m.description, o.id_machines FROM add_machines m , orders o WHERE id_machines IS NOT NULL AND m.id = o.id_machines AND o.id_user = $_SESSION[id_user]";
  $result = mysqli_query($conn, $select);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row['id'];
       $name=$row['name'];
       $time=$row['time'];
       if($row['id_machines'] != NULL)
       $description=$row['description'];
       else
       $description="";
       $statuse=$row['statuse'];
       
       echo '
       <tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$time.'</td>
       <td>'.$description.'</td>
       <td>'.$statuse.'</td>
       <td>';
       if($row['statuse'] == 'Accept')
       {
       ?>
       <form method="POST" action="orders_user.php">
       <input type="submit" name="<?php echo $id; ?>" value="Confirmation">
       <input type="submit" name="<?php echo $id; ?>" value="Cancele">
       </form>
       <?php
       }
       echo '</td>';
       echo '</tr>';
        if(isset($_POST[$id]))
        {
          $update = "UPDATE orders SET statuse ='".$_POST[$id]."' WHERE id = $id";
          $upload = mysqli_query($conn,$update);
          header('location:orders_user.php');
        }
  }
 }
?>
      </tbody>
     </table>

     <br><br><br><br><br><br><br>

     <!-- rent -->
     <table class="table">
     <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Statuse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
  $select = "SELECT DISTINCT id, name, time, statuse FROM orders o WHERE id_rent IS NOT NULL AND id_user = $_SESSION[id_user]";
  $result = mysqli_query($conn, $select);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
       $id=$row['id'];
       $name=$row['name'];
       $time=$row['time'];
       $statuse=$row['statuse'];
       
       echo '
       <tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$time.'</td>
       <td>'.$statuse.'</td>
       <td>';
       if($row['statuse'] == 'Accept')
       {
       ?>
       <form method="POST" action="orders_user.php">
       <input type="submit" name="<?php echo $id; ?>" value="Confirmation">
       <input type="submit" name="<?php echo $id; ?>" value="Cancele">
       </form>
       <?php
       }
       echo '</td>';
       echo '</tr>';
        if(isset($_POST[$id]))
        {
          $update = "UPDATE orders SET statuse ='".$_POST[$id]."' WHERE id = $id";
          $upload = mysqli_query($conn,$update);
          header('location:orders_user.php');
        }
  }
 }
?>
      </tbody>
     </table>

     <br><br><br><br><br><br><br>
     <!-- pay -->
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