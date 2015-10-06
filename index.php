<?php
// handle routing logic
/**
 * get list of pages that can be displayed
 * @return Array  array of files and directories that can be displayed
 */
function getAvailablePages()
{
  return scandir('./pages');
}

/**
 * check if the page exists
 * @param  string  $page  name of page
 * @return bool           true if the page is available
 */
function pageExists($page)
{
  return (array_search($page, getAvailablePages())) ? true : false;
}

$url_parts = explode("/",  $_SERVER['REQUEST_URI']);
// requrest examples /index.php/home /home
$pageName = '';
if (isset($url_parts[2])) {
  $pageName = $url_parts[2];
} else if ($url_parts[1] != 'index.php') {
  $pageName = $url_parts[1];
}

// the name of the file to load
$page;

if ($pageName == '') {
  $page = 'home.php';
} else if (pageExists($pageName . '.php')) {
  $page = $pageName . '.php';
} else {
  header('HTTP/1.1 404 Not Found');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="WEBD-2006 Blog">
    <meta name="author" content="Christopher Usick">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>WEBD-2006 Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/css/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">Home</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">WEBD-2006 Blog</h1>
        <p class="lead blog-description">Blog assignment for the web dev RRC course in BIT.</p>
      </div>
      <?php include "pages/$page" ?>
    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
