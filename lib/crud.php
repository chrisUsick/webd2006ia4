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

function update ($id, $title, $content)
{
  $db = connect();
  $sql = "UPDATE posts
          SET title = :title, content = :content
          WHERE id = :id";
  $query = $db->prepare($sql);

  // ensure gets bound to a number
  $res = $query->execute(['id' => intval($id), 'title'=>$title, 'content'=>$content]);
  return $id;
}

/**
 * find most recent posts
 * @param  int  $limit  limit the result set
 * @return Array<Array> Array of assoc arrays of posts
 */
function all ($limit)
{
  $db = connect();
  $sql = "SELECT id, title, content, date_created
          FROM posts
          ORDER BY date_created DESC
          LIMIT :limitNum";
  $query = $db->prepare($sql);
  $query->bindParam('limitNum', $limit, PDO::PARAM_INT);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * find an indiviual post
 * @param  int $id    id of post
 * @return Array      assoc array of post
 */
function find ($id)
{
  $db = connect();
  $sql = "SELECT id, title, content, date_created
          FROM posts
          WHERE id = :id";
  $query = $db->prepare($sql);
  $query->bindParam('id', $id, PDO::PARAM_INT);
  $query->execute();

  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  if (count($res) >= 1) {
    return $res[0];
  }
  return null;
}

function delete ($id) {
  $db = connect();
  $sql = "DELETE FROM posts
          WHERE id = :id";
  $query = $db->prepare($sql);
  $query->bindParam('id', $id, PDO::PARAM_INT);
  $query->execute();
}

// helpers
/**
 * display a date
 * @param  String  $date a date string in a valid `strtotime` format
 * @return String        a formatted date
 */
function displayDate($date)
{
  return date("F d, Y, g:i a",strtotime($date));
}
?>
