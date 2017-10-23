<?php 

if(!isset($_SESSION['admin_name']))
	header('admin_login.php');		

   ?>

<?php 
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';
	require_once $root . 'view/components/session.php';
 	require_once $root . 'controller/post_controller.php';
 ?>


<!DOCTYPE html>
<html>
	<head>
		<?php require_once $root . 'view/components/header.php' ?>
	</head>

	<body>
		<?php require_once $root . 'view/components/admin_navbar.php' ?>

		<div class="container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="text-center">New Post</h2>
					<hr>
					<div id="lbl-alert" class="alert alert-danger" role="alert"></div>
					<div class="form-group">
						<label>Title:</label>
						<input type="text" id="input_title" name="Title" class="form-control">
					</div>
					<div class="form-group">
						<label>Body:</label>
						<textarea name="Body" rows="10" id="input_body" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Tags:</label>
						<input type="text" name="tags" id="input_tags" class="form-control">
					</div>
					<button name="create" id="submit" class="btn btn-lg btn-block btn-success pull-right" onclick="submit()">Create</button>
					
				</div>
			</div>

		</div>

		<script src="/MyBlog/javascript/new_post.js" type="text/javascript" ></script>
		
		<?php require_once $root . 'view/components/footer.php' ?>

	</body>
</html>