<?php include 'dependency.php'; ?>
<?php

$test = filter_input(INPUT_POST, "username");
$passed = false; 
$msg = "The login is not valid";
if(is_string($test) && !empty($test)) {       
        $passed = true;    
        
    $signupClass = new Signup();   //new signup object          
     if($signupClass->userNameIsTaken($test)){
         $passed = false;
        $msg = $test." has been taken";
     } else{
         $msg = $test." is your new username";
         $passed = true;
     }  
        
}    

$results = array(
            'msg' => $msg,
            'passed' =>  $passed,
            'usrname' => $test
        );

        echo json_encode($results);
        
      
