<?php 

	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';
	require_once $root . 'view/components/session.php'; 
	require_once $root . 'controller/post_controller.php';


if(!isset($_SESSION['admin_name']))
	header('admin_login.php');		

   ?>


<!DOCTYPE html>
<html>
	<head>

	<?php require_once $root . 'view/components/header.php' ?>

	</head>
	<body>

		<?php require_once $root . 'view/components/admin_navbar.php' ?>

		<?php 

			$id_post = $_GET['p'];
			$post = new Post();
			$post->setID($id_post);
			$post->read();

		 ?>

		<div class="container">
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
				
				<h2 class="text-center">Edit</h2>
				<hr>

					<div class="form-group">
						<label>Title:</label>
						<input type="text" id="input_title" name="Title" class="form-control" value=<?php echo $post->getTitle() ?>>
					</div>
					<div class="form-group">
						<label>Body:</label>
						<textarea name="Body" id="input_body" rows="10" class="form-control"><?php echo $post->getBody() ?></textarea>
					</div>
					<div class="form-group">
						<label>Tags:</label>
						<input type="text" name="Tags" id="input_tags" class="form-control" value=<?php echo $post->getTags() ?>>
					</div>
					<!--div style="height: 10px"></div-->
					<a href="./" class="btn btn-danger pull-left">back</a>
					<button id="edit_button" name="submit" class="btn btn-warning pull-right" onclick="submit(<?=$post->getID()?>)">Edit</button>
				
			
			</div><!--end column-->
		</div>
		</div><!--end container-->


		<?php require_once $root . 'view/components/footer.php' ?>
		<script type="text/javascript" src="/MyBlog/javascript/update_post.js"></script>
	</body>
</html>
