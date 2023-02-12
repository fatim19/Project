<html lang="en">
    <head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="css/rent.css">
     <link rel="stylesheet" href="css/style2.css">
    <title> Rent page</title>
    <?php require_once 'check_login_custom.php'; ?>
    <?php require_once 'connect.php'; ?>
    <?php $date_default_timezone = date_default_timezone_set("Asia/Riyadh"); ?>
    </head>

    <nav class="nav"> 

        <div class="nav-header">
        
    <div class="nav-links">
       <ul> 
        
        <form action="connect.php" method="post">
        <a><img src="img/Machinestation.png" class="logo" href="index2.html"></a>
        <li><a href="index2.html" class="split">Machines Station</a></li>
        <li><a href="login.php">Login</a></li>
        <li><div class="dropdown">
            <button class="dropbtn">Signup
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="serviceprovidersignup.php">Signup as a service provider</a>
              <a href="customer_register.php">Signup as a customer</a>
            </div>
          </li>
        <li><a href="service type.html">Services</a></li>
        <li><a href="catagory.html">catagory</a></li>
        <li><a href="FAQ.html">FAQ</a></li>
        <li><a href="About us.html">About Us</a></li>
        </form>
    </ul> 
    </div>

  
</nav>
<div class="container">
        <h2>Rent & Machines page</h2>
     <section class="Rent">
<?php
if(isset($_POST['provider']))
$_SESSION['provider'] = $_POST['provider'];
if(!empty($_SESSION['provider']))
{
    $_SESSION["requested_rent"] = FALSE;
  //rent
  $select_rent = mysqli_query($conn, "SELECT * FROM rent where id_p = '$_SESSION[provider]'");
  while($row = mysqli_fetch_assoc($select_rent)){
    $id = $row['id'];
    $select_rent_statuse = mysqli_query($conn, "SELECT * FROM orders where id_rent = $id AND id_user = $_SESSION[id_user] AND statuse = 'Requested'");
    while($row = mysqli_fetch_assoc($select_rent_statuse)){
    $_SESSION["requested_rent"] = TRUE;
    }
  
?>
      <div class="card">
        <img src="img/<?php echo $row['image']; ?>" alt="camera" style="width: 250px;">
        <h1><?php echo $row['name']; ?></h1>
        <p class="price"><?php echo $row['price']; ?></p>
        <form method="POST" action="rent.php">
        <?php
            if($row['statuse'] == 'Accept' && $_SESSION["requested_rent"] == FALSE)
              echo '<p><button name="order_rent" value="'.$id.'">Order</button></p>';
            elseif($_SESSION["requested_rent"] == TRUE)
              echo '<p>Already requested</p>';
            else
              echo '<p>Unavailable</p>';
        ?>
        </form>
      </div>
<?php
    if(isset($_POST['order_rent']))
    {
      $time = date("H:i:s");
      $select = mysqli_query($conn, "SELECT * FROM rent where id = '$_POST[order_rent]'");
      while($row = mysqli_fetch_assoc($select)){
      $insert = "INSERT INTO orders(id_rent, id_p, id_user, name, time, image, price, statuse) VALUES('$row[id]','$row[id_p]', '$_SESSION[id_user]', '$row[name]', '$time', '$row[image]', '$row[price]', 'Requested')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
        header("location:rent.php");
      }
      }
    }
}
$_SESSION["requested_machine"] = FALSE;
//machine
$select_machine = mysqli_query($conn, "SELECT * FROM add_machines where id_p = '$_SESSION[provider]'");
  while($row = mysqli_fetch_assoc($select_machine)){
    $id = $row['id'];
    $select_machine_statuse = mysqli_query($conn, "SELECT * FROM orders where id_rent = $id AND id_user = $_SESSION[id_user] AND statuse = 'Requested'");
    while($statuse = mysqli_fetch_assoc($select_machine_statuse)){
    $_SESSION["requested_machine"] = TRUE;
    }
?>
      <div class="card">
        <img src="img/<?php echo $row['image']; ?>" alt="camera" style="width: 250px;">
        <h1><?php echo $row['name']; ?></h1>
        <h1><?php echo $row['price']; ?></h1>
        <form method="POST" action="rent.php">
        <?php
            if($row['statuse'] == 'Accept' && $_SESSION["requested_machine"] == FALSE)
              echo '<p><button name="order_machine" value="'.$id.'">Order</button></p>';
            elseif($_SESSION["requested_machine"] == TRUE)
              echo '<p>Already requested</p>';
            else
              echo '<p>Unavailable</p>';
        ?>
        </form>
      </div>
<?php
    if(isset($_POST['order_machine']))
    {
      $time = date("H:i:s");
      $select = mysqli_query($conn, "SELECT * FROM add_machines where id = '$_POST[order_machine]'");
      while($row = mysqli_fetch_assoc($select)){
      $insert = "INSERT INTO orders(id_rent, id_p, id_user, name, time, image, price, statuse) VALUES('$row[id]','$row[id_p]', '$_SESSION[id_user]', '$row[name]', '$time', '$row[image]', '$row[price]', 'Requested')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
        header("location:rent.php");
      }
      }
    }
}
}

?>
     </section>    
    
    </div>
    <div class="footer">
        <div class="col-1">
            <h3>Machines Station</h3>
           <p> @2022 Machines Station. All rights reseved</p>
        </div>
        <div class="col-1"></div>
        <div class="col-1"></div>
    
    </div>
    
    </html>
