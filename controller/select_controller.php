<?php


include_once 'DB.php';

function selectAll(&$results, $table = 'Post'){
	$conn = new DB();

	$sql = 'SELECT * FROM ' . $table . 'ORDER BY ID DESC';

	$state = $conn->exec($sql, array(), $results);

	$conn->close();
	$conn = null;

	return $state;
}

function selectLast(&$results, $number = 10, $table = 'Post'){
	$conn = new DB();

	$sql = 'SELECT * FROM ' . $table . 'ORDER BY ID DESC LIMIT ' . $number;
	$state = $conn->exec($sql, array(), $results);

	$conn->close();
	$conn = null;

	return $state;
}



