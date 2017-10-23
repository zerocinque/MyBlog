<?php 

if(!isset($_SESSION['admin_name']))
	header('admin_login.php');		

   ?>

<?php 
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';
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
			<div class="col-md-8 col-md-offset-2">
				
				<?php
					$id_post = intval($_GET['p']); 
					$post = new Post();
					$post->setID($id_post);
					$post->read();
				 	
				 ?>
				<div class="row">
					
					<h3><?php  echo $post->getTitle() ?></h3>
					<hr>
				</div>
				<div class="row">
					<p class="pull-right"><?php echo $post->getDate() ?></p>
				</div>
				<div class="row">
					<p><?php echo $post->getBody() ?></p>
					<hr>
					<p><?php echo $post->getTags() ?></p>			
				</div>

				<div class="row">
					<a href="./" class="btn btn-warning">Back</a>
				</div>
				
			
			</div><!--end column-->
		</div>
		
		<?php require_once $root . 'view/components/footer.php' ?>

	</body>
</html>
