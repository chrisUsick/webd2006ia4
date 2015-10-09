<?php
require 'lib/crud.php';
$id = filter_input(INPUT_GET, 'postId', FILTER_SANITIZE_NUMBER_INT);
if ($id) {
  delete($id);
  header("Location: /index.php/home");
}
?>
