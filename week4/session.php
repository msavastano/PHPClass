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
        
        
        
        //session_destroy();
        
        
        
        if ( isset( $_SESSION['LAST_ACTIVITY'] ) && time() > $_SESSION['LAST_ACTIVITY'] +
                Config::MAX_SESSION_TIME){
            
            echo "Sorry timed out<br />";
            session_destroy();
        }else{
            $_SESSION['LAST_ACTIVITY'] = time();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
        
        echo "Session ID    ",session_id(),"<br />";
        echo "Session Counter    ",$_SESSION["counter"], "<br />";
        echo time(), "    ",($_SESSION['LAST_ACTIVITY'] + Config::MAX_SESSION_TIME), "<br />";
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
