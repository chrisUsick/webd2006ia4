<?php
require 'lib/crud.php';
$idParam = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$post = null;
if ($idParam) {
  $post = find($idParam);
  // implement the set title method
  function setTitle()
  {
    global $post;
    return $post['title'];
  }
}

?>
<?php if ($post != null): ?>
  <div class="blog-post">
    <div class="blog-post-title-wrapper">
      <h2 class="blog-post-title">
        <?=$post['title'] ?>
      </h2>
      <a class="small btn btn-default btn-xs" href="/index.php/edit?postId=<?=$post['id']?>">Edit</a>
    </div>
    <p class="blog-post-meta"><?= displayDate($post['date_created']) ?></p>
    <?php foreach (preg_split('/(\n|\r\n)/', $post['content']) as $para): ?>
      <p>
        <?=$para?>
      </p>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <div class="text-center">
    <h4 class="text-warning">Post with id: '<?= $_GET['postId'] ?>' not found.</h4>
  </div>
<?php endif ?>
