<?php
require 'lib/crud.php';
$posts = all(5);
?>
<?php foreach ($posts as $post): ?>
  <div class="blog-post">
    <h2 class="blog-post-title">
      <a href="/index.php/show?postId=<?=$post['id']?>"><?=$post['title'] ?></a>
    </h2>
    <p class="blog-post-meta"><?= $post['date_created'] ?></p>
    <?php foreach (preg_split('/(\n|\r\n)/', $post['content']) as $para): ?>
      <p>
        <?=$para?>
      </p>
    <?php endforeach; ?>
  </div>

<?php endforeach; ?>
<!-- /.blog-post -->

<!-- <nav>
  <ul class="pager">
    <li><a href="#">Previous</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</nav> -->
