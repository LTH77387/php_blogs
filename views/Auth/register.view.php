<?php require "views/partials/header.php" ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <div class="card">
        <div class="card-header">
            <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif;?>
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
              <input type="password" name="password" id="password" class="form-control">
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
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "views/partials/footer.php" ?>