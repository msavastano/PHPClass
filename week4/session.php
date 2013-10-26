<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessions</title>
    </head>
    <body>
        <?php
        // put your code here
        session_start(); // need this
        include 'Config.php';
        
        if (!isset($_SESSION["counter"])){
            $_SESSION["counter"] = 0;
        }else{
            $_SESSION["counter"]++;
        }
        
        session_regenerate_id(true);
        
        echo session_id(),"<br />";
        echo $_SESSION["counter"];
        
        //session_destroy();
        
        $_SESSION['maxlife'] = (time() -  Config::MAX_SESSION_TIME);
        
        if ( isset( $_SESSION['maxlife'] ) && $_SESSION['maxlife'] > Config::MAX_SESSION_TIME){
            
            echo "Sorry timed out";
            session_destroy();
        }else{
            $_SESSION['maxlife'] = (time() + Config::MAX_SESSION_TIME);
        }
        
        /*
         session_start();
    // set timeout period in seconds
    $inactive = 600;
    // check to see if $_SESSION['timeout'] is set
    if(isset($_SESSION['timeout']) ) {
        $session_life = time() - $_SESSION['start'];
        if($session_life > $inactive){ 
            session_destroy(); header("Location: logoutpage.php"); 
         }
    }
    $_SESSION['timeout'] = time();
         */
        ?>
        
        
       


    </body>
</html>
