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
        
        /*
         * create a form that will look up a user name.
         * make an ajax call to check if the user name has been taken
         * display a message to the user indicating if the username
         * has been taken
         * 
         * You can use the ajax and json class given or jquery if you like
         * you must create the form on this page.
         * should just be an input field and should check onblur or 
         * on a button click.
         * 
         */
        
        ?>
        <form>            
            Username: <input value='' id='username' /> 
            <input type='button' onclick="makeAjaxCall();" value='Make AJAX Call' />
            <div id='content'></div>
            
        </form>
        
            <script type="text/javascript" src="js/ajax.js"></script>
            <script type="text/javascript" src="js/json.js"></script>
            <script type="text/javascript" src="js/jscr.js"></script>
    </body>
</html>
