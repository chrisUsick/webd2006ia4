<?php
// if is post check input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require '../lib/crud.php';
  // validate
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  // insert
  $postId = insert($title, $content);
  header("Location: /index.php/show?postId=$postId");
}
?>
<form action="/pages/create.php" method="post" class="">
  <legend>
    Create blog post
  </legend>
  <div class="form-group">
    <label for="title">Title</label>
    <input required type="text" name="title" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea required name="content" id="content" class="form-control"></textarea>
  </div>
  <button type="submit">Create</button>
</form>
