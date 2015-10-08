<?php
require 'connect.php';
function insert ($title, $content)
{
  $db = connect();
  $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";
  $query = $db->prepare($sql);
  $res = $query->execute(['title'=>$title, 'content'=>$content]);
  return $db->lastInsertId();
}

?>
