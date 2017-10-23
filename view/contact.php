
<!--NON FUNZIONANTE-->

<?php require_once 'components/session.php' ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
    <?php include('components/header.php'); ?>
    
    </head>
    
    <body>

    	<?php include('components/navbar.php'); ?>

    	<div class="container" id="container">
            <div id="form-container">

    			<div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="text-center text-info">Contact Me</h1>
                    <hr>
                        <div class="form-group">
                            <label for="email" name="email">Email:</label>
                            <input id="email" type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subject" name="subject">Subject:</label>
                            <input id="subject" type="text" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message" name="message">Message:</label>
                            <textarea id="message" rows="5" name="message" class="form-control" placeholder="Type your message here..."></textarea>
                        </div>
                        <button class="btn btn-success pull-right" onclick="sendMessage()">Send</button>
                </div>
            </div>
        </div>
	        
	        
     
        </div>
        <?php include('components/footer.php'); ?>
        <?php include('components/javascript.php'); ?>
        <script type="text/javascript" src="/MyBlog/javascript/contact.js"></script>

    </body>
</html>



