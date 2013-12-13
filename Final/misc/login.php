<?php include 'dependency.php'; //includes all classes and sets up session ?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Final</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        
        //TEST CODE
        //print_r($_SESSION);
        //echo "</br />";
        //echo "POST ";
        //print_r($_POST);
        
        //set bad login message var
        $err = "";
        print_r($_SESSION);
        echo "<br />";
        print_r($_POST);
        //check for username and password validation with class.  Set session var and err mess
        if (isset($_POST['email']) ){
            if ( Validator::loginIsValidPost() ) { 
                $_SESSION['email'] = $_POST['email'];
                $err = "Email and Password correct"; 
                $_SESSION["isLoggedIn"] = true; 
            }else {
                $_SESSION["isLoggedIn"] = false; 
                $err = "Email or Password incorrect";                
            }
        }  
        
      //if session var is 1, redirect to admin page  
      if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
        header("Location: admin.php");
        //echo "YOu're in";
      }   
      //avoid session hijack using tokens - token set on dependency page
        if( !isset($_SESSION['token']) ){
            $_SESSION['token'] = $token;
        }else{
            if ( isset($_POST['token']) && $_SESSION['token'] != $_POST['token'] ){
                session_destroy();
                header("Location:login.php");
                exit();
            }
        }
        //end php
        ?> 
        
        
        <h1 id="h">Login</h1>
        <div id="divLogin">
            <form name="mainform" action="#" method="post">            
                Username/Email: <input type="text" name="email" /> <br /><br />
                Password: <input type="password" name="password" /> <br />
                <?php echo '<p id="err">', $err, '</p>'; ?> <!---error message, if set -->                  
                <input type="submit" value="Submit" />            
            </form>
        <p> Not a member?  <a href="index.php">Sign up</a>    </p>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>
    </body>
</html>