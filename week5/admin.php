<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome - Week 5</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        //TEST CODE
        //print_r($_SESSION);
        
        //is seesion not one or not set? -> redirect
        if ( !isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true){
            header('Location: login.php');
            session_destroy();        
        }
        
        //logut in GET var --> redirect
        if (isset($_GET['logout']) && $_GET['logout'] == 1){
            header('Location: login.php');
            session_destroy();
        }      
        //end php
        ?>
        <h1 id="h">Welcome <?php if( isset($_SESSION['username'])) echo $_SESSION['username']; ?></h1>
        <div id="divOne">
         <form name="mainform" action="admin.php" method="post">     
            Company Name:<br />    <input type="text" name="companyname" /><br />            
            Theme:<br />    <input type="text" name="username" /><br />   
            Contact Into: <br />   <input type="password" name="password" /><br />          
            <input type="submit" value="Submit" 
        </form>
        </div>
        <br />
        <br />
        <a href="admin.php?logout=1">LOGOUT</a><!--set GET var-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" ></script>
    </body>
</html>