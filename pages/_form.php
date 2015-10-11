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
  <legend>
    <?= $legend?>
  </legend>
  <input type="hidden" name="id" value="<?=isset($id) ? $id : ''?>" id="id">
  <div class="form-group">
    <label for="title">Title</label>
    <input required type="text" name="title" class="form-control" id="title" value="<?=$title?>">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea required name="content" id="content" class="form-control" rows="4"><?=$content?></textarea>
  </div>
  <button type="submit" class="btn btn-primary"><?=$action?></button>
  <?php if (isset($isUpdate) && $isUpdate): ?>
    <a class="btn btn-danger" href="/index.php/delete?postId=<?=$id?>">Delete</a>
  <?php endif; ?>
  <a class="btn btn-default" href="/index.php/<?= (isset($isUpdate) && $isUpdate) ? "show?postId=$id" : "home" ?>">
    Cancel
  </a>
</form>
