<?php
/**
 * create a post
 *
 * this page loads the _form.php partial
 * also handles the POST for the form
 */
require 'lib/authentication.php';
$title = "";
$content = "";
$legend = "Create blog post";
$action ="Create";
// implement the set title method
function setTitle()
{
  return "Create post";
}
// if is post check input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require 'lib/crud.php';
  // validate
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  // insert
  $postId = insert($title, $content);
  header("Location: /index.php/show?postId=$postId");
}
?>

<?php require '_form.php' ?>
