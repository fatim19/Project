<!DOCTYPE html>
<html lang="en">
  <?php require_once 'connect.php'; session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>
   <div class="maa">
<form method="POST">

<h1>Complete Your Order</h1>
<p>Credit Card Number:</p>
<input type="tel" name="card_number" inputmode="numeric" class="input txt" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required> 
<p>Expiry Date:</p>

<select class="input ddl" name="month" required>
    <option value="1">01</option>
    <option value="2">02</option>
    <option value="3">03</option>
    <option value="4">04</option>
    <option value="5">05</option>
    <option value="6">06</option>
    <option value="7">07</option>
    <option value="8">08</option>
    <option value="9">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
  </select>
 
  <select class="input ddl" name="year" required>

    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    
  </select>

<p>Name on Card:</p>
<input type="text" name="card_name" placeholder="Name showen on the card" required>

<p>CVV Code:
    <a href="https://www.cvvnumber.com/cvv.html" target="_blank" style="font-size:11px">What is my CVV code?</a>
</p> 

<input type="text" name="cvv" placeholder="Enter CVV code" required>

<p>Street Name:</p> 
<input type="text" name="street" placeholder="Enter street name" required>



<p></p><button name="pay">PLACE YOUR ORFER</button></p>
</form>
<a href="index.php" class="backBtn">Cancel and Go Back to home</a>
<?php
if(isset($_POST['pay']))
{
  $total = 0;
  $select = "SELECT * FROM orders WHERE statuse = 'Confirmation'";
  $result = mysqli_query($conn,$select);

  while($row=mysqli_fetch_assoc($result)){
    $total += $row['price'];

    $update = "UPDATE orders SET statuse = 'Buyed' WHERE id = $row[id]";
    $result_update = mysqli_query($conn,$update);
  }

      $insert = "INSERT INTO payment(id_user, card_number, card_name, expiry_month, expiry_year, cvv_code, street, total)
      VALUES('$_SESSION[id_user]', '$_POST[card_number]', '$_POST[card_name]', '$_POST[month]', '$_POST[year]', '$_POST[cvv]', '$_POST[street]', '$total')";
      $result_insert = mysqli_query($conn,$insert);

      header('location:orders_user.php');
}
?>
</body>
</html>
