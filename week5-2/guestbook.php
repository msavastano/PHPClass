<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>GuestBook - Week 5</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
            Login::confirmAccess();            
            $gb = new Guestbook();
            $gb->entryIsValid();
            //$gb->displayGuestbook();
        ?>
        <h1 class="h">Sign My Guestbook</h1>
        <div class="divClass">
        <form name="mainform" action="#" method="post">
            Username: <br /><input type="text" name="name" /> <br />
            Email: <br /><input type="text" name="email" /> <br />
            Comment: <br /><textarea name="comments" height="50" width="300"></textarea><br /><br />
            <input type="submit" value="Submit" /> 
        </form>
        </div>
        <div class="divClass2">
             <?php $gb->displayGuestbook(); ?>
            
        </div>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>    
    </body>
</html>
