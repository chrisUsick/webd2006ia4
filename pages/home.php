<?php
/**
 * display the 5 most recent posts
 *
 * loads the posts, then renders a summary of each post
 */
require 'lib/crud.php';
$posts = all(5);

// implement the set title method
function setTitle()
{
  return "Home page";
}
?>
<h2>Recent blog posts</h2>
<?php foreach ($posts as $post): ?>
  <div class="blog-post">
    <div class="blog-post-title-wrapper">
      <h2 class="blog-post-title">
        <a href="/index.php/show?postId=<?=$post['id']?>"><?=$post['title'] ?></a>
      </h2>
      <a href="/index.php/edit?postId=<?=$post['id']?>">Edit</a>
    </div>
    <p class="blog-post-meta"><?= displayDate($post['date_created']) ?></p>
    <?php foreach ($paras = preg_split('/(\n|\r\n)/', substr($post['content'], 0, 200)) as $para): ?>
      <p>
        <?=$para?>
        <!-- show the read more link if last paragraph -->
        <?php
          $isLastPara = array_search($para, $paras) == count($paras) - 1;
          if (strlen($post['content']) > 200 && $isLastPara):
        ?>
          ... <a href="/index.php/show?postId=<?=$post['id']?>">Read full post</a>
        <?php endif; ?>
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
