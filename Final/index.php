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
        }
       
        ?>
        
        <div id="divOne">
            <h1 id="h">Sign Up</h1>
            <form name="mainform" action="#" method="post">
            
            Email: <br /><input type="text" name="email" /> <br />
            
            Website:<br /> <input type="text" name="website" /> <br />
            
            Password:<br /> <input type="password" name="password" /> <br />
            
            
          
            <input type="submit" value="Submit" />
                        
            </form>
        </div>
    </body>
</html>