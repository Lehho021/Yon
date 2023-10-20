<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h3 class="text-center mb-4">Edit Account</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
      <input type="text" class="form-control w-50 m-auto" name="user_username">
    </div>
    <div class="form-outline mb-4">
      <input type="email" class="form-control w-50 m-auto" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
      <input type="file" class="form-control m-auto" name="user_image">
      <img src="../user/user_images/<?php echo $user_image ?>" alt="" style="width:13%; height:13%">
    </div>
    <div class="form-outline mb-4">
      <input type="text" class="form-control w-50 m-auto" name="user_address">
    </div>
    <div class="form-outline mb-4">
      <input type="text" class="form-control w-50 m-auto" name="user_mobile">
    </div>

    <input type="text" value="Update" class="bg-info py-2 -px-3 border-0 text-light" name="user_update">
    
  </form>
</body>
</html>