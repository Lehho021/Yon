<?php

  include('../includes/connect.php');
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
            <img src="../assets/logo.png" alt="Logo" class="logo" style="width: 4%; height:4%">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
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
                      <?php
                      if(!isset($_SESSION['username'])){
                        echo "<a href='./user_login.php' class='btn btn-outline-success'>Login</a>";
                      }else{
                        echo "<a href='logout.php' class='btn btn-outline-success'>Logout</a>";
                      }
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<div class="row px-1">
  <div class="col-md-12">
    <div class="row">
      <?php
      if(!isset($_SESSION['username'])){
        include('user_login.php');
      }else{
        include('./payment.php');
      }
      ?>
    </div>
  </div>
</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
