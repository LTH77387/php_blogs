<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand mx-5" href="#">B l o g s</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts/create">Create a post</a>
        </li>
        <!-- if user has logged in, no login or register buttons are required -->
       <?php if(!isset($_SESSION['user_id'])) :?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/register">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/login">Sign In</a>
        </li>
        <?php endif;?>
    <?php if(isset($_SESSION['user_id'])) : ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="badge bg-secondary"><?= $_SESSION['user_name'] ?></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile?id=<?= $_SESSION['user_id'] ?>">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
      <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
