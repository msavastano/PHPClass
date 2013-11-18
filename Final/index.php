<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up -  SaaS</title>
    </head>
    <body>
        <?php
        //create array to store sign up errors
        $entryErrors = array();
        // create signup object
        if (count($_POST)){
            $signup = new Signup();
            if($signup->entryIsValid() ){  //verify info
                 $signup->saveEntry(); //method inserts dat into database
                 //header("Location: login.php");
                 //show a save entry message and have a link to the login page 
             }else{
                  $entryErrors = $signup->getErrors();//sets entry errs
             }
        }
        
        if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
            header("Location: admin.php");
            //echo "YOu're in";
        }  
      
       print_r($entryErrors)
        ?>
        
        <div id="divOne">
            <h1 id="h">Sign Up</h1>
            <form name="mainform" action="#" method="post">
            
            Email: <br /><input type="text" name="email" /> <br />
            
            Website:<br /> <input type="text" name="website" /> <br />
            
            Password:<br /> <input type="password" name="password" /> <br />
            
            
          
            <input type="submit" value="Submit" />
                        
            </form>
            <p> Already a member?  <a href="login.php">Log in</a>    </p>
        </div>
    </body>
</html>