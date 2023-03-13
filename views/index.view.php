<?php require "partials/header.php" ?>
<h1>Home Page</h1>
<?php foreach($users as $user) : ?>
    <p><?= $user->name ?></p>
    <?php endforeach; ?>
<?php require "partials/footer.php" ?>