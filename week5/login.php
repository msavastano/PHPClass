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
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        ////////////////////////////
        
        
        
        
        ////////////////////////////////////
        echo "SESS ";
        print_r($_SESSION);
        echo "</br />";
        echo "POST ";
        print_r($_POST);
        $err = "";
        
        if (isset($_POST['username']) ){
            if ( Validator::loginIsValidPost() ) {                           
                $_SESSION["isLoggedIn"] = true; 
            }else {
                $_SESSION["isLoggedIn"] = false; 
                $err = "Username or Password incorrect";
                
               //session_destroy();  
            }
        }
      

            
      if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
        header("Location: admin.php");
      }
            
        
       
        
       /*
        
        $error = "";
        if (count($_POST)) { //easier way t do this -- use validator to see if empty
            if (array_key_exists("username", $_POST)
                    && array_key_exists("password", $_POST)) {
                if ( Validator::loginIsValid($_POST['username'], $_POST[password'])) {
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
        <h1 id="h">Login</h1>
        <div id="divOne">
        <form name="mainform" action="login.php" method="post">
            
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
            <?php echo '<p id="err">', $err, '</p>'; ?>
                  
            <input type="submit" value="Submit" />
            
        </form>
        </div>
        <script src="js/jscr2.js" type="text/javascript"></script>
    </body>
</html>