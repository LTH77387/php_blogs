<?php require "views/User/partials/header.php" ?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
    <a href="/" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back</a>
            <div class="card mt-2">
                <div class="card-header">
                    <h5 class="text-center">Profile</h5>
                </div>
                <div class="card-body">
                    <label for="name">Name :</label>  &nbsp;&nbsp;&nbsp;  <span><?= $data->name ?></span><br><br>
                    <label for="name">Email :</label>  &nbsp;&nbsp;&nbsp;  <span><?= $data->email ?></span><br><br>
                </div>
               <a href="/profile-edit?id=<?= $data->id ?>"  class="m-3 text-decoration-none" style="text-align: right;"> <span>Change User Name and Email</span></a>
            </div>
        </div>
    </div>
</div>


<?php require "views/User/partials/footer.php";