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

        	<?php require_once $root . 'controller/all_post_controller.php' ?>

	        <?php require_once $root . 'view/welcome.php' ?>
            <div class="row">
                
            <div class="col col-md-offset-1"><h2 class="text-info">All Posts</h2></div>
            </div>
            <div class="row">
            <?php 

                /*echo '<pre>';
                var_dump($all_post);
                var_dump($_SESSION['post_offset_c']);
                var_dump($_SESSION['post_offset_a']);
                echo '<pre>';*/

                for ($i=0; $i < count($all_post); $i++) { 
                ?>
                    <div class="col col-md-10 col-md-offset-1">
                    
                    <hr>
                    <div class="row">
                        <div class="col col-md-10">
                            <h3 class="text-primary"> <?php echo $all_post[$i]->getTitle() ?> </h3>
                            <p><em><?php  echo $all_post[$i]->getDate() ?></em></p>
                            <p><?php echo substr($all_post[$i]->getBody(),0,200).((strlen($all_post[$i]->getBody())>200) ? '...' : '') ?></p>
                        </div>

                        <div class="col col-md-2">
                                
                            <a href=<?php echo 'view_post.php?p=' . urlencode($all_post[$i]->getID()) ?> class="btn btn-primary">Read More</a>

                        </div>
                    </div>
                    </div>

                    
            <?php 
                }
             ?>
            </div>
        
        </div>
        <div class="row">
            <?php require_once $root . 'view/components/footer.php' ?>
        </div>

        <?php require_once $root . 'view/components/javascript.php' ?>

    </body>
</html>
