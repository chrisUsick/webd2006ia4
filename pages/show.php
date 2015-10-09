<?php
require 'lib/crud.php';
$idParam = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$post = null;
if ($idParam) {
  $post = find($idParam);
}
?>
<?php if ($post != null): ?>
  <div class="blog-post">
    <h2 class="blog-post-title">
      <?=$post['title'] ?>

      <a class="small btn btn-default" href="/index.php/edit?postId=<?=$post['id']?>">Edit</a>
    </h2>
    <p class="blog-post-meta"><?= $post['date_created'] ?></p>
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
