<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome - Final</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        
        //TEST CODE
        print_r($_SESSION);
        echo "<br />";
        print_r($_POST);
        
        //if there is no log in redirect back to login page
        if (empty($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn'] ){            
            header("Location:login.php");
        }
        
        //check $_GET and redirect if logout is presses
        if ( isset( $_GET["logout"] ) ){
            if ( $_GET["logout"] == "1" ) { 
                session_destroy();
                header("Location:login.php"); //set a get var                
            }
        }
        ?>
         <h1> <?php echo $_SESSION['email']; ?> Made IT! </h1>
        <a href="admin.php?logout=1">LOGOUT</a>
        
       <!---//USE GLOBAL GET VAR TO GET BACK TO LOGIN PAGE AND DESTROY SESSION--->
        
      <script src="js/jscr.js" ></script> 
    </body>
</html>
