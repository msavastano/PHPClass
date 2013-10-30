<!DOCTYPE html>
<?php include 'dependency.php'; ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Oops!</title>
    </head>
    <body>
        <h1>Oops! There seem to have been an issue on the page.</h1>
        <p> Try starting back at the home page <a href="index.php">Back Home</a> </p>
        
        <?php
            
            $message = ( array_key_exists("msg", $_GET) ? $_GET["msg"] : "" );
        // put your code here
            if ( !empty($message) ) {
                mail("myemail@somehere.com", "PHP Error on my site", $message);
                echo $message;
            }
        ?>
    </body>
</html>