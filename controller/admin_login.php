<?php 
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'view/components/session.php';
	require_once $root . 'controller/admin_controller.php';


if(isset($_POST['admin'])){

	$admin = json_decode($_POST['admin']);

	$input = new Admin($admin->user_name, $admin->password);
	$user = new Admin();
	$user->setUserName($admin->user_name);
	$flag = $user->find();

	if(!$flag){
		$input->setfields(false, false);
		print_r(json_encode($input));
		return;
	}

	$flag = $user->compare($input);

	if(!$flag){
		$input->setfields(true, false);
		print_r(json_encode($input));
		return;
	}

	$_SESSION['admin_name'] = $admin->user_name;
	//$input->id = $_SESSION['admin_name'];
	$input->setfields(true, true);
	print_r(json_encode($input));
	//echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'no session' ;

}