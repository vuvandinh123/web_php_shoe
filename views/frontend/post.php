<?php require_once('views/frontend/header.php'); ?>
<?php

use App\Models\Post;

$list_post = Post::where([['status', '=', '1'], ['type', '!=', 'page']])->get();

?>
<div class="container">
  <h2 class="text-center mt-5 fs-1">TẤT CẢ BÀI VIẾT</h2>
  <div class="card-group p-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php foreach ($list_post as  $post) : ?>
        <div class="col">
          <a href="?option=post&cat=<?= $post->slug ?>">
            <div class="card">
              <img src="public/image/post/<?= $post->image ?>" class="card-img-top" height="200px" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $post->title ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php require_once('views/frontend/footer.php'); ?>