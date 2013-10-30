<?php include 'dependency.php'; ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <h1>Login</h1>
        <form name="mainform" action="login.php" method="post">
            
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
                      
            <input type="submit" value="Submit" />
            
        </form>
    </body>
</html>