<?php require "views/User/partials/header.php" ?>
<!-- Create Post -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- success msg -->
    <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
    <?php endif;?>
    <!-- type error -->
    <?php if(isset($_SESSION['typeError'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['typeError'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['typeError']) ?>
    <?php endif;?>
    <!-- size error -->
    <?php if(isset($_SESSION['sizeError'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['sizeError'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['sizeError']) ?>
    <?php endif;?>
    <!-- error uploading -->
    <?php if(isset($_SESSION['errorUploading'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['errorUploading'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['errorUploading']) ?>
    <?php endif;?>
      <div class="card">
        <div class="card-header bg-dark text-white">Create Post</div>
        <div class="card-body">
          <form method="POST" action="/posts/create" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category_id">
                <option selected disabled>Select Category</option>
               <?php foreach($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                <?php endforeach?>
              </select>
              <?php if(isset($_SESSION['categoryIDErr'])) : ?>
                <small class="text-danger"><?= $_SESSION['categoryIDErr'] ?></small>
                <?php unset($_SESSION['categoryIDErr']) ?>
                <?php endif?>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title">
              <?php if(isset($_SESSION['titleErr'])) : ?>
                <small class="text-danger"><?= $_SESSION['titleErr'] ?></small>
                <?php unset($_SESSION['titleErr']) ?>
              <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
               <textarea name="body" id="" cols="5" rows="5" class="form-control"></textarea>
                <?php if(isset($_SESSION['bodyErr'])) : ?>
                <small class="text-danger"><?= $_SESSION['bodyErr'] ?></small>
                <?php unset($_SESSION['bodyErr']) ?>
              <?php endif; ?>
            </div>
            <div class="mb-3">
              <input type="file" name="image" id="" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "views/User/partials/footer.php"; ?>