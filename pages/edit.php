<?php
require 'lib/crud.php';
// variables for form mixin
$id = null;
$title = "";
$content = "";
$legend = "Edit post";
$action = "Update";
$isUpdate = 1;
$idParam = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$post = null;
if ($idParam) {
  $post = find($idParam);
  $id = $post['id'];
  $title = $post['title'];
  $content = $post['content'];
}
// if is post check input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // validate
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  // update
  $postId = update($id, $title, $content);
  header("Location: /index.php/show?postId=$postId");
}
?>
<?php if ($post != null): ?>
  <?php require '_form.php' ?>
<?php else: ?>
  <div class="text-center">
    <h4 class="text-warning">Post with id: '<?= $_GET['postId'] ?>' not found.</h4>
  </div>
<?php endif; ?>
