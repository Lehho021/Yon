<?php

  include('./includes/connect.php');
  include('./functions/common_functions.php');
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YON (You Get Now)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
      .navbar{
        margin-top: 0;
        margin-bottom: 0;
      }
      .card-img-top{
        width: 100%; 
        height: 200px;
        object-fit: contain;
      }
      body {
        overflow-x: hidden;
      }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-body-light">
        <div class="container-fluid">
            <img src="./assets/logo.png" alt="Logo" class="logo" style="width: 4%; height:4%">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="display_all.php">iPhone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">iPad</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Watch
                      </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Apple Watch Ultra</a></li>
                            <li><a class="dropdown-item" href="#">Apple Watch Series 8</a></li>
                            <li><a class="dropdown-item" href="#">Apple Watch Series 7</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mac</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aksesoris</a>
                    </li>
                </ul>
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <a href="cart.php" class="btn btn-link text-dark">
                          <i class="fa-solid fa-bag-shopping fa-lg">
                            <sup>
                              <?php
                               echo cart_item();
                              ?>
                            </sup>
                          </i>
                        </a>
                      <?php
                      if(!isset($_SESSION['username'])){
                        echo "<a href='./user/user_login.php' class='btn btn-outline-success'>Login</a>";
                      }else{
                        echo "<a href='./user/logout.php' class='btn btn-outline-success'>Logout</a>";
                      }
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<?php
cart();
?>

<div class="container">
  <div class="row">
    <form action="" method="post">
      <table class="table table-bordered text-center mt-5">
          <?php
          $get_ip_add = getIPAddress();
          $total_price = 0;
          $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){   
          while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);
          while ($row_product_price = mysqli_fetch_array($result_products)) {
              $product_price = array($row_product_price['product_price']);
              $price_table = $row_product_price['product_price'];
              $product_title = $row_product_price['product_title'];
              $product_image1 = $row_product_price['product_image1'];
              $product_values = array_sum($product_price);
              $total_price += $product_values;
              ?>
                <thead>
                    <tr>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                <tbody>

              <tr>
                <td><?php echo $product_title ?></td>
                <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img" style="width: 20%;"></td>
                <td><input type="text" name="qty" class="form-input w-75 "></td>

                <?php
                $get_ip_add = getIPAddress();
                if (isset($_POST['update_cart'])) {
                  $quantities = $_POST['qty'];
                  $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                  $result_products_quantity = mysqli_query($con, $update_cart);
                  $total_price = $total_price * $quantities;
                }
                ?>

                <td>Rp <?php echo $price_table ?></td>
                <td>
                  <input type="checkbox" name="removeitem[]" value=
                    "<?php echo $product_id ?>">
                </td>
                <td class="d-flex align-items-center justify-content-between">
                  <input type="submit" value="Update Cart" class="bg-info text-light px-3 py-2 border-0 mx-3" name="update_cart">
                  <input type="submit" value="Remove Cart" class="bg-info text-light px-3 py-2 border-0 mx-3" name="remove_cart">
                </td>
              </tr>
            <?php
              }
            }
          }
          else{
            echo "<h2 class='text-center mt-5'> Cart is empty</h2>";
          }
          ?>

        </tbody>
      </table>
      <div class="d-flex mb-5">
        <?php
          $get_ip_add = getIPAddress();
          $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0)
          {
            echo "<h4 class='px-3'>Total: <strong class='text-dark'>Rp $total_price</strong></h4>
              <button class='bg-success px-3 py-2 border-0'>
                <a href='./user/checkout.php' class='text-light text-decoration-none'>Checkout</a>
              </button>   
              <input type='submit' value='Continue Shopping' class='bg-info text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>
            ";
          }else{
            echo "<input type='submit' value='Continue Shopping' class='bg-info text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>";
          }

          if(isset($_POST['continue_shopping']))
          {
            echo "<script>window.open('index.php', '_self')</script>";
          }
        ?>
        
      </div>
    </div>
  </div>
</form>
    <?php
    function remove_cart_item(){
      global $con;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
          echo $remove_id;
          $delete_query = "DELETE FROM `cart_details` where product_id=$remove_id";
          $run_delete = mysqli_query($con, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php', '_self')</script>";
          }
        }
        
      }
    }
    echo $remove_item = remove_cart_item();
    ?>


  <footer class="footer bg-dark text-white text-center p-3 mt-5">
      <p>COPYRIGHT © 2023 YON. ALL RIGHTS RESERVED</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
