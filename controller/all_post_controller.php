<?php 


	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';


		require_once $root . 'model/select_controller.php';
		require_once $root . 'controller/post_controller.php';

		$all_post_array = true;
		$state = selectAll($all_post_array);
		/*echo "<pre>";
		var_dump($all_post_array);
		echo "</pre>";*/
		$all_post = array();

		foreach ($all_post_array as $obj) {
			$id = $obj['ID'];
			$title = $obj['Title'];
			$body = $obj['Body'];
			$tags = $obj['Tags'];
			$create = $obj['post_create'];
			$update = $obj['post_update'];

			$all_post[] = new Post($id, $title, $body, $tags, $create, $update);

		}





