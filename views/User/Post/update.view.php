<?php require "views/User/partials/header.php" ?>
<!-- Create Post -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 mt-5">
    <a href="/" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back</a>
    <?php if(isset($_SESSION['updateSuccess'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['updateSuccess'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['updateSuccess']) ?>
            <?php endif;?>
    <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif;?>
      <div class="card">
        <div class="card-header bg-dark text-white">Edit Post</div>
        <div class="card-body">
        <form method="POST" action="/post/update" enctype="multipart/form-data">
      <?php if(isset($post->image)) : ?>
        <div class="text-center my-3">
        <img src="<?= '/storage/' . $post->image ?>" alt="" class="rounded-circle" style="width: 150px; height: 150px;" >
          </div>
        <?php endif;?>

        
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category_id">
                <option selected disabled>Select Category</option>
                <!-- $post htl ka category_id nk $category (loop pat htr tk) htl ka id nk tuu ny tk kg ka selected -->
               <?php foreach($categories as $category) : ?>
                <?php if($post->category_id==$category->id) : ?>
                    <option value="<?= $post->category_id ?>" selected><?= $category->category_name ?></option>
                    <?php else :?>
                        <option value="<?= $category->id ?>" ><?= $category->category_name ?></option>
                    <?php endif?>
               
                <?php endforeach?>
              </select>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="<?= $post->title ?>">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
               <textarea name="body" id="" cols="5" rows="5" class="form-control"><?= $post->body ?></textarea>
            </div>
            <div class="mb-3">
              <input type="file" name="updateImage" id="" class="form-control">
            </div>
            <input type="submit" value="Update" class="btn btn-primary">
            <input type="hidden" name="id" value="<?= $post->id ?>">
              <input type="hidden" name="method" value="PUT">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "views/User/partials/footer.php"; ?>