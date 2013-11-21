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
        
        $test = filter_input(INPUT_POST, "username");
        
        $passed = false;
        $msg = "The username has been taken";
        
        
    $signupClass = new Signup();   //new signup object          
     if($signupClass->userNameIsTaken($test)){
         $msg = " is your new username";
         $passed = true;
     }   
        
        $results = array(
            'msg' => $msg,
            'passed' =>  $passed          
        );

        echo json_encode($results);
        
        ?>
        
            
    </body>
</html>
