<?php require "views/User/partials/header.php" ?>
 <div class="container mt-5">
     <div class="row">
         <div class="col-md-6 mx-auto mt-5">
         <a href="/" class="text-decoration-none text-dark "> <i class="fas fa-arrow-left"></i>Back</a>
         <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif;?>
         <div class="card mb-5 mx-auto">
          <?php if($post->image) : ?>
            <img class="card-img-top" src="<?= '/storage/' . $post->image ?>" alt="<?= $post->title ?>" >
            <?php endif;?>
     <a style="text-decoration: none;" class="text-dark">
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
            <p class="card-text"><?= $post->body ?></p>
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
            <!-- test for comment
            <div class="card text-center m-auto mt-3 mb-4 p-auto" style="width: 10rem;">
  <div class="card-body" data-bs-toggle="modal" data-bs-target="#comments-modal">
    <a href="/comments" style="text-decoration: none;" >
      <i class="fas fa-comment me-2 text-dark"></i>
      <p style="display: inline-block; font-size: small;" class="text-dark">See All Comments</p>
    </a>
  </div>
</div> -->

<!-- Modal -->
<!-- <div class="modal fade" id="comments-modal" tabindex="-1" aria-labelledby="comments-modal-label" aria-hidden="true">
  <div  class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comments-modal-label">All Comments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> -->
        <!-- Add your comment section here -->
       

      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

              <form action="/comment/create" method="POST">
              <div class="input-group">
               <input type="text" name="body" id="" class="form-control border border-info-subtle rounded-end mt-3" placeholder="Write a comment...">
               <input type="hidden" name="postID" value="<?= $post->id; ?>">
                <button type="submit" class="btn btn-none"><span class="input-group-text bg-transparent border-0"><i class="far fa-paper-plane" style="color: #0dcaf0; font-size: large;"></i></span></button>
              </div>
              <!-- test comment error -->
              <?php if(isset($_SESSION['commentError'])) : ?>
                <small class="m-2 text-danger"><?= $_SESSION['commentError'] ?></small>
                <?php unset($_SESSION['commentError']) ?>
            <?php endif;?>
              </form>
              <!-- specific category -->
              <?php foreach($categories as $category) : ?>
            <?php if($category->id==$post->category_id) : ?>
         <div class="mt-3">
         <b>Category : </b>
       <b><i><small class="text-muted"><?= $category->category_name ?></small></i></b>
         </div>    
              <?php endif;?>
         <?php endforeach;?>
         <hr class="mt-3">
              <?php foreach($comments as $comment) : ?>
                <?php foreach($users as $user) : ?>
                  <?php if($comment->user_id==$user->id) : ?>
                    <?php if($post->id==$comment->post_id) : ?>
                      <h5><?= $user->name ?></h5>
                    <p><?= $comment->body ?></p>
                    <?php endif;?>
                    <?php endif;?>
                  <?php endforeach;?>
                 
                  <?php endforeach;?>
          </div>
        </div>
         </div>
     </div>
 </div>


<?php require "views/User/partials/footer.php"; ?>