<?php


  function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
      $select_query = "SELECT * FROM `products` order by rand() limit 0,9";
      $result_select = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_select)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
        echo "
          <div class='col-md-4 mb-2 mt-5'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title text-center'>$product_title</h5>
              <p class='card-text text-center'>$product_description</p>
              <p class='card-text text-center text-body-tertiary'>Rp $product_price</p>
              <div class='text-center'>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'><i class='fa-solid fa-plus'></i> Keranjang</a>
                <a href='details.php?product_id=$product_id' class='btn btn-secondary'><i class='fa-solid fa-circle-info'></i> Details</a>
              </div>
            </div>
          </div>";
      }
    }
  }

  function details($product_id) {
      global $con;
      $query = "SELECT * FROM `products` WHERE product_id = $product_id";
      $result = mysqli_query($con, $query);

      if ($row = mysqli_fetch_assoc($result)) {
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];

          echo "<div class='card text-center border rounded' style='max-width: 500px; margin-top: 20px; margin-left:44rem;'>";
          echo "<img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title' style='max-width: 200px; max-height: 200px; margin: 0 auto;' />";
          echo "<div class='card-body'>";
          echo "<h5 class='card-title'>$product_title</h5>";
          echo "<p class='card-text'>$product_description</p>";
          echo "</div>";
          echo "</div>";
      } else {
          echo "Produk tidak ditemukan.";
      }
  }







  function get_unique_categories(){
    global $con;
    if(isset($_GET['category'])){
      $category_id=$_GET['category'];
      $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
      $result_select = mysqli_query($con, $select_query);
      $num_of_rows=mysqli_num_rows($result_select);
      if($num_of_rows==0){
        echo "
        <h2 class='text-center text-danger mt-5'>
        Tidak Ada Stock Untuk Kategori Ini
        </h2>";
      }
    while($row = mysqli_fetch_assoc($result_select)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
        echo "
          <div class='col-md-4 mb-2 mt-5'>
            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title text-center'>$product_title</h5>
              <p class='card-text text-center'>$product_description</p>
              <p class='card-text text-center text-body-tertiary'>Rp $product_price</p>
              <div class='text-center'>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'><i class='fa-solid fa-plus'></i> Keranjang</a>
                <a href='#' class='btn btn-secondary'><i class='fa-solid fa-circle-info'></i> Details</a>
              </div>
            </div>
          </div>";
      }
    }
  }

  function getcategories(){
    global $con;
      $select_categories = "SELECT * FROM `categories`";
      $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
        echo "
        <li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-dark'>$category_title</a>
        </li>";
    }
  }

  function getIPAddress() {  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

     

function cart() {
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id ";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
          if($num_of_rows>0){
            echo "
            <script>
            alert ('Barang Ditambahkan')
            </script>";
            echo "
            <script>
            window.open('index.php','_self')
            </script>";
        }else {
          $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) 
          VALUES ($get_product_id, '$get_ip_add', 1)";
          $result_query = mysqli_query($con, $insert_query);
            echo"
            <script>
            alert ('Barang Ditambahkan')
            </script>";
            echo"
            <script>
            window.open('index.php','_self')
            </script>";

        } 
      }
    }


  function cart_item(){
    if (isset($_GET['add_to_cart'])) {
      global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }else{
        global $con;
          $get_ip_add = getIPAddress();
          $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
          $result_query = mysqli_query($con, $select_query);
          $count_cart_items = mysqli_num_rows($result_query);
      }
    echo $count_cart_items;
  }

  function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="SELECT * FROM `user_table` WHERE username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
          if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
              $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id and order_status='pending'";
                $result_orders_query=mysqli_query($con,$get_orders);
                $row_count=mysqli_num_rows($result_orders_query);
                  if($row_count>0){
                    echo "<h3 class='text-center mt-5 mb-2'>You Have $row_count Pending Orders</h3>
                      <p class='text-center'><a href='profile.php?my_orders' class='text-dark' >Order Details</a></p>";
            }else{
              echo "<h3 class='text-center mt-5 mb-2'>You Have zero Pending Orders</h3>
                <p class='text-center'><a href='../index.php' class='text-dark' >Explore Products</a></p>";
            }
          }
        }
      }
    }
  }
?>

