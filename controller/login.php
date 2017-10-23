<?php
	header('Content-Tipe: application/json; charset=utf-8');

	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'view/components/session.php';
	require_once $root . 'controller/user_controller.php';

	if(isset($_POST['user'])){
		//echo $_POST['user'];
		$user = json_decode($_POST['user']);

		$input = new User($user->user_name, $user->email);


		if($user->user_name){
			//search by user_name
			$state = $input->find_user_name();
		}
		else{
			//serch by email
			$state = $input->find_email();
		}

		if(!$state){
			echo json_encode(array("state" => 0 ));
			return;
		}

		$state = $input->checkPassword($user->password);

		if(!$state){
			echo json_encode(array("state" => -1));
			return;
		}

		$_SESSION['user'] = $input->getUserName();
		if(!$input->login()){
			echo json_encode(array("state" => 2));
			return;
		}

		echo json_encode(array("state" => 1));

		//if not find the user in the database, exit
		//check the password
		//if the password is different, exit
		//set the user session
		//return true
		//find a way to comunicate to the javascript:
		//-username/email is correct/uncorrect
		//-password is correct/uncorrect
		//----> 3 state
		//-->php return:
		//      1---->ok
		//      0---->username/email isn't in the database
		//     -1---->password uncorrect
		//      2---->error with database update
	}

