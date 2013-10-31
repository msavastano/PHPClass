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
        <title>Login</title>
    </head>
    <body>
        <?php
        $err = "";
        
        if ( Validator::loginIsValidPost() ) {
                $_SESSION["isLoggedIn"] = true;                
        }else {
            $_SESSION["isLoggedIn"] = 0;
            session_destroy();                
        }
            
        if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
            header("Location: admin.php");
        }
            
       
        
       /*
        
        $error = "";
        if (count($_POST)) { //easier way t do this -- use validator to see if empty
            if (array_key_exists("username", $_POST)
                    && array_key_exists("password", $_POST)) {
                if ( Validator::loginIsValid($_POST['username'], $_POST['password'])) {
                    $_SESSION['isLoggedIn'] = true;                    
                }
             }
             
             if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']==true){
                 header("Location: admin.php");
                 $error = "login success";
             }else{
                 $error = "login failed";
             }
       
      }*/
        ?>
        <h1>Login</h1>
        <form name="mainform" action="login.php" method="post">
            
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
            <?php echo '<p id="err">', $err, '</p>'; ?>
                  
            <input type="submit" value="Submit" />
            
        </form>
    </body>
</html>