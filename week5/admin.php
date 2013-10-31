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
        <title></title>
    </head>
    <body>
        <?php
        print_r($_SESSION);
        if ( !isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true){
            //header('Location: login.php');
            //session_destroy();
        
        }
        ?>
        
         <form name="mainform" action="admin.php" method="post">
            
            
            Company Name: <input type="text" name="companyname" /><br />            
            Theme: <input type="text" name="username" /><br />
            
            
            Contact Into: <input type="password" name="password" /><br />
          
            <input type="submit" value="Submit" />
            
            
        </form>
        
    </body>
</html>