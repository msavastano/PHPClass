<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign up</title>
    </head>
    <body>
        <?php
        // put your code here
        if ( !empty($errorMsg) ){
            echo $errorMsg;
        }
        
        if ( !empty($successMsg) ){
            echo $successMsg;
        }
        /* 
        if ( !empty($errorMsg) ) {
            echo "<p>",$errorMsg,"</p>";
        }
        
        if ( !empty($sucessMsg) ) {
            echo "<p>",$sucessMsg,"</p>";
        }*/
        ?>
        
        <form name="mainform" method="post" action="signup_process.php">
           <label>Email</label> <input type="text" name="email" value=""  /> 
           
           <br /><br />
          <label>User Name</label> <input type="text" name="username" value="" /> 
              
          <br /><br />
          <label>Password</label> <input type="password" name="password" value=""  /> 
              
          <br /><br />
          <input type="submit" value="submit">
        </form>
    </body>
</html>
