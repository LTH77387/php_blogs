<?php require "views/User/partials/header.php" ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h2 class="mb-4 mt-5">Uploaded Posts</h2>
      <?php foreach($posts as $post) : ?>
        <div class="card mb-5 mx-auto">
        <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif;?>
          <?php if($post->image) : ?>
            <img class="card-img-top" src="<?= '/storage/' . $post->image ?>" alt="<?= $post->title ?>" >
            <?php endif;?>
     <a href="/post?id=<?= $post->id ?>" style="text-decoration: none;" class="text-dark">
     <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
             <h5 class="card-title"><b><i>Title :</i>
             </b><?= $post->title ?></h5>
              <!-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-info"></i> Options
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <button class="dropdown-item" onclick="editPost(<?= $post->id ?>)"><i class="fas fa-pencil"></i> Edit</button>
            <button class="dropdown-item" onclick="deletePost(<?= $post->id ?>)"><i class="fas fa-trash"></i> Delete</button>
        </ul>
        </div> -->
            </div>
           <!-- post body text goes here -->
            <div class="d-flex justify-content-between align-items-center">
        
              <small class="text-muted" id="post-time-<?= $post->id ?>">
                <?php
                  $post_created_at = new DateTime($post->created_at);
                  $post_updated_at=new DateTime($post->updated_at);
                  if($post_updated_at!==$post_created_at){
                    echo  $post_updated_at->format('Y-m-d H:i:s');
                  }else {
                    echo $post_created_at->format('Y-m-d H:i:s'); // output hidden timestamp for JS use
                  }
                
                ?>
              </small>
            </div>
              <!-- specific category -->
              <?php foreach($categories as $category) : ?>
            <?php if($category->id==$post->category_id) : ?>
         <div class="mt-3">
         <b>Category : </b>
       <a href="" class="text-decoration-none">  <b><i><small class="text-muted"><?= $category->category_name ?></small></i></b></a>
         </div>
        
              <?php endif;?>
         <?php endforeach;?>
          </div>
        </div>
     </a>
      <?php endforeach ?> 
    </div>
  </div>
</div>

<?php require "views/User/partials/footer.php" ?>

<script>
  // Update the post time every second
  setInterval(function() {
    const postTimes = document.querySelectorAll('[id^="post-time-"]');
    postTimes.forEach(function(postTime) {
      const timestamp = Date.parse(postTime.innerText);
      const now = Date.now();
      const elapsed = now - timestamp;
      const hoursAgo = Math.floor(elapsed / 3600000);
      const minutesAgo = Math.floor(elapsed / 60000) % 60;
      
      // format the elapsed time as "X hours and Y minutes ago"
      let timeAgoString = "";
      if (hoursAgo > 0) {
        timeAgoString += `${hoursAgo} hour${hoursAgo > 1 ? "s" : ""} `;
      }
      timeAgoString += `${minutesAgo} minute${minutesAgo > 1 ? "s" : ""} ago`;
      
      // format the post time as "Mmm Dd, YYYY hh:mm (X hours and Y minutes ago)"
      const timeAgo = new Date(timestamp);
      postTime.innerText = `${new Intl.DateTimeFormat(navigator.language, {
        month: 'short',
        day: 'numeric',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric'
      }).format(timeAgo)} (${timeAgoString})`;
    });
  }, 1000);

function deletePost(id){
   if(confirm("Are you sure to delete this post")){
    window.location.href = "/post/delete?id=" + id;
   }
}
function editPost(id){
    window.location.href = "/post/update?id=" + id;
}

</script>

