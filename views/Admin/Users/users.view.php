<?php require "views/Admin/partials/header.php" ?>
<table class="table table-bordered border-primary mx-auto">
  <thead>
      <tr>
          <th>Name</th>
          <th>Email</th>
          <th>role</th>
      </tr>
  </thead>
  <tbody>
     <?php foreach($users as $user) :?>
        <tr>
          <td><?= $user->name ?></td>
          <td><?= $user->email ?></td>
          <td><?= $user->role ?></td>
      </tr>
        <?php endforeach;?>
  </tbody>
</table>
<?php require "views/Admin/partials/footer.php" ?>