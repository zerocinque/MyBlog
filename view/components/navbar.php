<?php 
    $page = $_SERVER['REQUEST_URI'];
    $page = explode('/', $page);
    $page = array_pop($page);
 ?>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../">Gigi's blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li <?php echo (strcmp($page, 'home.php') == 0 || strcmp($page, '') == 0) ? 'class="active"' : ''?> ><a href="home.php">Home</a></li>
            <li <?php echo strcmp($page, 'about.php') == 0 ? 'class="active"' : ''?> ><a href="about.php">About</a></li>
            <li <?php echo strcmp($page, 'contact.php') == 0 ? 'class="active"' : ''?> ><a href="contact.php">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <?php 
                echo !isset($_SESSION['user']) ? '<li><a href="login.php">Login</a></li><li><a href="sign_in.php">Sign in</a></li>' :  '<li><a href="account.php">'.$_SESSION['user'].'</a></li><li><a href="../controller/sessionDestroy.php">Log out</a></li>'
             ?>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>