<?php

  include('../includes/connect.php');
  include('../functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>

<div class="container">
  <?php
    $user_ip=getIPAddress();
    $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
  ?>


  <h2 class="text-center mt-5">Payment Method</h2>
  <div class="row">
    <div class="col-md-6 d-flex align-items-center mt-4">
      <a href="https://www.paypal.com" target="_blank" class="text-decoration-none text-dark">
        <div class="card">
          <img src="../assets/paypal-2.png" alt="" class="card-img-top img-fluid">
          <div class="card-body text-center">
            <h5 class="card-title">Paypal</h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-6 d-flex align-items-center mt-4">
      <a href="order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none text-dark">
        <div class="card card1">
          <img src="../assets/bayar-tempat.png" alt="" class="card-img-top img-fluid">
          <div class="card-body text-center">
            <h5 class="card-title">Bayar ditempat</h5>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>