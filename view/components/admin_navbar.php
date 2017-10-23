<?php 
    $page = $_SERVER['REQUEST_URI'];
    $page = explode('/', $page);
    $page = array_pop($page);
    $root = (strcmp($_SERVER['HTTP_HOST'], 'localhost')==0 ? ($_SERVER['DOCUMENT_ROOT']. '/MyBlog') : '') . '/';

    require_once $root . 'view/components/session.php'; 

 ?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li <?php echo strcmp($page, '') == 0 ? 'class="active"' : ''?> ><a href="./">All Post</a></li>
            <li <?php echo strcmp($page, 'new_post.php') == 0 ? 'class="active"' : ''?> ><a href="new_post.php">New Post</a></li>
            <li <?php echo strcmp($page, 'view_users.php') == 0 ? 'class="active"' : ''?> ><a href="view_users.php">Users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li><a href="#"><?php echo $_SESSION['admin_name'] ?></a></li>
            <li><a href="../../controller/sessionDestroy.php">Log out</a></li>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>