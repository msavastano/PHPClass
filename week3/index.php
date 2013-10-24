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
        //$_POST
        
        //echo $_POST["fullname"];
        
        //print_r($_POST);
        $fullname = "";
        $email = "";
        $comm = ""; 
        
        if ( count($_POST) ){
            
            if (array_key_exists("fullname", $_POST)){
                $fullname = $_POST["fullname"];
            }
            
            if (array_key_exists("email", $_POST)){
                $email = $_POST["email"];
            }
            
            if (array_key_exists("comm", $_POST)){
                $comm = $_POST["comm"];
            }
            
        }
        ?>
        
        <form name="mainform" action="index.php" method="post">
            FULL NAME: <input type="text" name="fullname" value="<?php echo $fullname; ?>" /> <br /> <!--name is key, value is value -->
            EMAIL: <input type="text" name="email" value="<?php echo $email; ?>" /><br />
            COMMENTS: <br /><textarea name="comm" cols="40" rows="5"><?php echo $comm; ?></textarea><br />
                
            <input type="submit" value="submit" />            
        </form>
    </body>
</html>
