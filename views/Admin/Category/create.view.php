<?php require "views/Admin/partials/header.php" ?>



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <div class="card">
        <div class="card-header">
      <a href="/category" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back</a>
            <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif;?>
          <h3 class="text-center">Category</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="create" >
            <div class="form-group">
              <label for="userName">Name:</label>
              <input type="text" class="form-control" name="categoryName">
            </div>
            <div class="text-center">
              <button class="btn btn-secondary mt-4 float-end">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require "views/Admin/partials/footer.php" ?>