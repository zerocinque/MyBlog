<?php

$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

require_once $root . 'model/DB.php';

function selectAll(&$results, $table = 'Post', $order = 'ID'){
	$conn = new DB();

	$sql = 'SELECT * FROM ' . $table . ' t ORDER BY t.'. $order .' DESC';
	return $conn->exec($sql, array(), $results);
}

function selectLast(&$results, $number = 10, $table = 'Post'){
	$conn = new DB();

	$sql = 'SELECT * FROM ' . $table . 'ORDER BY ID DESC LIMIT ' . $number;
	
	return $conn->exec($sql, array(), $results);
}



