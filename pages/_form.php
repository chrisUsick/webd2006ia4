<!--
the form partial

expects the following variables declared in global scope
$id (optional)
$title
$title
$content
$action: string                name of the submit button
$isUpdate (optional) boolean   true if the form is being used for an update
-->

<form action="<?=$_SERVER['REQUEST_URI']?>" method="post" class="">
  <fieldset>
    <legend>
      <?= $legend?>
    </legend>
    <input type="hidden" name="id" value="<?=isset($id) ? $id : ''?>" id="id">
    <?php if (isset($errorMessage)): ?>
      <div class="form-group">
        <p class="alert alert-danger">
          <?=$errorMessage?>
        </p>
      </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="title">Title</label>
      <input required type="text" name="title" class="form-control" id="title" value="<?=$title?>">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea required name="content" id="content" class="form-control" rows="4"><?=$content?></textarea>
    </div>
  </fieldset>
  <button type="submit" class="btn btn-primary"><?=$action?></button>
  <a class="btn btn-default" href="/index.php/<?= (isset($isUpdate) && $isUpdate) ? "show?postId=$id" : "home" ?>">
    Cancel
  </a>
</form>
<?php if (isset($isUpdate) && $isUpdate): ?>
  <form action="/index.php/delete" method="post" class="delete-form">
    <input type="hidden" value="<?=$id?>" name="id" id="id">
    <div class="form-group">
      <button type="submit" class="btn btn-danger">Delete</button>
    </div>
  </form>
<?php endif; ?>
