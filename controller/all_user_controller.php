<?php 


	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';


		require_once $root . 'model/select_controller.php';
		require_once $root . 'controller/user_controller.php';

		$all_user_array = true;
		$state = selectAll($all_user_array, 'User', 'last_login');
		/*echo "<pre>";
		var_dump($all_user_array);
		echo "</pre>";*/
		$all_user = array();

		foreach ($all_user_array as $obj) {
			$id = $obj['ID'];
			$username = $obj['UserName'];
			$email = $obj['Email'];
			$create = $obj['user_create'];
			$last_login = $obj['last_login'];

			$all_user[] = new User($username, $email, null, $create, $last_login);
			//aggiungere id
			$all_user[count($all_user)-1]->setID($id);

		}








