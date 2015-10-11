<?php
require 'lib/authentication.php';
require 'lib/crud.php';
$id = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
$msg = "";
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
