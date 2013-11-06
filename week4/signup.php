<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign up - Week 4</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
        // set correct statement to echo
        if ( !empty($errorMsg) ){
            echo $errorMsg;
        }        
        if ( !empty($successMsg) ){
            echo $successMsg;
        }                
        ?>
        
        <form id="divTwo" name="mainform" method="post" action="signup_process.php">
            <h1 id="h2">Sign up</h1><br />
           <label>Email</label><br /> <input type="text" name="email" value=""  /> 
           
           <br /><br />
          <label>User Name</label> <br /><input type="text" name="username" value="" /> 
              
          <br /><br />
          <label>Password</label> <br /><input type="password" name="password" value=""  /> 
              
          <br /><br />
          <input type="submit" value="submit">
        </form>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>
    </body>
</html>
