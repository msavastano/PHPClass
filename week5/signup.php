<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up - Week 5</title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <body>
        <?php
        // check if post
        $entryErrors = array();
        
         if ( count($_POST) ) {             
             $signupClass = new Signup();   //new signup object          
             if($signupClass->entryIsValid() ){  //verify info
                 $signupClass->saveEntry(); //method inserts dat into database
                 header("Location: login.php");
                 //show a save entry message and have a link to the login page 
             }else{
                  $entryErrors = $signupClass->getErrors();//sets entry errs
             }
         }
        ?>
        <div id="divOne">
            <h1 id="h">Sign Up</h1>
            <form name="mainform" action="signup.php" method="post">
            
            Email: <br /><input type="text" name="email" /> <br />
            <?php if (!empty($entryErrors['email']) ) {
                echo '<p>' , $entryErrors['email'], ' </p>';
            }  ?>
            Username:<br /> <input type="text" name="username" /> <br />
            <?php if (!empty($entryErrors['username']) ) {
                echo '<p>' , $entryErrors['username'], ' </p>';
            }  ?>
            Password:<br /> <input type="password" name="password" /> <br />
            <?php if (!empty($entryErrors['password']) ) {
                echo '<p>' , $entryErrors['password'], ' </p>';
            }  ?>
            
          
            <input type="submit" value="Submit" />
                        
            </form>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>
    </body>
</html>
