<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
</head>
<body>
  
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-3">
    <a href="/" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back</a>
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Register</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="/register" enctype="multipart/form-data">
            <div class="form-group">
              <label for="userName">Name:</label>
              <input type="text" class="form-control" name="userName" id="userName">
                <?php if(isset($_SESSION['nameErr'])) : ?>
                    <span class="text-danger"><?= $_SESSION['nameErr'] ?></span>
                <?php unset($_SESSION['nameErr']); ?>
                <?php endif; ?>

            </div>
            <div class="form-group">
              <br><label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control">
              <?php if(isset($_SESSION['emailErr'])) : ?>
                <span class="text-danger"><?= $_SESSION['emailErr'] ?></span>
                <?php unset($_SESSION['emailErr']); ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
              <br><label for="password">Password:</label>
              <input type="password" name="password" id="password" class="form-control mb-3">
              <?php if(isset($_SESSION['passwordErr'])) : ?>
                <span class="text-danger"><?= $_SESSION['passwordErr'] ?></span>
                <?php unset($_SESSION['passwordErr']); ?>
                <?php endif; ?>
            </div>
         
            <!-- <div class="form-group">
              <br><label for="image">Choose Image</label>
              <input type="file" name="image" id="image" class="form-control">
            </div> -->
            <div class="text-center">
              <button class="btn btn-secondary mt-4 float-end">Register</button>
            </div>
          </form>
          <small>Already have an account?<a href="/login">Login</a></small>
        </div>
       
      </div>
   
    </div>
   
  </div>
</div>

<?php require "views/User/partials/footer.php" ?>