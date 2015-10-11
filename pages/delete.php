<?php
/**
 * delete a post from the database
 *
 * validates the postId query Param then deletes it. redirects to home
 */
require 'lib/authentication.php';
require 'lib/crud.php';
$id = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$msg = "";

// id is found
if ($id) {
  delete($id);
  $msg = "successfully deleted post with $id.";
  header("Location: /index.php/home");
} else {
  $msg = "invalid ID";
}
?>

<div class="text-center">
  <h4 class="text-warning"><?=$msg ?></h4>
</div>
