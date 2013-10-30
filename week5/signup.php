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
        <title></title>
    </head>
    <body>
        <?php
        // check if post
        $entryErrors = array();
        
         if ( count($_POST) ) {
             
             $signupClass = new Signup();
             
             if($signupClass->entryIsValid() ){
                 $signupClass->saveEntry();
                 //show a save entry message and have a link to the login page or 
                 //redirect to login page-hint : flash messages google it
             }else{
                  $entryErrors = $signupClass->getErrors();
             }
         }
        ?>
        
         <form name="mainform" action="signup.php" method="post">
            
            Email: <input type="text" name="email" /> <br />
            <?php if (!empty($entryErrors['email']) ) {
                echo '<p>' , $entryErrors['email'], ' </p>';
            }  ?>
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
          
            <input type="submit" value="Submit" />
                        
        </form>
        
    </body>
</html>
