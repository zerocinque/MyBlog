<?php 
	$root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';
	require_once $root . 'view/components/session.php' ?>


<!DOCTYPE html>
<html>
	<head>
		
	<?php require_once $root . 'view/components/header.php' ?>
	<?php require_once $root . 'view/components/crypto_js.php' ?>

	
	</head>

	<body>

		<div class="container" style="margin-top: 50px">
		<div class="row">
			
        	<div class="col-md-6 col-md-offset-3">
        			
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 class="text-center">Admin Login</h2>
						<hr>
						<!--form-->

							<div class="form-group">
								<label>User Name:</label>
								<input type="text" id="input_username" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" id="input_password" name="password" class="form-control">
							</div>
							<button name="submit" id="submit" class="btn btn-success pull-right" onclick="check()">Login</button>

						<!--/form-->
					</div><!--end panel body-->
				</div><!--end panel-->
				<h3><span id="lbl_error" class="label label-danger"></span></h3>
        	</div><!--end column-->
		</div><!--end row-->
        
        </div><!--end container-->

        <?php require_once $root . 'view/components/javascript.php' ?>
        <script src="/MyBlog/javascript/check_admin_login.js" type="text/javascript" ></script>

	</body>
</html>

