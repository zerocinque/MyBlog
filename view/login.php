<?php require_once 'components/session.php' ?>


<!DOCTYPE html>
<html>
	<head>
		
	<?php require_once 'components/header.php' ?>
	<?php require_once 'components/crypto_js.php' ?>

	
	</head>

	<body>

		<div class="container" style="margin-top: 50px">
		<div class="row">
			
        	<div class="col-md-6 col-md-offset-3">
        			
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 class="text-center">Login</h2>
						<hr>
						<div id="lbl-alert" class="alert alert-danger" role="alert"></div>
						<div class="form-group">
							<label>User Name/Email:</label>
							<input type="text" id="input_user" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" id="input_password" name="password" class="form-control">
						</div>
						<button name="submit" onclick="submit()" class="btn btn-success pull-right">Login</button>
						<a href="../" class="btn btn-danger pull-left">Back</a>
					</div>

				</div>

        	</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<a href="sign_in.php" class="btn btn-link btn-block btn-lg">Sign In</a>
			</div>
		</div>
        
        </div>

        <script type="text/javascript" src="../javascript/check_login.js"></script>
        <?php include('components/javascript.php'); ?>

	</body>
</html>