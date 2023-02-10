
<!Doctype HTML>
<html>
<?php
require_once 'profile_user.php';
?>

	<head>
		<title></title>
		<link rel="stylesheet" href="css/profile.css" type="text/css"/>
        <link rel="stylesheet" href="css/admin_homepage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <?php
		session_start();
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
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Statuse</th>
    </tr>
  </thead>
  <tbody>
<?php
  $select = " SELECT * FROM orders WHERE id_user = $_SESSION[id_user]";
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
       <td>'.$statuse.'</td>';   
        echo '</tr>';
  }
 }
?>
      </tbody>
     </table>
    </body>
</html>