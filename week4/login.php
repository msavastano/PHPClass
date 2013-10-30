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
        
        if (!isset($_SESSION["counter"]) || $_GET['user'] ){
            $_SESSION["counter"] = 0;
        }else{
            $_SESSION["counter"] = 1;
       }
        
        
         $_SESSION['token'] = $token;
         
            $username = ( isset($_POST["username"]) ? $_POST["username"] : "" );

            $password = ( isset($_POST["password"]) ? $_POST["password"] : "" );
            
           
            if (!empty($username)  && !empty($password) && Validator::loginIsValid($username, $password)){
                
               $_SESSION['isLoggedIn'] = true;
                header("Location:admin.php");      
            }else if($_SESSION["counter"]){
                echo "Username or password is incorrect";
                $_SESSION['isLoggedIn'] = false;
            }
          
            
            //if (!$_SESSION['isLoggedIn']) {
                //$_SESSION['isLoggedIn'] = false;
              //  echo "Username or password is incorrect";
            //} else {
                
            //}
            
            //if (empty($username)  || empty($password) || Validator::loginIsValid($username, $password)){
         //echo "<br />counter is ", $_SESSION["counter"], "<br />logged in  is ", $_SESSION['isLoggedIn'];       
         
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
