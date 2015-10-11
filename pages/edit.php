<?php
/**
 * edit a post
 *
 * loads a post with the id matching `postId` query param.
 * Uses the `/pages/_form.php` partial.
 * handles both GET and POST
 */
require 'lib/authentication.php';
require 'lib/crud.php';
// variables for form partial
$id = null;
$title = "";
$content = "";
$legend = "Edit post";
$action = "Update";
$isUpdate = 1;

$idParam = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$post = null;

// watch out for use of the global keyword in the setTitle mehtod;
// there is a global $pageTitle variable
$localPageTitle = "No Post";
// if there is an ID
if ($idParam) {
  // get the post
  $post = find($idParam);
  if ($post != null) {
    // set the partial variables
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];

    // set page title
    $localPageTitle = "Edit: " . $post['title'];

  }
}

// implement the set title method
function setTitle()
{
  global $localPageTitle;
  return $localPageTitle;
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
    <?php if (isset($_GET['postId'])): ?>
        <h4 class="text-warning">Post with id: '<?= $_GET['postId'] ?>' not found.</h4>
      <?php else: ?>
        <h4 class="text-warning">Invalid URL: please provide a postId query parameter.</h4>
      <?php endif; ?>
  </div>
<?php endif; ?>
