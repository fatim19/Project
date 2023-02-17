<!Doctype HTML>
<html>
<?php
require_once 'profile_provider.php';
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
		if(!empty($_SESSION['provider_email']))
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
       $description=$row['description'];
       $statuse=$row['statuse'];
       
       echo '
       <tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$time.'</td>
       <td>'.$description.'</td>
       <td>';
       if($statuse == 'Requested')
       {
        ?>
        <form method="POST" action="orders_provider.php">
        <input type="submit" name="<?php echo $id; ?>" value="Accept">
        <input type="submit" name="<?php echo $id; ?>" value="Reject">
        </form>
        <?php
         echo '</td>';   
         }
       else
        echo $statuse;
        echo '</tr>';

 if(isset($_POST[$id]))
 {
    $update = "UPDATE orders SET statuse ='".$_POST[$id]."' WHERE id = $id AND id_machines = $row[id_machines]";
    $upload = mysqli_query($conn,$update);
    header('location:orders_provider.php');
 }
  }
 }
?>
      </tbody>
     </table>

     <br><br><br><br><br>

     <!-- rent -->
     <table class="table">
     <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Statuse</th>
    </tr>
  </thead>
  <tbody>
<?php
  $select = " SELECT * FROM orders WHERE id_rent IS NOT NULL AND id_p = $_SESSION[id_provider]";
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
       <td>';
       if($statuse == 'Requested')
       {
        ?>
        <form method="POST" action="orders_provider.php">
        <input type="submit" name="<?php echo $id; ?>" value="Accept">
        <input type="submit" name="<?php echo $id; ?>" value="Reject">
        </form>
        <?php
         echo '</td>';   
         }
       else
        echo $statuse;
        echo '</tr>';

 if(isset($_POST[$id]))
 {
    $update = "UPDATE orders SET statuse ='".$_POST[$id]."' WHERE id = $id AND id_rent = $row[id_rent]";
    $upload = mysqli_query($conn,$update);
    header('location:orders_provider.php');
 }
  }
 }
?>
      </tbody>
     </table>
     <?php
    ob_end_flush();
    ?>
    </body>
</html>     