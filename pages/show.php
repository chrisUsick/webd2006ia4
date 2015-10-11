<?php
/**
 * show a full post;
 *
 * loads a single post, fetching the ID from the `postId` query parameter.
 */
require 'lib/crud.php';
$idParam = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$post = null;
// if idParam sanatized load the post
if ($idParam) {
  $post = find($idParam);
  // implement the set title method once the post was found
  function setTitle()
  {
    global $post;
    return $post['title'];
  }
} else {
  // implement a 'no post' setTitle method
  function setTitle() {
    return 'No Post';
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
    <!-- complete error handling  -->
    <?php if (isset($_GET['postId'])): ?>
      <h4 class="text-warning">Post with id: '<?= $_GET['postId'] ?>' not found.</h4>
    <?php else: ?>
      <h4 class="text-warning">Invalid URL: please provide a postId query parameter.</h4>
    <?php endif; ?>
  </div>
<?php endif ?>
