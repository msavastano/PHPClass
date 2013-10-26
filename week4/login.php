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
        // put your code here
        session_start();
        
        
        session_regenerate_id(true);
        
        include "Config.php";
        include "Validator.php";
        
        $token = uniqid();
        
        //avoid session hijack
        if( !isset($_SESSION['token']) ){
            $_SESSION['token'] = $token;
        }else{
            if ( isset($_POST['token']) && $_SESSION['token'] != $_POST['token'] ){
                session_destroy();
                header("Location:login.php");
                exit();
            }
        }
        
        //avoids bots
        if ( !empty($_POST["email"]) ) {
            $_SESSION['wait'] = time() + Config::MAX_SESSION_TIME;
        }    
        
        if ( isset($_SESSION['wait'] ) && $_SESSION['wait'] > (time() - Config::MAX_SESSION_TIME) ) {
            //make them wait
            echo "Please come back";
            exit();
        }
        
        
        
        
         $_SESSION['token'] = $token;
         
            $username = ( isset($_POST["username"]) ? $_POST["username"] : "" );

            $password = ( isset($_POST["password"]) ? $_POST["password"] : "" );
            
            if (!empty($username)  && !empty($password) && Validator::loginIsValid($username, $password)){
                echo "GOOD";
                $_SESSION['isLoggedIn'] = true;
                header("Location:admin.php");
            }else{
                echo "Username or password is incorrect";
            }
        ?>
        
        <form name="mainform" method="post" action="login.php">
           
          
          <label>User Name</label> <input type="text" name="username" value="" />               
          <br /><br />
          <label>Password</label> <input type="password" name="password" value=""  /> 
          <input type="hidden" name="token" value="<?php echo $token; ?>" />
          <br /><br />
          <input type="hidden" name="email" value="" />
          <br /><br />
          <input type="submit" name="submit" value="submit"> <br/>
        </form>
    </body>
</html>
