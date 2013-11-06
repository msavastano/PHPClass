<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Week 4</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        //start sessin and generate new id
        session_start();         
        session_regenerate_id(true);
        
        //TEST CODE
        //print_r($_SESSION);
        
        include "Config.php";
        include "Validator.php";
        
        //give a unique token
        $token = uniqid();
        
        //avoid session hijack using tokens
        if( !isset($_SESSION['token']) ){
            $_SESSION['token'] = $token;
        }else{
            if ( isset($_POST['token']) && $_SESSION['token'] != $_POST['token'] ){
                session_destroy();
                header("Location:login.php");
                exit();
            }
        }
        
        //avoids bots using session time
        if ( !empty($_POST["email"]) ) {
            $_SESSION['wait'] = time() + Config::MAX_SESSION_TIME;
        }   
        
        if ( isset($_SESSION['wait'] ) && $_SESSION['wait'] > (time() - Config::MAX_SESSION_TIME) ) {
            //make them wait
            echo "Please come back";
            exit();
        }
               
         $_SESSION['token'] = $token;
            //set variables
        $username = ( isset($_POST["username"]) ? $_POST["username"] : "" );
        $password = ( isset($_POST["password"]) ? $_POST["password"] : "" );
            
            // if logged in, redirect to admin page
            if (!empty($username)  && !empty($password) && Validator::loginIsValid($username, $password)){                
               $_SESSION['isLoggedIn'] = true;
               $_SESSION['username'] = $username;
                header("Location:admin.php");      
            }else if (isset ($_POST['username'])){
                echo "Username or password is incorrect";
                $_SESSION['isLoggedIn'] = false;
            }     
            //if logged in rediredt -> admin.php
            if ( isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true )
            {
               header("Location:admin.php");  
            }
        ?>
        <div id="divTwo">
            <form name="mainform" method="post" action="login.php">
               <h1 id="h2">Login</h1>
              <label>User Name</label> <input type="text" name="username" value="" />               
              <br /><br />
              <label>Password</label> <input type="password" name="password" value=""  /> 
              <input type="hidden" name="token" value="<?php echo $token; ?>" />
              <br /><br />
              <input type="hidden" name="email" value="" />
              <br /><br />
              <input type="submit" name="submit" value="submit"> <br/>
            </form>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>
    </body>
</html>
