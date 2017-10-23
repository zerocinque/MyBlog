
<?php 
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

	require_once $root . 'view/components/session.php'; 

if(!isset($_SESSION['admin_name'])){
	header("location: admin_login.php");		
}


?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once $root . 'view/components/header.php' ?>
	</head>
	<body>

		<?php require_once $root . 'view/components/admin_navbar.php' ?>

		<div class="container">
			
			<?php require_once $root . 'controller/all_post_controller.php' ?>

			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>

			<table class="table table-striped">
				<thead class="thead">
				    <tr>
				      <th>#</th>
				      <th>Title</th>
				      <th>Body</th>
				      <th>Tags</th>
				      <th>Create</th>
				      <th>Last Update</th>
				    </tr>
				</thead>
				<tbody>

				<?php 

					for ($i=0; $i < count($all_post); $i++) { 

						echo '<tr id="post'.$all_post[$i]->getID().'">';
						echo '<th scope="row">'. $all_post[$i]->getID() .'</th>';
						echo '<td>'. $all_post[$i]->getTitle() . '</td>';
						echo '<td>'. substr($all_post[$i]->getBody(),0,50).(count($all_post[$i]->getBody())>50 ? '...' : '') .'</td>';
						echo '<td>'. $all_post[$i]->getTags() .'</td>';
						echo '<td>'. $all_post[$i]->getCreate() .'</td>';
						echo '<td>'. $all_post[$i]->getUpdate() .'</td>';
						
					?>
						<td><a href=<?php echo 'view.php?p='. urlencode($all_post[$i]->getID()) . '&i='. urlencode($i) ?> class="btn btn-success">View</a></td>
						<td><a href=<?php echo 'edit.php?p='. urlencode($all_post[$i]->getID()) . '&i='. urlencode($i) ?> class="btn btn-warning">Edit</a></td>
						<td><button id=<?= 'delete_'.$all_post[$i]->getID() ?> class="btn btn-danger" onclick="deletePost(<?=$all_post[$i]->getID()?>)">Delete</button></td>
						</tr>

					<?php 
					}
				 ?>

				</tbody>
			</table>

		</div>
		
		<?php require_once $root . 'view/components/footer.php' ?>
		<script type="text/javascript" src="/MyBlog/javascript/delete_post.js"></script>
	</body>
</html>
