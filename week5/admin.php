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
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        
        print_r($_SESSION);
        if ( !isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true){
            header('Location: login.php');
            session_destroy();
        
        }
        
        if (isset($_GET['logout']) && $_GET['logout'] == 1){
            header('Location: login.php');
            session_destroy();
        }
        
        
        ?>
        <h1 id="h2">Welcome</h1>
        <div id="divTwo">
         <form name="mainform" action="admin.php" method="post">
            
            
            Company Name:<br />    <input type="text" name="companyname" /><br />            
            Theme:<br />    <input type="text" name="username" /><br />
            
            
            Contact Into: <br />   <input type="password" name="password" /><br />
          
            <input type="submit" value="Submit" />
            
            
        </form>
        </div>
        <br />
        <br />
        <a href="admin.php?logout=1">LOGOUT</a>
        <script src="js/jscr.js" ></script>
    </body>
</html>