<?php 
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

require_once $root . 'view/components/session.php';
session_destroy();
/*echo '<pre>';
var_dump($_SESSION);
echo '</pre>';*/

header("location: ../");