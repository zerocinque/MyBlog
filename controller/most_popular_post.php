<?php 

$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

//require_once $root . 'controller/post_controller.php';
require_once $root . 'model/DB.php';

$conn = new DB();
$result = true;

$sql = 'SELECT p.ID FROM Post p order by p.views desc limit 1';
$state = $conn->exec($sql, array(), $result);

$conn->close();
$conn = null;

$id = $result[0]['ID'];
echo $redirect = 'location: ../view/view_post.php?p='.$id;

header($redirect);

