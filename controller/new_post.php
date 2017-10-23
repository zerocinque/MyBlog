<?php 
	header('Content-Tipe: application/json; charset=utf-8');

	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'view/components/session.php';
	require_once $root . 'controller/post_controller.php';


	if(!isset($_POST['post'])){
		exit;
	}

	$post = json_decode($_POST['post']);

	$input = new Post(null, $post->title, $post->body, $post->tags);

	$state = $input->create();

	//se viene scatenata un eccezione la comunico al js
	if(isset($state['error'])){
		echo json_encode($state);
		exit;
	}
	echo json_encode($input);




