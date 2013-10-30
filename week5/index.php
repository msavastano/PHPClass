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
        // put your code here
       $signup = new Signup();
        if (  $signup->userNameIsTaken("teslllllt") ) {
            echo '<p>user name is taken</p>';
        }
        
       if ( Validator::loginIsValid("test", "test")  ) {
           echo "yup its good";
           
       } else {
           echo 'nope its bad';
       }
       
        ?>
    </body>
</html>