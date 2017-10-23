<?php 
    $root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

    require_once $root . 'view/components/session.php'
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
    <?php require_once $root . 'view/components/header.php' ?>
    </head>
    
    <body>
    
        <?php require_once $root . 'view/components/navbar.php' ?>

        <div class="container">

        	<div class="col col-md-10 col-md-offset-1">
        		<h2>Hello <?= $_SESSION['user'] ?>!</h2>
        		<p>This is your page Account Page.</p>
        	</div>

        
        </div>
        <div class="row">
            <?php require_once $root . 'view/components/footer.php' ?>
        </div>

        <?php require_once $root . 'view/components/javascript.php' ?>

    </body>
</html>
