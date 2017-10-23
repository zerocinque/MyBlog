<?php 
	header('Content-Tipe: application/json; charset=utf-8');
	
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'view/components/session.php';
	require_once $root . 'controller/user_controller.php';


	if(isset($_POST['user'])){

		$user = json_decode($_POST['user']);

		$input = new User($user->user_name, $user->email, $user->password);
		$state = $input->create();
		$_SESSION['user'] = $input->getUserName();

		echo json_encode(array("state" => $state));
		
	}
