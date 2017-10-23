<?php require_once 'components/session.php' ?>

<!DOCTYPE html>
<html>
	<head>
		
	<?php include 'components/header.php' ?>
	<?php include 'components/crypto_js.php' ?>
	
	</head>

	<body>

		<div class="container" style="margin-top: 50px">
		<div class="row">
			
        	<div class="col-md-6 col-md-offset-3">
        	<div class="alert alert-danger"></div>
        			
				<div class="panel panel-default">
					<div class="panel-body">
						<h2 class="text-center">Sign In</h2>
						<hr>
						<!--form id="form" method="post" action="../test.php"-->
							<div class="form-group">
								<label>User Name:</label>
								<input type="text" id="input_username" name="Username" class="form-control">
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input type="text" id="input_email" name="Email" class="form-control">
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" id="input_password" name="Password" class="form-control">
							</div>

							<div class="form-group">
								<label>Repeat Password:</label>
								<input type="password" id="input_check_pass" name="Password" class="form-control">
							</div>
							<button id="btn_submit" class="btn btn-success pull-right" name="submit" onclick="submit()">Sign In</button>
							
							<a href="../" class="btn btn-danger pull-left">Back</a>
						<!--/form-->
					</div>
				</div>

        	</div>
		</div>
        
        </div>

        <script src="../javascript/check_sign_in.js"></script>

        <?php include('components/javascript.php'); ?>

	</body>
</html>