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
        session_start();
        session_regenerate_id();
        
        if (empty($_SESSION['isLoggedIn']) ){
            header("Location:login.php");
        }
        
        if ( count( $_GET["logout"] ) ){
            if ( $_GET["logout"] == "1" ) {
                
                header("Location:login.php?user=1");
            }
        }
        ?>
         <h1> You Made IT! </h1>
        <a href="admin.php?logout=1">LOGOUT</a>
        
       <!---//USE GLOBAL GET VAR TO GET BACK TO LOGIN PAGE AND DESTROY SESSION--->
        
       
    </body>
</html>
