<?php include 'dependency.php'; //includes all classes and sets up session ?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login TEST- Final</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php
            /*
            $testName = filter_input(INPUT_POST, "website");
            $passed = false; 
            echo $testName;
            //if login is blank
            $msg = "The login is not valid";
            if(is_string($testName) && !empty($testName)) {       
                    $passed = true;    
                //create object from class and test in Signup class    
                $signupClass = new Signup();   //new signup object          
                 if($signupClass->websiteNameIsTaken($testName)){
                    $passed = false;
                    $msg = $testName." has been taken";
                 } else{
                    $msg = $testName." is your new username";
                    $passed = true;
                 }      
            }    
            //create array
            $results = array(
                        'msg' => $msg,
                        'passed' =>  $passed                       
                    );
            //echo array for ajax call
            echo json_encode($results);
        ///////
        ///////
             * 
             */
        $somevar = false;
        if (isset($_GET['login'])){
            $getlog = $_GET['login'];
            echo 'getlog', ' ', $getlog;
        }
        if (isset($_GET['signUp'])){
            $getSign = $_GET['signUp'];
            echo 'getsign', ' ', $getSign;
        }
        //create array to store sign up errors
        $entryErrors = array();
        $signup = new Signup();
        // create signup object
        if (count($_POST) && array_key_exists("signup", $_POST) && 
                !$signup->websiteNameIsTaken($_POST['website'])){
            
            $init = new Website();
            if($signup->entryIsValid() ){  //verify info
                 $signup->saveEntry(); //method inserts dat into database
                 
                 //$lastID = $signup->getlastId();
                 $lastID = $init->getlastid();
                 $init->initWebpage($lastID['user_id']);
             }else{
                  $entryErrors = $signup->getErrors();//sets entry errs
             }
        }
        
        if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
            header("Location: editPage.php");
            //echo "YOu're in";
        }  
      
       //print_r($entryErrors);
       echo "<br />";
             
        
        //set bad login message var
        $err = "";
        print_r($_GET);
        echo "<br />";
        print_r($_SESSION);
        echo "<br />";
        print_r($_POST);
        //check for username and password validation with class.  Set session var and err mess
        if (isset($_POST['email']) && array_key_exists("login", $_POST)){
            if ( Validator::loginIsValidPost() ) { 
                $_SESSION['email'] = $_POST['email'];
                $err = "Email and Password correct"; 
                $_SESSION["isLoggedIn"] = true; 
            }else {
                $_SESSION["isLoggedIn"] = false; 
                $err = "Email or Password incorrect";                
            }
        }  
        
      //if session var is 1, redirect to admin page  
      if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
        header("Location: editPage.php");
        //echo "YOu're in";
      }   
      //avoid session hijack using tokens - token set on dependency page
        if( !isset($_SESSION['token']) ){
            $_SESSION['token'] = $token;
        }else{
            if ( isset($_POST['token']) && $_SESSION['token'] != $_POST['token'] ){
                session_destroy();
                header("Location:login_1.php");
                exit();
            }
        }
        //end php
        ?> 
        
        
        <div id="divLogin1">
          <fieldset class="fields">
           <legend class="legends">Login</legend>
            <form name="loginForm" action="#" method="post">            
                Username/Email: <br /><input type="text" name="email" /> <br /><br />
                Password:<br /> <input type="password" name="password" /> <br />
                <?php echo '<p class="errors">', $err, '</p>'; ?> <!---error message, if set -->                  
                <input type="submit" value="Log In" name="login" />            
            </form>
        
        </fieldset>
        </div>
        
        
        <div id="divSignUp1">
            <fieldset class="fields">
                <legend class="legends">Sign Up</legend>
            <form name="signupForm" action="#" method="post">
            
            Email: <br /><input type="text" name="email" /> <br />
            
            Website:<br /> <input type="text" name="website" id="web"/><br />
            
            Password:<br /> <input type="password" name="password" /> <br />            
            
          
            <input type="submit" value="Sign Up" name="signup" id="sub"/>
                        
            </form>
           
            </fieldset>
        </div>
        
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>-->
        <script src="js/jscr.js" type="text/javascript"></script>
        <script src="js/json.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
    </body>
</html>