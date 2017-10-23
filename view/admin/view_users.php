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
			
			<?php require_once $root . 'controller/all_user_controller.php' ?>

			<!--div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div-->
			<div id="lbl-alert"></div>

			<table class="table table-striped">
				<thead class="thead">
				    <tr>
				      <th>#</th>
				      <th>UserName</th>
				      <th>Email</th>
				      <th>Create</th>
				      <th>Last Login</th>
				    </tr>
				</thead>
				<tbody>

				<?php 

					for ($i=0; $i < count($all_user); $i++) { 

						echo '<tr id="user'.$all_user[$i]->getID().'">';
						echo '<th scope="row">'. $all_user[$i]->getID() .'</th>';
						echo '<td>'. $all_user[$i]->getUserName() . '</td>';
						echo '<td>'. $all_user[$i]->getEmail() .'</td>';
						echo '<td>'. $all_user[$i]->getCreate() .'</td>';
						echo '<td>'. $all_user[$i]->getLastLogin() .'</td>';
						
					?>
						<td><button id=<?= 'delete_'.$all_user[$i]->getID() ?> class="btn btn-danger" onclick="deleteUser(<?=$all_user[$i]->getID()?>)">Delete</button></td>
						</tr>

					<?php 
					}
				 ?>

				</tbody>
			</table>

		</div>
		
		<?php require_once $root . 'view/components/footer.php' ?>
		<script type="text/javascript" src="/MyBlog/javascript/delete_user.js"></script>
	</body>
</html>
