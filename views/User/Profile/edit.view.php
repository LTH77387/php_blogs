<?php require "views/User/partials/header.php" ?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
              <!-- success msg -->
    <?php if(isset($_SESSION['userUpdateSuccess'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['userUpdateSuccess'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['userUpdateSuccess']) ?>
    <?php endif;?>
    <a href="/profile?id=<?= $data->id ?>" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back</a>
            <div class="card mt-2">
                <div class="card-header">
                    <h5 class="text-center">Profile Edit</h5>
                </div>
                <div class="card-body">
                    <form action="/profile-edit" method="post">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="" class="form-control" value="<?= $data->name; ?>">
                    <?php if(isset($_SESSION['nameError'])) :?>
                        <small class="text-danger"><?= $_SESSION['nameError'] ?></small>
                        <?php unset($_SESSION['nameError']) ?>
                        <?php endif;?>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="" class="form-control" value="<?= $data->email; ?>">
                    <?php if(isset($_SESSION['emailError'])) :?>
                        <small class="text-danger"><?= $_SESSION['emailError'] ?></small>
                        <?php unset($_SESSION['emailError']) ?>
                        <?php endif;?>
                    <input type="hidden" name="id" value="<?= $data->id ?>">
                    <input type="hidden" name="method" value="PUT">
                    <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "views/User/partials/footer.php";