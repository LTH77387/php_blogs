<?php require "views/Admin/partials/header.php" ?>
<!-- for index to show category lists -->
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto mt-5">
      <div class="card">
      <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif;?>
        <div class="card-header bg-dark text-white">
          <h4 class="mb-0">Categories</h4>
       <a href="/category/create"><button class="btn btn-light btn-sm float-end"><i class="bi bi-plus"></i> Add Category</button></a>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach($categories as $category) : ?>
                <tr>
                <td><?= $category->id ?></td>
                <td><?= $category->category_name ?></td>
                <td>
                 <a href="/category/update?id=<?= $category->id ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                 <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $category->id ?>)"><i class="bi bi-trash"></i> Delete</button>
                </td>
              </tr>
                <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this category?")) {
    window.location.href = "/category/delete?id=" + id;
  }
}
</script>
<?php require "views/Admin/partials/footer.php" ?>