<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        
        <?php
        //if passcode correct go to guestbook static function
        Login::processLogin();       
        ?>
        
         <h1 id="h">Login</h1>
        <div id="divOne">
        <form  action="#" method="post">            
            
            Passcode: <br /><input type="password" name="passcode" /> <br /><br />
                         
            <input type="submit" value="Submit" />            
        </form>
            
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>
    </body>
</html>
