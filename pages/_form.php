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
    <textarea required name="content" id="content" class="form-control"><?=$content?></textarea>
  </div>
  <button type="submit" class="btn btn-primary"><?=$action?></button>
  <?php if (isset($isUpdate) && $isUpdate): ?>
    <a class="btn btn-danger" href="/index.php/delete?postId=<?=$id?>">Delete</a>
  <?php endif; ?>
</form>
