<?php include 'dependency.php'; //includes all classes and sets up session ?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SaaS Final</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php            
        
        //create array to store sign up errors
        $entryErrors = array();
        $signup = new Signup();
        // create signup object
        if (count($_POST) && array_key_exists("signup", $_POST) && 
                !$signup->websiteNameIsTaken($_POST['website'])){
            
            $init = new Website();
            if($signup->entryIsValid() ){  //verify info
                 $signup->saveEntry(); //method inserts dat into database     
                 $lastID = $init->getlastid();
                 $init->initWebpage($lastID['user_id']);
                 echo '<div id="userCr"><span>User Created</span></div>';
             }else{
                  $entryErrors = $signup->getErrors();//sets entry errs
             }
        }
        //check log in
        if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) {
            header("Location: editPage.php");            
        }        
        //set errors var for display in validation
        $err = "";
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
                header("Location:index.php");
                exit();
            }
        }      
        ?> 
        
        <div class="head">
            <div> <span id="s">S</span><span id="imple">imple</span><span id="aas">aaS</span>   </div>
        </div>
        <div id="divLogin1">
          <fieldset class="fields">
           <legend class="legends">Login</legend>
            <form name="loginForm" action="#" method="post">            
                <label>Username/Email:</label> <br /><input type="text" name="email" /> <br /><br />
                <label>Password:</label><br /> <input type="password" name="password" /> <br />
                <?php echo '<p class="errors">', $err, '</p>'; ?> <!---error message, if set -->                  
                <input type="submit" value="Log In" name="login" />            
            </form>
        
        </fieldset>
        </div>
        
        
        <div id="divSignUp1">
            <fieldset class="fields">
                <legend class="legends">Sign Up</legend>
            <form name="signupForm" action="#" method="post">
            
            <label>Email:</label> <br /><input type="text" name="email" />  <div class="entryError"><?php if(array_key_exists('email', $entryErrors)) echo $entryErrors['email']; ?></div><br />
            
            <label>Website:</label><br /> <input type="text" onblur="makeAjaxCall();" name="website" id="web"/><div class="entryError"><?php if(array_key_exists('website', $entryErrors)) echo $entryErrors['website']; ?><div id="content"></div><br />
            
            <label>Password:</label><br /> <input type="password" name="password" /> <div class="entryError"><?php if(array_key_exists('password', $entryErrors)) echo $entryErrors['password']; ?><br /> 
            
            <input type="submit" value="Sign Up" name="signup" id="sub"/>
                        
            </form>
           
            </fieldset>
        </div>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
        <script src="js/jscr.js" type="text/javascript"></script>
        <script src="js/json.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
    </body>
</html>