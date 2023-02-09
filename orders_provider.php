<!Doctype HTML>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/profile.css" type="text/css"/>
        <link rel="stylesheet" href="css/admin_homepage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <?php
		session_start();
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
  $select = " SELECT * FROM orders WHERE id_p = $_SESSION[id_provider]";
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
       if(!empty($statuse))
        echo $statuse;
       elseif(empty($statuse))
       {
       ?>
       <form method="POST" action="orders_provider.php">
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
    $update = "UPDATE orders SET statuse ='".$_POST[$id]."' WHERE id = $id";
    $upload = mysqli_query($conn,$update);
    header('location:orders_provider.php');
 }
  }
 }
?>
      </tbody>
     </table>
    </body>
</html>