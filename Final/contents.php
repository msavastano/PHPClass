<?php include 'dependency.php'; ?>

<?php
//test usernsme
$testName = filter_input(INPUT_POST, "website");
 
$passed = false; 
//if login is blank
$msg = "";
if(is_string($testName) && !empty($testName)) {       
        $passed = true;    
    //create object from class and test in Signup class    
    $signupClass = new Signup();   //new signup object          
     if($signupClass->websiteNameIsTaken($testName)){
        $passed = false;
        $msg = "'".$testName."' has been taken and cannot be used for your page name";
     } else{
        $msg = "";
        $passed = true;
     }      
}    
//create array
$results = array(
            'msg' => $msg,
            'passed' =>  $passed,
            'name' => $testName
        );


//echo array for ajax call
echo json_encode($results);
        
      
