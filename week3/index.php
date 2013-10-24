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
        
        ?>
        
        <form name="mainform" action="processForm.php" method="post">
            FULL NAME: <input type="text" name="fullname" value="" /> <br /> <!--name is key, value is value -->
            EMAIL: <input type="text" name="email" value="" /><br />
            COMMENTS: <br /><textarea name="comm" cols="40" rows="5"></textarea><br />
                
            <input type="submit" value="submit" />            
        </form>
    </body>
</html>
