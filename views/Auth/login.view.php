<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
<?php if(isset($_SESSION['loginError'])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $_SESSION['loginError'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php unset($_SESSION['loginError']) ?>
<?php endif;?>
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-3">
    <a href="/" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back to Home Page</a>  
    <div class="card">
        <div class="card-header">
          <h3 class="text-center">Login</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="">
            <div class="form-group">
              <br><label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control">
              <?php if(isset($_SESSION['emailError'])) : ?>
                <span class="text-danger"><?= $_SESSION['emailError'] ?></span>
                <?php unset($_SESSION['emailError']); ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
              <br><label for="password">Password:</label>
              <input type="password" name="password" id="password" class="form-control mb-3">
              <?php if(isset($_SESSION['passwordError'])) : ?>
                <span class="text-danger"><?= $_SESSION['passwordError'] ?></span>
                <?php unset($_SESSION['passwordError']); ?>
                <?php endif; ?>
            </div>
            <div class="text-center">
              <button class="btn btn-secondary mt-4 float-end">Login</button>
            </div>
          </form>
          <a href="/register" class="text-decoration-none"> <i class="fas fa-arrow-left"></i>Back to register page</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "views/User/partials/footer.php" ?>