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
                        <a class="nav-link" aria-current="page" href="#">iPhone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">iPad</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role, button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                cart_item();
                              ?>
                            </sup>
                          </i>
                        </a>

                <?php
                  if(!isset($_SESSION['username'])){
                    echo "<a href='./user/user_login.php' class='btn btn-outline-success'>Login</a>";
                  } else {
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

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/bg1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/bg2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/bg1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="row px-1">
  <div class="col-md-10">
    <div class="row">
    
    <?php
    getproducts();
    get_unique_categories();
    $ip = getIPAddress();
    $ip = 'User Real IP Address - '.$ip;
    ?>

  </div>
</div>
  
  <div class="col-md-2 bg-body-secondary mb-2 p-0 mt-5">
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-dark">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>

      <?php
      getcategories();
      ?>

    </ul>
  </div>
</div>

  <footer class="footer bg-dark text-white text-center p-3 mt-5">
      <p>COPYRIGHT © 2023 YON. ALL RIGHTS RESERVED</p>
  </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
