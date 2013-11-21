<?php include 'dependency.php'; ?>
<?php
//test usernsme
$test = filter_input(INPUT_POST, "username");
$passed = false; 
//if login is blank
$msg = "The login is not valid";
if(is_string($test) && !empty($test)) {       
        $passed = true;    
    //create object from class and test in Signup class    
    $signupClass = new Signup();   //new signup object          
     if($signupClass->userNameIsTaken($test)){
        $passed = false;
        $msg = $test." has been taken";
     } else{
        $msg = $test." is your new username";
        $passed = true;
     }      
}    
//create array
$results = array(
            'msg' => $msg,
            'passed' =>  $passed,
            'usrname' => $test
        );
//echo array for ajax call
echo json_encode($results);
        
      
