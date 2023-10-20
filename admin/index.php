<?php

  include('../includes/connect.php');
  include('../functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
      .card-img-top{
        width: 100%; 
        height: 200px;
        object-fit: contain;
      }

      .admin_image{
        width: 100px;
        object-fit: contain;
      }
  </style>
</head>
<body>

  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-body-light">
        <div class="container-fluid">
          <img src="../assets/logo.png" alt="Logo" class="logo" style="width: 4%; height:4%">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="" class="nav-link">
                  Welcome Guest
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </nav>

    <div class="bg-body-light">
      <h3 class="text-center p-2 mt-3">Manage Details</h3>
    </div>

    <div class="row mt-5">
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="px-5 mt-4">
          <a href=""><img src="../assets/admin.jpeg" class="admin_image"></a>
          <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center">
          <button class="my-5"><a href="insert_product.php" class="nav-link text-dark bg-body-light">Insert Products</a></button>
          <button><a href="index.php?view_products" class="nav-link text-dark bg-body-light">View Products</a></button>
          <button><a href="index.php?insert_category" class="nav-link text-dark bg-body-light">Insert Categories</a></button>
          <button><a href="" class="nav-link text-dark bg-body-light">View Categories</a></button>
          <button><a href="" class="nav-link text-dark bg-body-light">All Orders</a></button>
          <button><a href="" class="nav-link text-dark bg-body-light">All Payments</a></button>
          <button><a href="" class="nav-link text-dark bg-body-light">List Users</a></button>
          <button><a href="" class="nav-link text-dark bg-body-light">Logout</a></button>
        </div>
      </div>
    </div>
  

    <div class="container my-5">

    <?php

      if(isset($_GET['insert_category'])){
        include('insert_categories.php');
      }
      if(isset($_GET['view_products'])){
        include('view_products.php');
      }
      if(isset($_GET['edit_products'])){
        include('edit_products.php');
      }
      if(isset($_GET['delete_product'])){
        include('delete_product.php');
      }

    ?>

    </div>

  <footer class="footer bg-dark text-white text-center p-3 mt-5">
      <p>COPYRIGHT © 2023 YON. ALL RIGHTS RESERVED</p>
  </footer>
  </div>  
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>